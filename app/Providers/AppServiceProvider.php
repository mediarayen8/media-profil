<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mengikat data profil ke view layout admin secara otomatis
        View::composer('layouts.admin', function ($view) {
            // Kita gunakan Auth::id() agar datanya sesuai dengan user yang sedang login
            $view->with('profile', Profile::where('user_id', Auth::id())->first());
        });
    }
}