@extends('customers.layout')
@extends('adminlte::page')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Exibir Cliente</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                    Cliente
                    </h3>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ $customer->name }}</dd>
                        <dt>CPF</dt>
                        <dd>{{ $customer->cpf }}</dd>
                        <dt>Telefone</dt>
                        <dd>{{ $customer->telefone }}</dd>
                        <dt>Endereço</dt>
                        <dd>{{ $customer->endereco }}</dd>
                    </dl>
                </div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection