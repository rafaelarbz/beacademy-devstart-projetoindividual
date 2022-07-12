@extends('template.layout')
@section('title', 'Usuários')
@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light text-white">
                    <img src="{{ asset('storage/home/admin-users.gif')}}" class="card-img" alt="Card Users">
                    <div class="card-img-overlay">
                      <h5 class="card-title text-center"><b>Total de Usuários</b></h5>
                      <div class="container justify-content-center">
                        <br><br><br><br>
                        <h1 class="card-text text-center">50</h1>
                      </div>
                    </div>
                </div>

            </div>
            <div class="col-8">
                <h5 style="color: #C08854"><b>Lista de Usuários</b></h5>
                <table class="table table-hover table-warning">
                    <thead class="text-center">
                      <tr>
                        <th scope="col" style="color: #C08854">#ID</th>
                        <th scope="col" style="color: #C08854">Nome</th>
                        <th scope="col" style="color: #C08854">E-mail</th>
                        <th scope="col" style="color: #C08854">Cadastro</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        {{-- @if () --}}
                            <th scope="row" style="color: #C08854">1</th>
                            <td style="color: #C08854">Mark</td>
                            <td style="color: #C08854">Otto</td>
                            <td style="color: #C08854">@mdo</td>
                        {{-- @endif --}}
                      </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection