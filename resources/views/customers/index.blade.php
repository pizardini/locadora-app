@extends('adminlte::page')

@section('content')
    @include('customers.layout')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Clientes</h3>
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