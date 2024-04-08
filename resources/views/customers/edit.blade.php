@extends('adminlte::page')

@section('content')
@include('customers.layout')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Cliente</h2>
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

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>

            <form action="{{ route('customers.update',$customer->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Nome" name="name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" >
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="___.___.___-__" value="{{ $customer->cpf }}">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control brcel" id="telefone" name="telefone" placeholder="(XX) 0-0000-0000" value="{{ $customer->telefone }}">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" value="{{ $customer->endereco }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a class="btn btn-primary" href="{{ route('customers.index') }}"> Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
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