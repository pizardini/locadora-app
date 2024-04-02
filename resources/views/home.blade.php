{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in teste!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
    <div class="col-lg-3 col-6">

    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $productCount }}</h3>
    <p>{{ $productCount == 1 ? 'Filme' : 'Filmes' }} no catálogo</p>
    </div>
    <div class="icon">
    <i class="fas fa-fw fa-film"></i>
    </div>
    <a href="/products" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>


    <div class="col-lg-3 col-6">

    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{ $customerCount }}</h3>
    <p>{{ $productCount == 1 ? 'Cliente' : 'Clientes' }} cadastrados</p>
    </div>
    <div class="icon">
    <i class="fas fa-user-plus"></i>
    </div>
    <a href="/customers" class="small-box-footer">
    More info <i class="fas fa-fw fa-user"></i>
    </a>
    </div>
    </div>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop