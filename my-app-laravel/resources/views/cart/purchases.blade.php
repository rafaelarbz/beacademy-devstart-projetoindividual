@extends('template.layout')
@section('title', 'Compras - Coffee')
@section('body')

<div class="container justify-content-center">
    @if ($orders->count() <= 0)
        <br>
        <div class="row justify-content-center">
            <div class="col">
                <h4 style="color: #C08854"><b>Nenhum item comprado!</b></h4>
            </div>
        </div>
        <img src="{{ asset('storage/home/cart-empty.png')}}" class="mx-auto d-block" alt="Home Image" width="40%">
    @else
        <br>
        <div class="row justify-content-center">
            <div class="col">
                <h4 style="color: #C08854"><b>Você realizou {{$orders->count()}} compras em nossa loja!</b></h4>
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
                                        <h5>Custo: R${{$order->product->cost}} | Venda: R${{$order->product->price}}</h5>
                                    @else
                                        <h2>R$ {{$order->product->price}}</h2>
                                    @endif
                                </div>
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