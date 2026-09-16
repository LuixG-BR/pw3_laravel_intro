<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('tiutlo')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request) {
        $dados = $request->validate([
            'titulo' => 'required|min:3',
            'local' => 'required|min:2',
            'vagas' => 'required|integer|min:1',
            'preco_inscricao' => 'required|numeric|min:0'
        ]);

        Evento::create($dados);

        return redirect('/eventos');
    }

    public function create(){
        return view('eventos.create');
    }
}
