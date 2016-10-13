<?php

namespace App\Http\Controllers;

use App\Berro\Contracts\UserRepository;
use App\Http\Requests\UserRequest;
use App\User;

class UsersController extends Controller
{
    /**
     * Repositório de usuários.
     *
     * @var \App\Berro\Contracts\UserRepository
     */
    protected $repository;

    /**
     * Cria uma nova instância da classe.
     *
     * @param  \App\Berro\Contracts\UserRepository  $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    /**
     * Retorna a página para mostrar a lista de usuários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->search();
        return view('users.index', compact('users'));
    }

    /**
     * Retorna a página para mostrar os dados de um usuário.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Retorna a página para mostrar o formulário de criação de um
     * usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Faz a inserção de um novo usuário.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('users')->withSuccess('Usuário inserido com sucesso.');
    }

    /**
     * Retorna a página para mostrar o formulário de edição de um
     * usuário.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Faz a atualização dos dados de um usuário.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $this->repository->update($user, $request);
        return redirect()->back()->withSuccess('Usuário atualizado com sucesso.');
    }

    /**
     * Faz com que o usuário autenticado siga o usuário.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow(User $user)
    {
        $this->repository->follow($user);
        return redirect()->back()->withSuccess('Você começou a seguir o usuário ' . $user->name . '.');
    }

    /**
     * Faz com que o usuário autenticado pare de seguir o usuário.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollow(User $user)
    {
        $this->repository->unfollow($user);
        return redirect()->back()->withSuccess('Você deixou de seguir o usuário ' . $user->name . '.');
    }
}
