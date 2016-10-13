<?php

namespace App\Berro\Repositories;

use Illuminate\Container\Container;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use InvalidArgumentException;

abstract class EloquentRepository
{
    /**
     * A instância da classe do service container.
     *
     * @var \Illuminate\Container\Container
     */
    protected $app;

    /**
     * A instância da classe de autenticação.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * A instância da classe da request.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * O nome da classe do modelo.
     *
     * @var string
     */
    protected $model;

    /**
     * A lista de nome das relações do modelo.
     *
     * @var array
     */
    protected $relationships;

    /**
     * A lista de nome dos contadores de relações do modelo.
     *
     * @var array
     */
    protected $counters;

    /**
     * Cria uma nova instância do repositório.
     *
     * @param  \Illuminate\Container\Container $app
     * @param  \Illuminate\Contracts\Auth\Factory $auth
     * @param  \Illuminate\Http\Request $request
     */
    public function __construct(Container $app, Factory $auth, Request $request)
    {
        $this->app = $app;
        $this->auth = $auth;
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function all($columns = ['*'])
    {
        return $this->newQuery()->all($columns);
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($quantity = 10, $columns = ['*'])
    {
        return $this->newQuery()->paginate($quantity, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function find($id, $columns = ['*'])
    {
        return $this->newQuery()->findOrFail($id, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function store(Request $request)
    {
        return $this->newModel()->fill($request->all())->save();
    }

    /**
     * {@inheritdoc}
     */
    public function update(Model $model, Request $request)
    {
        return $model->fill($request->all())->save();
    }

    /**
     * Cria uma nova instância do modelo.
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \InvalidArgumentException
     */
    public function newModel()
    {
        $model = $this->app->make($this->model);

        if (!$model instanceof Model) {
            throw new InvalidArgumentException('Model must be an instance of \Illuminate\Database\Eloquent\Model.');
        }

        return $model;
    }

    /**
     * Cria um novo construtor de queries para a tabela do
     * modelo do repositório.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws \InvalidArgumentException
     */
    public function newQuery()
    {
        $builder = $this->newModel()->newQuery();

        if ($relationships = $this->relationships) {
            $builder->with($relationships);
        }

        if ($counters = $this->counters) {
            $builder->withCount($counters);
        }

        return $builder;
    }
}
