<?php
namespace Fairweather;
use Illuminate\Support\ServiceProvider;
Use \Config;

class FairweatherServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Fairweather\Repositories\FacebookRepository', function() {
            return new Repositories\FacebookRepository(Config::get('services.facebook.pageId'), Config::get('services.facebook.appId'), Config::get('services.facebook.appSecret'));
        });
        $this->app->bind('Fairweather\Helpers\FacebookRedirectLoginHelper');
    }
}