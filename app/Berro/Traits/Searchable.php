<?php

namespace App\Berro\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Filtra e busca todos os modelos com uma paginação completa.
     *
     * @param  int  $quantity
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function search($quantity = 10, $columns = ['*'])
    {
        return $this->newSearchableQuery()->paginate($quantity, $columns);
    }

    /**
     * Cria um novo construtor de queries para a tabela do modelo do
     * repositório e aplica os filtros com o campo de busca da request.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws \InvalidArgumentException
     */
    protected function newSearchableQuery()
    {
        $builder = $this->newQuery();

        if (!$this->hasSearchableParam()) {
            return $builder;
        }

        return $this->makeSearchable($builder);
    }

    /**
     * Transforma uma query em uma query pesquisável, útil quando
     * você vai aplicar a pesquisa em uma query que já esta pronta.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function makeSearchable(Builder $builder)
    {
        $query = $builder->getModel()->newQueryWithoutScopes()->getQuery();

        foreach ($this->getSearchableAttributes() as $attribute) {
            $query->orWhere(
                $attribute, 'like', '%' . $this->getSearchableParamValue() . '%'
            );
        }

        return $builder->addNestedWhereQuery($query, 'and');
    }

    /**
     * Retorna uma array de atributos para usar na pesquisa do modelo.
     *
     * @return array
     */
    protected function getSearchableAttributes()
    {
        return property_exists($this, 'searchable') ? $this->searchable : [];
    }

    /**
     * Verifica se a request atual tem a chave utilizada na
     * pesquisa.
     *
     * @return bool
     */
    protected function hasSearchableParam()
    {
        return $this->request->has($this->getSearchableParamName());
    }

    /**
     * Retorna o nome do parâmetro da request que vamos utilizar na
     * pesquisa.
     *
     * @return string
     */
    protected function getSearchableParamName()
    {
        return property_exists($this, 'searchableParam') ? $this->searchableParam : 'search';
    }

    /**
     * Retorna o valor do parâmetro da request que vamos utilizar na
     * pesquisa.
     *
     * @param  mixed  $default
     * @return mixed
     */
    protected function getSearchableParamValue($default = null)
    {
        return $this->request->get($this->getSearchableParamName(), $default);
    }
}
