<?php

namespace App\Berro\Providers;

use App\Berro\Contracts\UserRepository;
use App\Berro\Repositories\User\EloquentUserRepository;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Registra o modelo e o repositório de usuários.
     *
     * @return void
     */
    public function register()
    {
        $this->bindInterfaces();
    }

    /**
     * Registra a interface para o repositório de usuários.
     *
     * @return void
     */
    private function bindInterfaces()
    {
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
    }
}
