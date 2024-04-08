
@extends('adminlte::page')
 
@section('content')
@include('customers.layout')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Clientes</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <!-- <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th width="280px">Ações</th>
        </tr>
        {{-- @foreach ($customers as $customer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->cpf }}</td>
            <td>{{ $customer->telefone }}</td>
            <td>{{ $customer->endereco }}</td>
            <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Exibir</a>
    
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach --}}
    </table> -->

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title"></h3>
<!-- <div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div> -->
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover">
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Telefone</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
@foreach ($customers as $customer)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $customer->name }}</td>
<td>{{ $customer->cpf }}</td>
<td>{{ $customer->telefone }}</td>
<td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Exibir</a>
    
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>

</div>
</div>
      
@endsection