<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LoginCheckProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      //ログインしていればヘッダーに名前を表記し、してなければeverybodyと表す
        View::composer('layouts.app',function($view) {
            $loginUser = \Auth::user();
            if($loginUser) {
              $view->with('loginUser',$loginUser->name);
            } else {
              $view->with('loginUser','Everybody');
            }
        });
    }
}
