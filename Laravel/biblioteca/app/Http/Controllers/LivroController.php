<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();

        $livros = Livro::with('categoria')->get();

        return view('livros.create', compact(
            'categorias',
            'livros'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([

            'titulo' => 'required|min:3|max:100',

            'autor' => 'required|min:3|max:100',

            'ano' => 'required|integer|min:1900|max:2026',

            'categoria_id' => 'required|exists:categorias,id'

        ]);

        // REGRA DE NEGÓCIO
        if ($request->ano > date('Y')) {

            return back()->withErrors([
                'ano' => 'O livro não pode ser do futuro'
            ]);

        }

        Livro::create([

            'titulo' => $request->titulo,

            'autor' => $request->autor,

            'ano' => $request->ano,

            'categoria_id' => $request->categoria_id

        ]);

        return redirect('/livros/create')
            ->with('success', 'Livro cadastrado com sucesso!');
    }
}