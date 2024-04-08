@extends('adminlte::page')
  
@section('content')
    @include('products.layout')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <img src="{{ $product->cover }}" alt="Capa do Filme" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                    Detalhes do Filme
                    </h3>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ $product->name }}</dd>
                        <dt>Sinopse</dt>
                        <dd>{{ $product->detail }}</dd>
                    </dl>
                </div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
