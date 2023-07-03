<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Compra
 *
 * @property-read \App\Models\Servicio|null $servicio
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Compra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Compra query()
 * @mixin \Eloquent
 * @property int $compra_id
 * @property int $servicio_id
 * @property int $usuario_id
 * @property int $total
 * @property string $fecha
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereCompraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereServicioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Compra whereUsuarioId($value)
 */
class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'compra_id';

    protected $fillable = ['servicio_id','usuario_id','total', 'fecha', 'estado'];

    public const VALIDATE_RULES = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required',
        'numero' => 'required|min:8',
        'link' => 'required',
        'mensaje' => 'required|min:50',
    ];

    public const VALIDATE_MESSAGES = [
        'nombre.required' => 'El nombre no puede quedar vacío',
        'apellido.required' => 'El apellido no puede quedar vacío',
        'email.required' => 'El email no puede quedar vacío',
        'numero.required' => 'El número no puede quedar vacío',
        'numero.min' => 'El número debe tener al menos :min caracteres',
        'link.required' => 'El link a la web no puede quedar vacío',
        'mensaje.required' => 'El mensaje no puede quedar vacío',
        'mensaje.min' => 'El mensaje debe tener al menos :min caracteres',
    ];

    public function servicio() 
    {
        return $this->belongsTo(related: Servicio::class, foreignKey: 'servicio_id', ownerKey: 'servicio_id');
    }

    public function usuario() 
    {
        return $this->belongsTo(related: Usuario::class, foreignKey: 'usuario_id', ownerKey: 'usuario_id');
    }
}
