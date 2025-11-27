@extends('layouts.app')

@section('title', 'Minha Biblioteca')

@section('conteudo')
<h2 style="margin-bottom: 20px;">Meus Livros</h2>

<a href="/livros/criar" class="btn btn-primary" style="margin-bottom: 20px;">Adicionar Novo Livro</a>

@if (count($livros) > 0)
    <table style="width: 100%; border-collapse: collapse; background: white;">
        <thead>
            <tr style="background-color: #2c3e50; color: white;">
                <th style="padding: 12px; text-align: left;">Título</th>
                <th style="padding: 12px; text-align: left;">Autor</th>
                <th style="padding: 12px; text-align: left;">Ano</th>
                <th style="padding: 12px; text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 12px;">{{ $livro->titulo }}</td>
                <td style="padding: 12px;">{{ $livro->autor }}</td>
                <td style="padding: 12px;">{{ $livro->ano }}</td>
                <td style="padding: 12px; text-align: center;">
                    <a href="/livros/{{ $livro->id }}/editar" class="btn btn-secondary">Editar</a>
                    <form method="POST" action="/livros/{{ $livro->id }}" style="display: inline;" 
                          onsubmit="return confirm('Tem certeza?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhum livro cadastrado ainda. <a href="/livros/criar">Adicione um agora</a></p>
@endif
@endsection
