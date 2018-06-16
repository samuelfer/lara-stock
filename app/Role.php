<?php

namespace App;

use Spatie\Permission\Models\Role as SpatieRole;
//use Spatie\Permission\Traits\HasRoles;

class Role extends SpatieRole
{
   // use HasRoles;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name'
    ];

}
