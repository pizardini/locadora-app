@extends('adminlte::page')
<style>
    .expandable-body p {
        max-height: 100px; /* Defina a altura máxima desejada */
        overflow-y: auto; /* Adicione uma barra de rolagem vertical se o conteúdo ultrapassar a altura máxima */
    }
</style>

 
@section('content')
    @include('products.layout')
<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Catálogo de Filmes</h2>
            </div>
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
            <th>Capa</th>
            <th>Nome</th>
            <th>Detalhes</th>
            <th width="280px">Ações</th>
        </tr>
        {{-- @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="{{ $product->cover }}" alt="Capa do Filme" style="height: 100px;"></td>
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
                        <!-- </div> -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)

                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ ++$i }}</td>
                    <td><img src="{{ $product->cover }}" alt="Capa do Filme" style="height: 100px;"></td>
                    <td>{{ $product->name }}</td>
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
            </div>
        </div>
    </div>
</body>
      
@endsection