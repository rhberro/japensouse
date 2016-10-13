<?php

namespace App\Http\Controllers;

class ReportsController extends Controller
{
    /**
     * Retorna a página para mostrar os relatórios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }
}
