<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        if ($busca) {
            $eventos = Evento::where('titulo', 'like', "%{$busca}%", 'and')
                ->orderBy('tiutlo', 'asc')
                ->get();
        } else {
            $eventos = Evento::orderBy('tiutlo', 'asc')->get();
        }

        // Retorna a view do painel passando a coleção de usuários e o termo pesquisado
        return view('eventos.index', compact('eventos', 'busca'));
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
