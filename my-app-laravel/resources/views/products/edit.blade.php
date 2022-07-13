@extends('template.layout')
@section('title', 'Editar Produto')
@section('body')
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all(); as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif
    <h3 class="text-center pt-5 text-primary">Cadastrar Produto</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Nome do Produto</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{$product->category}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="image">Adicionar imagem</label>
                            <input type="file" class="form-control-file" id="image" name="image" value="{{$product->image}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cost">Custo em R$</label>
                            <input type="currency" class="form-control" id="cost" name="cost" placeholder="00.00" value="{{$product->cost}}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="price">Venda em R$</label>
                            <input type="currency" class="form-control" id="price" name="price" placeholder="00.00" value="{{$product->price}}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="quantity">Qtd. em Estoque</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description"  name="description" rows="4">{{$product->description}}</textarea>
                        </div>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>
        </div>
        <br><br>
    </div>

@endsection