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
    // Paksa semua URL menjadi HTTPS jika di server production
    if ($this->app->environment('production')) {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    // Kode composer Anda tetap di sini...
    \Illuminate\Support\Facades\View::composer('layouts.admin', function ($view) {
        $view->with('profile', \App\Models\Profile::where('user_id', \Illuminate\Support\Facades\Auth::id())->first());
    });
}
}