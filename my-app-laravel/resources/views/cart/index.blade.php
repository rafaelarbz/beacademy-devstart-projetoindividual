@extends('template.layout')
@section('title', 'Carrinho - Coffee')
@section('body')

<div class="container justify-content-center">
    @if ($orders->count() <= 0)
        <br>
        <div class="row justify-content-center">
            <div class="col">
                <h4 style="color: #C08854"><b>Nenhum item adicionado ao carrinho!</b></h4>
            </div>
        </div>
        <img src="{{ asset('storage/home/cart-empty.png')}}" class="mx-auto d-block" alt="Home Image" width="40%">
    @else
        <br>
        <div class="row">
            <div class="col">
                <small>
                    <p style="color: #C08854">
                        <b>
                           VOCÊ TEM {{$orders->count()}} PRODUTOS ADICIONADOS AO CARRINHO!
                        </b>
                    </p>
                </small>
            </div>
        </div>
        <br>
        @foreach ($orders as $order)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$order->product->image)}} " class="img-fluid rounded-start" alt="Product">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$order->product->name}}</h5>
                        <p class="card-text"><b>Sobre este item: </b>{{$order->product->description}}</p>
                        <div class="card-text">
                            <div class="row">
                                <div class="col">
                                    <b>Estoque: </b><span class="badge bg-secondary">{{$order->product->quantity}}</span>
                                </div>
                                <div class="col">
                                    <b>Marca: </b><span class="badge bg-secondary">{{$order->product->brand}}</span>
                                </div>
                                <div class="col">
                                    <b>Categoria: </b><span class="badge bg-secondary">{{$order->product->category}}</span>
                                </div>
                                @if (Auth::user()->is_admin == 1)
                                    <div class="col">
                                        <b>ID do Produto: </b><span class="badge bg-secondary">{{$order->product->id}}</span>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    @if (Auth::user()->is_admin == 1)
                                        <h5>Custo: R${{$order->product->cost}} | Venda: R${{$order->product->price}} | Total: R$ {{ $order->total }}</h5>
                                    @else
                                        <h3>Und.: R$ {{$order->product->price}} &emsp; Total: R$ {{ $order->total }} </h4>
                                    @endif
                                </div>
                            </div>
                            @if (Auth::user()->is_admin == 1)
                                <p class="card-text">
                                    <small class="text-muted">
                                        Editado em: {{ date('d-m-Y - H:i',strtotime($order->product->created_at)) }} | 
                                        Cadastrado em : {{ date('d-m-Y - H:i',strtotime($order->product->updated_at)) }}
                                    </small>
                                </p>
                            @endif
                            <div class="row">
                                <div  class="btn-group justify-content-md-end" role="group" aria-label="Basic example">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <form action="{{ route('cart.addQuantity', $order->id) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                            </svg>
                                            </button>
                                        </form>
                                        <div class="col-2">
                                            <input type="text" class="form-control text-center border-dark" value="{{ $order->unit }}" readonly>
                                        </div>
                                        <form action="{{ route('cart.removeQuantity', $order->id) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg>
                                            </button>
                                        </form>
    
                                        <form action="{{ route('cart.buy', $order->id) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">Comprar Agora</button>
                                        </form>
                                        <form action="{{ route('cart.destroy', $order->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Remover</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach

        <div class="justify-content-center pagination">
            {{$orders->links('pagination::bootstrap-4')}}
        </div>
    @endif
    
</div>

@endsection