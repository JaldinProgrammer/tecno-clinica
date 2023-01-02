<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user){
            $userType = DB::table('users')
                ->where('id',$user->id)
                ->where('is_admin',1)
                ->where('status',1)
                ->get();
            return ( sizeof($userType) != 0);
        });

        Gate::define('doctor', function($user){
            $userType = DB::table('users')
                ->where('id',$user->id)
                ->where('is_doctor',1)
                ->where('status',1)
                ->get();
            return ( sizeof($userType) != 0);
        });
    }
}
