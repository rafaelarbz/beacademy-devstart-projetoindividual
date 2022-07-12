<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">
                <h2 style="color: #C08854"><b>Coffee !</b></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-item nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="#">Produtos</a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="#">Cadastrar Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="#">Usuários</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    @if (Auth::user())
                        <li class="nav-tem">
                            <a class="nav-item nav-link" href="#">Username</a>
                        </li>
                        <li class="nav-tem">
                            <a class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <x-responsive-nav-link : class="nav-link" href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Sair') }}
                                    </x-responsive-nav-link>
                                </form>
                            </a>
                        </li>
                    @else
                        <li class="nav-tem">
                            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-tem">
                            <a class="nav-item nav-link" href="{{ route('register') }}">Cadastro</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('body')
    </div>
</body>
<footer class="bg-light text-center text-dark">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!--Grid row-->
        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">NAVEGAR</h5>
    
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-dark">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Produtos</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">..</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">PRODUTOS</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-dark" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-dark" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">CONTATO</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-dark" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-dark" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">CONTATOS</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-dark" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-dark" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div> 
            <!--Grid column-->
            
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright - 
      <a class="text-dark" href="https://linkedin.com/in/rafaelarsouza" target="blank">Rafaela Rabelo</a>
    </div>
    <!-- End -->
</footer>
</html>