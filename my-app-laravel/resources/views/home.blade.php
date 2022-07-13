@extends('template.layout')
@section('title', 'Coffee - Home')
@section('body')

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all(); as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif
    <img src="{{ asset('storage/home/coffee.gif')}}" class="mx-auto d-block" alt="Home Image" width="40%">

@endsection