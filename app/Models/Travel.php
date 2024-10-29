<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'tr_travels';
    protected $primaryKey = 'travelID';
    protected $fillable = [
        'nombre_viaje',
        'travel_image',
        'codigo_viaje',
        'destino',
        'costo_total',
        'cant_cuotas',
        'tipo_moneda',
        'fecha_viaje',
        'plan_alojamiento',
        'nom_hotel',
        'itinerario',
        'link_insta',
        'link_videoyt',
        'indicaciones',
        'recomendaciones',
        'ropa_viaje',
        'permiso_notarial',
        'voucher',
        'lista_clinicas',
    ];
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
