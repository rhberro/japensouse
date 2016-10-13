<?php

namespace App\Berro\Contracts;

interface IdeaRepository extends Repository
{
    /**
     * Busca as idéias que o usuário atualmente autenticado já
     * favoritou.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function authenticatedUserFavourited($quantity = null, $columns = ['*']);

    /**
     * Busca as idéias que o usuário atualmente autenticado já
     * aprovou.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function authenticatedUserApproved($quantity = null, $columns = ['*']);

    /**
     * Busca as idéias que o usuário atualmente autenticado já
     * pré-aprovou.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function authenticatedUserPreapproved($quantity = null, $columns = ['*']);

    /**
     * Busca as idéias que o usuário atualmente autenticado já
     * removeu.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function authenticatedUserRemoved($quantity = null, $columns = ['*']);
}
