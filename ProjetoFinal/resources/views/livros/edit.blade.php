@extends('layouts.app')

@section('title', 'Editar Livro - Biblioteca')

@section('conteudo')
<h2 style="margin-bottom: 20px;">Editar Livro</h2>

<form method="POST" action="/livros/{{ $livro->id }}" enctype="multipart/form-data" style="max-width: 600px;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label>Título</label>
        <input type="text" name="titulo" required value="{{ $livro->titulo }}" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        @error('titulo')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Descrição</label>
        <textarea name="descricao" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; min-height: 100px;">{{ $livro->descricao }}</textarea>
        @error('descricao')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Autor</label>
        <input type="text" name="autor" required value="{{ $livro->autor }}" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        @error('autor')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Ano de Publicação</label>
        <input type="number" name="ano" required value="{{ $livro->ano }}" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        @error('ano')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Capa do Livro (PNG ou JPG)</label>
        <input type="file" name="capa" accept="image/png,image/jpeg" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        @if ($livro->capa)
            <p style="margin-top: 10px; font-size: 12px;">Capa atual: <strong>{{ basename($livro->capa) }}</strong></p>
        @endif
        @error('capa')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Livro</button>
    <a href="/livros" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
