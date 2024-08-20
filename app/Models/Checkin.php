<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;
    protected $table = 'tr_checkin'; // Nombre de la tabla

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'travelID',
        'userID',
        'tip_documento',
        'num_documento',
        'fecha_emi',
        'fecha_venc',
        'image_documento',
        'pass_board',
        'equipaje_8kg',
        'equipaje_23kg',
        'descrip_8kg',
        'descrip_23kg',
    ];

    // Definir la relación con el modelo Travel
    public function travel()
    {
        return $this->belongsTo(Travel::class, 'travelID', 'travelID');
    }

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}
