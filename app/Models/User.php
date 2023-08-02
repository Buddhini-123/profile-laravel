<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'identity.users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'username',
        'email',
        'role',
        'plan',
        'action',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPictureAttribute($value)
    {
        if ($value) {
            return asset('app-assets/uploads/user/' . $value);
        } else {
            return asset('app-assets/uploads/user/no-image.png');
        }
    }
    public function membership()
    {
        return $this->hasOne(Membership::class);
    }
}
