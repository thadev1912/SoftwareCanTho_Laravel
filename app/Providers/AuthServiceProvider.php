<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
       
    ];
    public function register()
    {
       
    }
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::ignoreRoutes();
       // Passport::routes();
       Passport::tokensExpireIn(now()->addDays(15));
       Passport::refreshTokensExpireIn(now()->addDays(30));
       Passport::personalAccessTokensExpireIn(now()->addMonths(6));

       app(Gate::class)->before(function(Authorizable $auth,$route)
       {
        if(method_exists($auth,'hasPermission'))
        {
            return $auth->hasPermission($route) ? $auth->hasPermission($route) :false;
        } 
        return false;
       }
       
    );

        //mục đích code trên là để chạy trước hàm can() của authorize để cho phép hay không-->từ đó middlewate tiếp tục xử lý...
    }
    // public function boot()
    // {
    //     $this->registerPolicies();
    //    $route='nhanvien';
    //     app(Gate::class)->before(function(Authorizable $auth,$route)
    //     {
    //          if(method_exists($auth,'hasPermission'))
    //          //dd($auth->hasPermission($route));
    //            {
    //             return $auth->hasPermission('nhanvien') ? $auth->hasPermission($route) :false;
    //            }
    //            return false;
    //     }       
    // );
    //     //
    // }
}
