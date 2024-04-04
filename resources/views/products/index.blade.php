@extends('adminlte::page')
 
@section('content')
    @include('products.layout')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Catálogo de Filmes</h2>
            </div>
            <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Cadastrar Filme</a>
            </div> -->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Detalhes</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Exibir</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection