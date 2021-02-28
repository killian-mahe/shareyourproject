<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        $this->publishes([
            __DIR__.'/../../resources/assets' => \public_path('vendor/courier'),
        ], 'public');

        JsonResource::withoutWrapping();
    }
}
