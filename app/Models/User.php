<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//    public function setPasswordAttribute($password): void
//    {
//        $this->attributes['password'] = Hash::make($password);
//    }


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    /**
     * check the user has a role
     * @param string $name
     * @return mixed|null
     */
    public function hasAnyRole(string $name)
    {
        return $this->roles()->where('name', $name)->first();
    }


    /**
     * check the user has any given role
     * @param array $name
     * @return mixed|null
     */
    public function hasAnyRoles(array $name)
    {
        return $this->roles()->whereIn('name', $name)->first();
    }
}
