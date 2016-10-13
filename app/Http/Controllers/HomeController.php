<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Cria uma nova instância da classe.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra o dashboard da aplicação.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
