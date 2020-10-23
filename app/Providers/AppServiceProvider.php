<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;

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
        if(env('ENFORCE_SSL', false)) {
            $url->forceScheme('https');
        }

        $this->publishes([
            __DIR__.'/../../resources/assets' => \public_path('vendor/courier'),
        ], 'public');

        JsonResource::withoutWrapping();
    }
}
