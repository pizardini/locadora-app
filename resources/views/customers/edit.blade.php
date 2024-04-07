@extends('adminlte::page')

@section('content')
@include('customers.layout')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Cliente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('customers.update',$customer->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome Completo:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $customer->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPF:</strong>
                <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ $customer->cpf }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong>
                <input type="text" name="telefone" class="form-control brcel" placeholder="Telefone" value="{{ $customer->cpf }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereço:</strong>
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ $customer->endereco }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name="cpf"]').mask('000.000.000-00');
    });

    $(document).ready(function(){
    var BRMask = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 0-0000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(BRMask.apply({}, arguments), options);
        }
    };

    $('.brcel').mask(BRMask, spOptions);
});
</script>
@endsection