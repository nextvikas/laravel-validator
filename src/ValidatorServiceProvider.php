<?php
namespace Nextvikas\Validator;

use Illuminate\Support\ServiceProvider;

class ValdiatorServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Nextvikas\Validator\Validator', function ($app) {
            return new Validator($app['validator'], $app);
        });
    }
}