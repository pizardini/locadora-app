@extends('adminlte::page')
  
@section('content')
    @include('rents.layout')
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
        </div>
    </div> -->
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                    Dados Cadastrais
                    </h3>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ $customer->name }}</dd>
                        <dt>Email</dt>
                        <dd>{{ $customer->email }}</dd>
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
                <a class="btn btn-primary" href="{{ route('customers.index') }}">Voltar</a> <a class="btn btn-success" href="{{ route('rents.create', ['customerId' => $customer->id]) }}">Alugar Filme</a>
            </div>
        </div>
        <div class="col-md-6">
            @if ($rents->count() > 0)
            @foreach ($rents as $rent)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Locação do Cliente
                        </h3>
                    </div>
                    <div class="card-body">
                        <dl>
                            <dt>Nome do Filme</dt>
                            <dd>{{ $rent->product->name }}</dd>
                            <dt>Data de Locação</dt>
                            <dd>{{ $rent->rental_date }}</dd>
                            <dt>Prazo de Devolução</dt>
                            <dd>{{ $rent->return_date }}</dd>
                            @if ($rent->active)
                                <dt>Alugado</dt>
                                <dd>Sim</dd>
                                <dt>Valor Total</dt>
                                <dd>R${{ str_replace('.', ',', $rent->total_amount) }}</dd>
                            @else
                                <dt>Data de Devolução</dt>
                                <dd>{{ $rent->returned_at }}</dd>
                                <dt>Taxa de Atraso</dt>
                                <dd>R${{ str_replace('.', ',', $rent->late_fee) }}</dd>
                                <dt>Valor Total</dt>
                                <dd>R${{ str_replace('.', ',', $rent->total_amount) }}</dd>
                            @endif
                        </dl>
                    </div>
                </div>
            @endforeach
            @else
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Locação do Cliente
                        </h3>
                    </div>
                        <div class="card-body">
                            <dl>
                            <p>O cliente não possui locações.</p>
                            </dl>
                        </div>
                </div>
                @endif
        </div>
    </div>
@endsection