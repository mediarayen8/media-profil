<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL; // <-- Tambahkan ini
use App\Models\Profile;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1. Memaksa aplikasi menggunakan HTTPS di production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // 2. Mengikat data profil ke view layout admin
        View::composer('layouts.admin', function ($view) {
            $view->with('profile', Profile::where('user_id', Auth::id())->first());
        });
    }
}