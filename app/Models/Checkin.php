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
        'userID',
        'tip_maleta',
        'num_etiqueta',
        'color',
        'caracteristicas',
        'peso',
        'images',
        'lugar_regis',
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
