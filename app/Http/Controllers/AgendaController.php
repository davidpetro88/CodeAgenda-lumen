<?php

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * @param string $letra
     * @return \Illuminate\View\View
     */
    public function index($letra = 'A')
    {
        $pessoas = Pessoa::where('apelido', 'like', $letra.'%')->get();
        return view('agenda', compact(
            'pessoas'
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function busca(Request $request)
    {
        $busca = $request->buscar;
        $pessoas = [];
        if (!empty($busca)) {
            $pessoas = Pessoa::where('nome', 'like', "%{$busca}%")
            ->orWhere('apelido', 'like', "%{$busca}%")
            ->get();
        }
        return view('agenda', compact(
            'pessoas'
        ));
    }
}