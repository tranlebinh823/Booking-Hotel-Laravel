<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // Thêm dòng này để import Schema
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Config;

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
        if (Schema::hasTable('smtp_settings')) { // Sử dụng Schema ở đây
           $smtpsetting = SmtpSetting::first();

           if ($smtpsetting) {
              $data = [
                'driver' => $smtpsetting->mailer,
                'host' => $smtpsetting->host,
                'port' => $smtpsetting->port,
                'username' => $smtpsetting->username,
                'password' => $smtpsetting->password,
                'encryption' => $smtpsetting->encryption,
                'from' => [
                    'address' => $smtpsetting->from_address,
                    'name' => 'MoonHotel'
                ]
              ];
              Config::set('mail',$data);
           }

        } // end if
    }
}
