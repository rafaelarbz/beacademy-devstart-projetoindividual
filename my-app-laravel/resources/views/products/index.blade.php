@extends('template.layout')
@section('title', 'Produtos')
@section('body')

@if (session()->has('add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('add')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('destroy'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('destroy')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container justify-content-center">
    <br>
    <div class="row justify-content-center">
        <div class="col">
            <h4 style="color: #C08854"><b>O melhor para o seu café!</b></h4>
        </div>
        <div class="col">
            <form action="{{ route('products.index') }}" method="GET">
              <div class="input-group">
                  <input type="search" class="form-control rounded" placeholder="Pesquisar Produtos" name="search"/>
                  <button type="submit" class="btn btn-outline-dark">🔍</button>
              </div>
            </form>
        </div>
    </div>
    <br>
    @foreach ($products as $product)
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$product->image)}} " class="img-fluid rounded-start" alt="Product">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text"><b>Sobre este item: </b>{{$product->description}}</p>
                    <div class="card-text">
                        <div class="row">
                            <div class="col">
                                <b>Estoque: </b><span class="badge bg-secondary">{{$product->quantity}}</span>
                            </div>
                            <div class="col">
                                <b>Marca: </b><span class="badge bg-secondary">{{$product->brand}}</span>
                            </div>
                            <div class="col">
                                <b>Categoria: </b><span class="badge bg-secondary">{{$product->category}}</span>
                            </div>
                            @if (Auth::user()->is_admin == 1)
                                <div class="col">
                                    <b>ID do Produto: </b><span class="badge bg-secondary">{{$product->id}}</span>
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                @if (Auth::user()->is_admin == 1)
                                    <h5>Custo: R${{$product->cost}} | Venda: R${{$product->price}}</h5>
                                @else
                                    <h2>R$ {{$product->price}}</h2>
                                @endif
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-primary me-md-2" type="submit">➕ Carrinho</button>
                                    </form>

                                    @if (Auth::user()->is_admin == 1)
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning text-white">✏️</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger text-white">🗑️</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->is_admin == 1)
                        <p class="card-text">
                            <small class="text-muted">
                                Editado em: {{ date('d-m-Y - H:i',strtotime($product->created_at)) }} | 
                                Cadastrado em : {{ date('d-m-Y - H:i',strtotime($product->updated_at)) }}
                            </small>
                        </p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    @endforeach

    <div class="justify-content-center pagination">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</div>


@endsection