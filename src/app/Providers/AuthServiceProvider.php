<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
        
        Gate::define('admin', function ($user) {
            return ($user->role == 1); // 管理者
        });
        
        Gate::define('shop_manager', function ($user) {
            return ($user->role == 2); // 店舗代表者
        });
        
        Gate::define('user', function ($user) {
            return ($user->role ==3); // 一般ユーザ
        });
    }
}
