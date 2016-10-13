<?php

namespace App\Berro\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface Repository
{
    /**
     * Busca todas os modelos.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * Busca todas os modelos e prepara uma paginação completa.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($quantity = null, $columns = ['*']);

    /**
     * Busca um modelo pela sua chave primária ou lança uma exceção.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find($id, $columns = ['*']);

    /**
     * Cria e persiste um novo modelo no banco de dados com os dados
     * da request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function store(Request $request);

    /**
     * Atualiza e salva os dados de um modelo existente no banco de
     * dados com os dados da request.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function update(Model $model, Request $request);
}
