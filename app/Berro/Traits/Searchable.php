<?php

namespace App\Berro\Traits;

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

        if (!$this->request->has($key = $this->getSearchableKey())) {
            return $builder;
        }

        foreach ($this->getSearchableAttributes() as $searchable) {
            $builder->orWhere($searchable, 'like', '%' . $this->request->get($key) . '%');
        }

        return $builder;
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
     * Retorna o nome da chave que devemos pegar da request e utilizar
     * na pesquisa.
     *
     * @return string
     */
    protected function getSearchableKey()
    {
        return property_exists($this, 'searchableKey') ? $this->searchableKey : 'search';
    }
}
