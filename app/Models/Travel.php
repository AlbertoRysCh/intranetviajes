<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'tr_travels';
    protected $primaryKey = 'travelID';
    // Definir la relación con el modelo Checkin
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'travelID', 'travelID');
    }
    public function groups()
    {
        return $this->hasMany(CreateGroups::class, 'travelID', 'travelID');
    }
}
