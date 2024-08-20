<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateGroups extends Model
{
    use HasFactory;
    protected $table = 'tr_group';
    protected $primaryKey = 'groupID';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }
    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class, 'travelID', 'travelID');
    }
}
