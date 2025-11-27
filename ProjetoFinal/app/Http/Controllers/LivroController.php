<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoria = request()->cookie('ultima_categoria', 'todos');
        $livros = Livro::all();
        
        cookie()->queue('ultima_categoria', 'todos', 60 * 24 * 365);
        
        return view('livros.index', compact('livros', 'categoria'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|min:3',
            'descricao' => 'required|string',
            'autor' => 'required|string|min:3',
            'ano' => 'required|integer|min:1000|max:2100',
            'capa' => 'nullable|image|mimes:png,jpg|max:2048'
        ], [
            'titulo.required' => 'Título é obrigatório',
            'autor.required' => 'Autor é obrigatório',
            'capa.mimes' => 'Apenas PNG ou JPG são aceitos'
        ]);

        $caminhoFoto = null;
        if ($request->hasFile('capa')) {
            $caminhoFoto = $request->file('capa')->store('capas', 'public');
        }

        Livro::create([
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'autor' => $validated['autor'],
            'ano' => $validated['ano'],
            'capa' => $caminhoFoto
        ]);

        return redirect('/livros')->with('sucesso', 'Livro adicionado com sucesso!');
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required|string|min:3',
            'descricao' => 'required|string',
            'autor' => 'required|string|min:3',
            'ano' => 'required|integer|min:1000|max:2100',
            'capa' => 'nullable|image|mimes:png,jpg|max:2048'
        ]);

        if ($request->hasFile('capa')) {
            $caminhoFoto = $request->file('capa')->store('capas', 'public');
            $validated['capa'] = $caminhoFoto;
        }

        $livro->update($validated);

        return redirect('/livros')->with('sucesso', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect('/livros')->with('sucesso', 'Livro deletado com sucesso!');
    }
}
