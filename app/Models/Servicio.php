<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Servicio
 *
 * @property int $servicio_id
 * @property string $nombre
 * @property int $precio
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio whereServicioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Servicio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'servicio_id';
}
