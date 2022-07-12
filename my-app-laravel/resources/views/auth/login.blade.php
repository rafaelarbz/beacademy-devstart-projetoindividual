@extends('template.layout')
@section('title', 'Login')
@section('body')

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all(); as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif

    <h3 class="text-center pt-5 text-primary">Login</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="form2Example1"><b>E-mail</b></label>
                            <input type="email" id="form2Example1" class="form-control" name="email" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label text-primary" for="form2Example2"><b>Senha</b></label>
                            <input type="password" id="form2Example2" class="form-control" name="password"/>
                        </div>
                        <div class="col mb-5">
                            <!-- Simple link -->
                            <a href="{{ route('password.request') }}">Esqueceu a Senha?</a>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
                    </form>
                </div><br><br>
            </div>
        </div>
    </div>

@endsection