<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // 1. Import ໂຕນີ້
use Illuminate\Support\Facades\Schema; // 1. ເພີ່ມການ Import Schema ຢູ່ເທິງນີ້
use Illuminate\Support\Facades\View;
use App\Models\Setting;
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
        Schema::defaultStringLength(191); // 2. ເພີ່ມບັນທັດນີ້ໃສ່ໃນ Method boot
        Paginator::useBootstrapFive();
        
        View::composer('*', function ($view) {
        $logoSetting = Setting::where('key', 'site_logo')->first();
        $view->with('siteLogo', $logoSetting ? $logoSetting->value : null);
    });
    }
}