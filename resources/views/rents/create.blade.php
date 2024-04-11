@extends('adminlte::page')

@section('content')
@include('rents.layout')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-ban"></i><strong> Ops!</strong> Existem problemas com seu input.<br><br>
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
                <h3 class="card-title">Cadastrar Locação</h3>
            </div>

            <form action="{{ route('rents.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_id">Filme</label>
                        <select class="form-control" id="product_id" name="product_id" style="height: 37px">
                            <option value="">Selecione o Filme</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_id">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id">
                        @if ($selectedCustomer)
                            <option value="{{ $selectedCustomer->id }}" selected>{{ $selectedCustomer->name }}</option>
                        @else
                            <option value="">Selecione o Cliente</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rental_date">Data de Locação</label>
                        <input type="date" class="form-control" id="rental_date" name="rental_date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="return_date">Prazo de Devolução</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" value="{{ \Carbon\Carbon::parse(date('Y-m-d'))->addDays(7)->format('Y-m-d') }}">
                    </div>
                    <!-- <div class="form-group">
                        <label for="returned_at">Data de Devolução</label>
                        <input type="date" class="form-control" id="returned_at" name="returned_at">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="active">Ativa</label>
                        <select class="form-control" id="active" name="active">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="total_amount">Valor</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="0,00">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>

<script>
    // $(function(){
    //     $('#total_amount').maskMoney({
    //     prefix:'R$ ',
    //     allowNegative: false,
    //     thousands:'.', decimal:',',
    //     affixesStay: true,
    //     unmaskAsNumber: true,
    //     });
    // });

    $(document).ready(function() {
        $('#product_id').select2({
            placeholder: 'Selecione o Filme',
            allowClear: false,
            width: '100%',
            height: '37px',
            theme: 'classic',
        });
    });
</script>
@endsection
