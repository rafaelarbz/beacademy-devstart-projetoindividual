@extends('template.layout')
@section('title', 'Cadastro')
@section('body')

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all(); as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif

    <h3 class="text-center pt-5 text-primary">Cadastre-se</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="name"><b>Nome</b></label>
                            <input type="text" id="name" class="form-control" name="name" />
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="email"><b>E-mail</b></label>
                            <input type="email" id="email" class="form-control" name="email" />
                        </div>
            
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="password"><b>Senha</b></label>
                            <input type="password" id="password" class="form-control" name="password"/>
                        </div>
                        <!-- Confirm Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="password_confirmation"><b>Confirme a Senha</b></label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required/>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection