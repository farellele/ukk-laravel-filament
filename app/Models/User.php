<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set attribute password agar selalu di-hash sebelum disimpan.
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value) && !password_get_info($value)['algo']) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
