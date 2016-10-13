<?php

namespace App\Berro\Repositories\User;

use App\Berro\Contracts\UserRepository;
use App\Berro\Repositories\EloquentRepository;
use App\Berro\Traits\Searchable;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    use Searchable;

    /**
     * O nome da classe do usuário.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * A lista de nome dos contadores de relações do usuário.
     *
     * @var array
     */
    protected $counters = ['ideaUser', 'favourited', 'approved', 'preapproved', 'removed'];

    /**
     * Atributos que podem ser utilizados na pesquisa.
     *
     * @var array
     */
    protected $searchable = ['name', 'email'];

    /**
     * {@inheritdoc}
     */
    public function store(Request $request)
    {
        $parameters = $this->encryptParameters($request);

        return $this->newModel()->fill($parameters)->save();
    }

    /**
     * {@inheritdoc}
     */
    public function update(Model $model, Request $request)
    {
        $parameters = $this->encryptParameters($request);

        return $model->fill($parameters)->save();
    }

    /**
     * {@inheritdoc}
     */
    public function follow(User $user)
    {
        return $this->auth->user()->follows()->attach($user);
    }

    /**
     * {@inheritdoc}
     */
    public function unfollow(User $user)
    {
        return $this->auth->user()->follows()->detach($user);
    }

    /**
     * Formata os parâmetros da request para inserir ou
     * atualizar o usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function encryptParameters(Request $request)
    {
        $parameters = $request->except('password', 'password_confirmation');

        if ($request->has('password')) {
            $parameters += [
                'password' => bcrypt($request->get('password'))
            ];
        }

        return $parameters;
    }
}
