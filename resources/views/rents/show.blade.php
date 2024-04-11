@extends('adminlte::page')
  
@section('content')
    @include('rents.layout')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <img src="{{ $rent->product->cover }}" alt="Capa do Filme" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                    Detalhes da Locação
                    </h3>
                </div>
                <div class="card-body">
                <dl>
                        <dt>Nome do Cliente</dt>
                        <dd>{{ $rent->customer->name }}</dd>
                        <dt>Nome do Filme</dt>
                        <dd>{{ $rent->product->name }}</dd>
                        <dt>Data de Locação</dt>
                        <dd>{{ $rent->rental_date }}</dd>
                        <dt>Prazo de Devolução</dt>
                        <dd>{{ $rent->return_date }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $rent->active ? 'Alugado' : 'Devolvido' }}</dd>
                        @if (!$rent->active)
                        <dt>Data de Devolução</dt>
                        <dd>{{ $rent->returned_at }}</dd>
                        <dt>Taxa de Atraso</dt>
                        <dd>R${{ str_replace('.', ',', $rent->late_fee) }}</dd>
                        @endif
                        <dt>Valor Total</dt>
                        <dd>R${{ str_replace('.', ',', $rent->total_amount) }}</dd>
                    </dl>
                </div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rents.index') }}">Voltar</a>
                @if ($rent->active)
                <a class="btn btn-warning" href="{{ route('rents.return', $rent->id) }}">Devolver</a>
                @csrf
                @endif
                <form action="{{ route('rents.destroy', $rent->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
@endsection
