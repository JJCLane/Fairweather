<?php
namespace Fairweather;
use Illuminate\Support\ServiceProvider;

class FairweatherServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Fairweather\Repositories\FacebookRepository', function() {
            return new Repositories\FacebookRepository("1441025676167565", "315006852031986", "Et4dPA0rJeZ1aSx98M9p-4RXxUM");
        });
        $this->app->bind('Fairweather\Helpers\FacebookRedirectLoginHelper');
    }
}