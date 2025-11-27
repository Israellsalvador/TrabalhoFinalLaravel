@extends('layouts.app')

@section('title', 'Cadastro - Biblioteca')

@section('conteudo')
<div style="max-width: 400px; margin: 100px auto;">
    <h2 style="margin-bottom: 30px; text-align: center;">Criar Conta</h2>

    <form method="POST" action="/register">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Nome</label>
            <input type="text" name="name" required value="{{ old('name') }}" 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Email</label>
            <input type="email" name="email" required value="{{ old('email') }}" 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('email')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Senha</label>
            <input type="password" name="password" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('password')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Confirmar Senha</label>
            <input type="password" name="password_confirmation" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 15px;">Cadastrar</button>
    </form>

    <p style="text-align: center;">Já tem conta? <a href="/login">Faça login aqui</a></p>
</div>
@endsection
