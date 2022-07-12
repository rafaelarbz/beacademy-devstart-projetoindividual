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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">
            <h2 style="color: #ffffff">Coffee Time</h2>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#">Home</a>
                        <a class="nav-item nav-link" href="#">Produtos</a>
                        <a class="nav-item nav-link" href="#">Cadastrar Produto</a>
                        <a class="nav-item nav-link" href="#">Usuários</a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#">Login</a>
                        <a class="nav-item nav-link" href="#">Cadastro</a>

                        <a class="nav-item nav-link" href="#">Username</a>
                        <a class="nav-item nav-link" href="#">Sair</a>
                    </div>
                </div>
            </div>
        </div>
      </nav>
    <div class="container">
        @yield('body')
    </div>
</body>
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!--Grid row-->
        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">NAVEGAR</h5>
    
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-white">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Produtos</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">..</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">PRODUTOS</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-white" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-white" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">CONTATO</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-white" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-white" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">CONTATOS</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-white" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-white" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div> 
            <!--Grid column-->
            
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright - 
      <a class="text-white" href="https://linkedin.com/in/rafaelarsouza" target="blank">Rafaela Rabelo</a>
    </div>
    <!-- End -->
</footer>
</html>