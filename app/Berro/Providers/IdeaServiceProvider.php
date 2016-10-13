<?php

namespace App\Berro\Providers;

use App\Berro\Contracts\IdeaRepository;
use App\Berro\Repositories\Idea\EloquentIdeaRepository;

use Illuminate\Support\ServiceProvider;

class IdeaServiceProvider extends ServiceProvider
{
    /**
     * Registra o modelo e o repositório de idéias.
     *
     * @return void
     */
    public function register()
    {
        $this->bindInterfaces();
    }

    /**
     * Registra a interface para o repositório de idéias.
     *
     * @return void
     */
    private function bindInterfaces()
    {
        $this->app->singleton(IdeaRepository::class, EloquentIdeaRepository::class);
    }
}
