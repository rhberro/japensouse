<?php

namespace App\Berro\Contracts;

use App\User;

interface UserRepository extends Repository
{
    /**
     * Faz com que o usuário autenticado siga o usuário.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function follow(User $user);

    /**
     * Faz com que o usuário autenticado pare de seguir o usuário.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function unfollow(User $user);
}
