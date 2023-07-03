<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Usuario
 *
 * @property int $usuario_id
 * @property string $email
 * @property string $nombre
 * @property string $apellido
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 * @mixin \Eloquent
 * @property int $rol
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRol($value)
 */
class Usuario extends User
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['nombre','apellido','email', 'password', 'rol'];

    protected $hidden = ['password', 'remember_token'];

    public const VALIDATE_RULES = [
        'email' => 'required',
        'password' => 'required',
    ];

    public const VALIDATE_MESSAGES = [
        'email.required' => 'El email no puede quedar vacío',
        'password.required' => 'La contraseña no puede quedar vacía',
    ];

    public const VALIDATE_REGISTRATION_RULES = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|unique:usuarios',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ];

    public const VALIDATE_REGISTRATION_MESSAGES = [
        'nombre.required' => 'El nombre no puede quedar vacío',
        'apellido.required' => 'El apellido no puede quedar vacío',
        'email.required' => 'El email no puede quedar vacío',
        'email.unique' => 'Este email ya está en uso, por favor elige otro',
        'password.required' => 'La contraseña no puede quedar vacía',
        'password.min' => 'La contraseña debe tener al menos :min caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password_confirmation.required' => 'La confirmación de la contraseña no puede quedar vacía',
    ];
}
