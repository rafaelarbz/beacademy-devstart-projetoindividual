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
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white" href="/products">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Cadastrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Mais</a>
            </li>
        </div>
      </nav>
    <div class="container p-3 w-75">
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
                <h5 class="text-uppercase">Navegar</h5>
    
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="/products" class="text-white">Lista de Produtos</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Cadastrar</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Mais</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Contato</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="https://github.com/rafaelarbz" class="text-white" target="blank">Github</a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/rafaelarsouza" class="text-white" target="blank">LinkedIn</a>
                    </li>
                </ul>
            </div>
            
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