<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerPolicies();
//
//        //Recupera todas as permissoes
//        //Exemplo do retorno
//        //view_post => Manager(isso e o papel a roles)
//        $permissions = Permission::with('roles')->get();
//        foreach($permissions as $permissions)
//        {
//            $gate->define($permissions->name, function (User $user) use ($permissions){
//                return$user->hasPermission($permissions);
//            });
//        }
    }
}
