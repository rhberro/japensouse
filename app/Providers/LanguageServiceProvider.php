<?php

namespace App\Providers;

use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setLocale();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Configura todas as dependências do projeto que necessitam
     * de alteração no locale.
     *
     * @return void
     */
    protected function setLocale()
    {
        $locale = $this->app->getLocale();

        Carbon::setLocale($locale);
    }
}
