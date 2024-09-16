<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'groupID',
        'apellidos',
        'telefono',
        'username',
        'email',
        'password',
        'sexo',
        'tip_documento',
        'documento',
        'nacimiento',
        'politica',
        'terminos',
        'promociones',
        'pais_origen',
        'edad',
        'direccion',
        'nombre_emer',
        'apellido_emer',
        'fecha',
        'foto',
        'tipo_viajero',
        'pulsera',
        'orden',
        'hobbies',
        'deportes',
        'plato_fav',
        'color_fav',
        'acti_relacional',
        'espe_detalles_r',
        'otr_conductas',
        'espe_detalles_c',
        'informacion_ad',
        'noti_email',
        'pdf_generar',
        'pdf_total_user',
        'pdf_fecha_hora',
    ];
    // Definir la relación con el modelo Checkin
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'userID', 'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /*public function group()
    {
    return $this->belongsTo(CreateGroups::class, 'groupID', 'groupID');
    }*/
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(CreateGroups::class, 'group_user', 'user_id', 'group_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
