<?php

namespace App\Berro\Repositories\Idea;

use App\Berro\Contracts\IdeaRepository;
use App\Berro\Repositories\EloquentRepository;
use App\Berro\Traits\Searchable;
use App\Idea;

class EloquentIdeaRepository extends EloquentRepository implements IdeaRepository
{
    use Searchable;

    /**
     * O nome da classe da idéia.
     *
     * @var string
     */
    protected $model = Idea::class;

    /**
     * A lista de nome das relações da idéia.
     *
     * @var array
     */
    protected $relationships = ['ideaUserAuthenticated'];

    /**
     * A lista de nome dos contadores de relações da idéia.
     *
     * @var array
     */
    protected $counters = ['ideaUserAuthenticated'];

    /**
     * Atributos que podem ser utilizados na pesquisa.
     *
     * @var array
     */
    protected $searchable = ['name', 'title', 'description'];

    /**
     * {@inheritdoc}
     */
    public function find($id, $columns = ['*'])
    {
        $idea = $this->newQuery()->findOrFail($id, $columns);
        return $this->auth->user()->see($idea);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticatedUserFavourited($quantity = 10, $columns = ['*'])
    {
        $relationship = $this->auth->user()->favourited();
        return $this->makeSearchable($relationship->getQuery())->paginate($quantity, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticatedUserApproved($quantity = 10, $columns = ['*'])
    {
        $relationship = $this->auth->user()->approved();
        return $this->makeSearchable($relationship->getQuery())->paginate($quantity, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticatedUserPreapproved($quantity = 10, $columns = ['*'])
    {
        $relationship = $this->auth->user()->preapproved();
        return $this->makeSearchable($relationship->getQuery())->paginate($quantity, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function authenticatedUserRemoved($quantity = 10, $columns = ['*'])
    {
        $relationship = $this->auth->user()->removed();
        return $this->makeSearchable($relationship->getQuery())->paginate($quantity, $columns);
    }
}
