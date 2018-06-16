<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function roles()
//    {
//       return $this->belongsToMany(Role::class);
//    }
//
//    public function hasPermission(Permission $permissions)
//    {
//        return $this->hasAnyRoles($permissions->roles);
//    }
//
//    public function hasAnyRoles($roles)
//    {
//        if(is_array($roles) || is_object($roles)){
//            foreach ($roles as $roles){
//                return $this->roles->contains('name', $roles->name);
//            }
//        }
//
//        return $this->hasAnyRoles($roles);
//    }
}
