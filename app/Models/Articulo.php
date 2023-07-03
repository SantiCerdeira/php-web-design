<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Articulo
 *
 * @property int $articulo_id
 * @property int $autor_id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string $cuerpo
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property string $fecha_publicacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereArticuloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereCuerpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereAutorId($value)
 * @property-read \App\Models\Autor $autor
 * @property int $categoria_id
 * @property-read \App\Models\Categoria $categoria
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereCategoriaId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Articulo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Articulo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Articulo withoutTrashed()
 * @property int $usuario_id
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Articulo whereUsuarioId($value)
 */
class Articulo extends Model
{
    use SoftDeletes;

    protected $table = 'articulos';
    protected $primaryKey = 'articulo_id';
    protected $fillable = ['usuario_id','categoria_id','titulo', 'descripcion', 'cuerpo', 'portada', 'portada_descripcion', 'fecha_publicacion'];

    public const VALIDATE_RULES = [
        'titulo' => 'required|min:10',
        'cuerpo' => 'required|min:30',
    ];

    public const VALIDATE_MESSAGES = [
        'titulo.required' => 'El título no puede quedar vacío',
        'titulo.min' => 'El título debe tener al menos :min caracteres',
        'cuerpo.required' => 'El cuerpo no puede quedar vacío',
        'cuerpo.min' => 'El cuerpo debe tener al menos :min caracteres',
    ];

    public function usuario() 
    {
        return $this->belongsTo(related: Usuario::class, foreignKey: 'usuario_id', ownerKey: 'usuario_id');
    }

    public function categoria() 
    {
        return $this->belongsTo(related: Categoria::class, foreignKey: 'categoria_id', ownerKey: 'categoria_id');
    }
}

