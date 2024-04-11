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
                <h3 class="card-title">Devolver Locação</h3>
            </div>

            <form action="{{ route('rents.update',$rent->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_id">Filme</label>
                        <select class="form-control" id="product_id" name="product_id" style="height: 37px" readonly>
                            <option value="{{ $rent->product->id }}" selected>{{ $rent->product->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_id">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id" readonly>
                            <option value="{{ $rent->customer->id }}" selected>{{ $rent->customer->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rental_date">Data de Locação</label>
                        <input type="date" class="form-control" id="rental_date" name="rental_date" value="{{ $rent->rental_date }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="return_date">Prazo de Devolução</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" value="{{ $rent->return_date }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="returned_at">Data de Devolução</label>
                        <input type="date" class="form-control" id="returned_at" name="returned_at" value="{{ date('Y-m-d') }}" required>
                    </div>
                        <input type="hidden" name="active" value="0">
                    <div class="form-group">
                        <label for="late_fee">Taxa de Atraso</label>
                        <input type="text" type="text" class="form-control" id="late_fee" name="late_fee" onchange="updateTotal()" placeholder="0,00">
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Valor Total</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ $rent->total_amount }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Devolver</button>
                    <a class="btn btn-outline-primary" href="{{ URL::previous() }}">Voltar</a>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>

<script>

    // $(function(){
    //     $('#late_fee').maskMoney({
    //         prefix:'R$ ',
    //         allowNegative: false,
    //         thousands:'.', decimal:',',
    //         affixesStay: true,
    //         unmaskAsNumber: true,});
    // })
    // $(function(){
    //     $('#total_amount').maskMoney({
    //         prefix:'R$ ',
    //         allowNegative: false,
    //         thousands:'.', decimal:',',
    //         affixesStay: true,
    //         unmaskAsNumber: true,});
    // })

    function updateTotal() {
        var lateFee = parseFloat(document.getElementById('late_fee').value);
        
        var totalAmount = parseFloat('{{ $rent->total_amount }}');
        var updatedTotal = lateFee + totalAmount;
        
        document.getElementById('total_amount').value = updatedTotal.toFixed(2);
    }
</script>
@endsection
