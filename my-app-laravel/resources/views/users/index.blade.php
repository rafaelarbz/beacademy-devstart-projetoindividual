@extends('template.layout')
@section('title', 'Usuários')
@section('body')

    <div class="container-fluid">
      <br>
        <div class="row">
            <div class="col-4">
                <div class="card bg-light text-white">
                    <img src="{{ asset('storage/home/admin-users.gif')}}" class="card-img" alt="Card Users">
                    <div class="card-img-overlay">
                      <h5 class="card-title text-center"><b>Total de Usuários</b></h5>
                      <div class="container justify-content-center">
                        <br><br><br><br>
                        <h1 class="card-text text-center">{{$usersCount->count()}}</h1>
                      </div>
                    </div>
                </div>

            </div>
            <div class="col-8">
                <div class="row">
                  <div class="col">
                    <h4 style="color: #C08854"><b>Lista de Usuários</b></h4>
                  </div>
                  <div class="col">
                    <form action="{{ route('users.index') }}" method="GET">
                      <div class="input-group">
                          <input type="search" class="form-control rounded" placeholder="Pesquisar Usuário" name="search"/>
                          <button type="submit" class="btn btn-outline-dark">🔍</button>
                      </div>
                    </form>
                  </div>
                </div>
                <table class="table table-hover table-ligh">
                    <thead class="text-center">
                      <tr>
                        <th scope="col" style="color: #C08854">#ID</th>
                        <th scope="col" style="color: #C08854">Nome</th>
                        <th scope="col" style="color: #C08854">E-mail</th>
                        <th scope="col" style="color: #C08854">Cadastro</th>
                        <th scope="col" style="color: #C08854">Reservas</th>
                        <th scope="col" style="color: #C08854">Compras</th>
                        <th scope="col" style="color: #C08854">Tipo</th>

                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach ($users as $user)
                        <tr>
                          <th scope="row" style="color: #C08854">{{ $user->id }}</th>
                          <td style="color: #C08854">{{ $user->name }}</td>
                          <td style="color: #C08854">{{ $user->email }}</td>
                          <td style="color: #C08854">{{ date('d/m/Y',strtotime($user->created_at)) }}</td>
                          <td style="color: #C08854">{{ $user->order->where('status', 'RE')->count()}}</td>
                          <td style="color: #C08854">{{ $user->order->where('status', 'BUY')->count()}}</td>
                          @if ($user->is_admin == 1)
                            <td style="color:#ff0000">Admin</td>
                          @else
                            <td style="color:#0275d8">Comum</td>
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                <div class="justify-content-center pagination">
                  {{$users->links('pagination::bootstrap-4')}}
                </div>
            </div>

        </div>

    </div>
@endsection