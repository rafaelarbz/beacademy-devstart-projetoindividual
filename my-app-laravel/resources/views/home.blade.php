@extends('template.layout')
@section('title', 'Coffee - Home')
@section('body')
    @if (session()->has('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('store')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <img src="{{ asset('storage/home/coffee.gif')}}" class="mx-auto d-block" alt="Home Image" width="40%">

@endsection