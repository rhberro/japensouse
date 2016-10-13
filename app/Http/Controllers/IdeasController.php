<?php

namespace App\Http\Controllers;

use App\Berro\Contracts\IdeaRepository;

use Illuminate\Http\Request;

class IdeasController extends Controller
{
    /**
     * Repositório de idéias.
     *
     * @var \App\Berro\Contracts\IdeaRepository
     */
    protected $repository;

    /**
     * Cria uma nova instância da classe.
     *
     * @param  \App\Berro\Contracts\IdeaRepository  $repository
     * @return void
     */
    public function __construct(IdeaRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    /**
     * Retorna a página para mostrar a lista de idéias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ideas = $this->repository->search();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Retorna a página para mostrar a lista de idéias que
     * o usuário atual favoritou.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourited()
    {
        $ideas = $this->repository->authenticatedUserFavourited();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Retorna a página para mostrar a lista de idéias que
     * o usuário atual aprovou.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved()
    {
        $ideas = $this->repository->authenticatedUserApproved();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Retorna a página para mostrar a lista de idéias que
     * o usuário atual pré-aprovou.
     *
     * @return \Illuminate\Http\Response
     */
    public function preapproved()
    {
        $ideas = $this->repository->authenticatedUserPreapproved();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Retorna a página para mostrar a lista de idéias que
     * o usuário atual removeu.
     *
     * @return \Illuminate\Http\Response
     */
    public function removed()
    {
        $ideas = $this->repository->authenticatedUserRemoved();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Retorna a página para mostrar os dados de uma idéia.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idea = $this->repository->find($id);
        return view('ideas.show', compact('idea'));
    }

    /**
     * Adiciona uma idéia aos favoritos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function favourite(Request $request, $id)
    {
        $request->user()->favourite($this->repository->find($id));
        return redirect()->route('ideas.show', $id);
    }

    /**
     * Aprova uma idéia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, $id)
    {
        $request->user()->approve($this->repository->find($id));
        return redirect()->route('ideas.show', $id);
    }

    /**
     * Pré-aprova uma idéia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function preapprove(Request $request, $id)
    {
        $request->user()->preapprove($this->repository->find($id));
        return redirect()->route('ideas.show', $id);
    }

    /**
     * Remove uma idéia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, $id)
    {
        $request->user()->remove($this->repository->find($id));
        return redirect()->route('ideas.show', $id);
    }
}
