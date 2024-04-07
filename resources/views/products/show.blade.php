@extends('adminlte::page')
  
@section('content')
    @include('products.layout')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Exibir Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Voltar</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <img src="{{ $product->cover }}" alt="Capa do Filme" style="max-width: 100%; height: auto;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
                <strong>Título:</strong><br>
                {{ $product->name }}
            </div>
            <div class="form-group">
                <strong>Sinopse:</strong><br>
                {{ $product->detail }}
            </div>
        </div>
        teste
    </div>
@endsection
