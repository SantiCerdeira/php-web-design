<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Articulo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Autor
 *
 * @property int $autor_id
 * @property string $nombre
 * @property string $apellido
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Autor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Autor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Autor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Autor whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Autor whereAutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Autor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Autor whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Autor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Autor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

