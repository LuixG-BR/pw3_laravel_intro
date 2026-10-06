<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        if ($busca) {
            $usuarios = User::where('name', 'like', "%{$busca}%", 'and')
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $usuarios = User::orderBy('name', 'asc')->get();
        }

        return view('admin.dashboard', compact('usuarios', 'busca'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($dadosValidados);

        return redirect('/admin')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    /**
     * Localiza o usuário pelo ID e exibe o formulário de edição preenchido.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('users.edit', compact('usuario'));
    }

    /**
     * Valida os novos dados e atualiza o registro no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        // Validação garantindo que o e-mail continue único, ignorando o próprio ID do usuário
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($usuario->id),
            ],
            'password' => 'nullable|min:6',
        ]);

        // Se o campo de senha não foi preenchido, remove do array para não sobrescrever com valor vazio
        if (empty($dadosValidados['password'])) {
            unset($dadosValidados['password']);
        }

        // Atualiza os dados no banco de dados
        $usuario->update($dadosValidados);

        return redirect('/admin')->with('sucesso', 'Usuário atualizado com sucesso');
    }
}