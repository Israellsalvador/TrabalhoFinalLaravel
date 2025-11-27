@extends('layouts.app')

@section('title', 'Login - Biblioteca')

@section('conteudo')
<div style="max-width: 400px; margin: 100px auto;">
    <h2 style="margin-bottom: 30px; text-align: center;">Fazer Login</h2>

    <form method="POST" action="/login">
        @csrf

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

        <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 15px;">Entrar</button>
    </form>

    <p style="text-align: center;">Não tem conta? <a href="/register">Cadastre-se aqui</a></p>
</div>
@endsection
