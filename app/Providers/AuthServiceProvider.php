<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        /* gate pour specifier les droit pour parcourir certaine page */

        Gate::define('manage-users', function ($user){

            return $user->hasAnyRole(['auteur' , 'admin' ]);

        });


        // le gate pour le droit d'editer un utilisateur

       Gate::define('edit-users', function ($user) {
        return $user->hasAnyRole(['auteur' , 'admin' ]);

    });

       //un gate pour suprimmer un utilisateur droit reseve 

             Gate::define('delete-users', function ($user) {
        return $user->isAdmin();
    });
    }
}
