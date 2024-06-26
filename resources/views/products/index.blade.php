@extends('adminlte::page')

@section('content')
    @include('products.layout')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>{{ $message }}</h5>
        </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Erro!</h5>
        {{ session('error') }}
    </div>
    @endif


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Catálogo de filmes</h3>
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
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)

                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ $product->cover }}" alt="Capa do Filme" style="height: 100px;"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->release }}</td>
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
                    <tr class="expandable-body">
                    <td colspan="5">
                    <p style="">
                    {{ $product->detail }}
                    </p>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                        <a href="/products/create" class="btn btn-sm btn-info float-right">Novo Filme</a>   {{ $products->links() }} 
                        </ul>
                </div>
            </div>
        </div>
    </div>
      
@endsection