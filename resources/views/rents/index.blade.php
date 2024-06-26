@extends('adminlte::page')

@section('content')
    @include('customers.layout')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Locações Ativas</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Data Locação</th>
                        <th>Prazo Devolução</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeRents as $rent)
                        <tr>
                            <td>{{ $rent->id }}</td>
                            <td>{{ $rent->customer->name }}</td>
                            <td>{{ $rent->product->name }}</td>
                            <td>{{ $rent->rental_date }}</td>
                            <td>{{ $rent->return_date }}</td>
                            <td>{{ $rent->active ? 'Alugado' : 'Devolvido' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('rents.show', $rent->id) }}">Exibir</a>
                                <a class="btn btn-primary" href="{{ route('rents.edit', $rent->id) }}">Editar</a>
                                <form action="{{ route('rents.destroy', $rent->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                <a class="btn btn-warning" href="{{ route('rents.return', $rent->id) }}">Devolver</a>
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
            {{ $activeRents->links() }}
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Locações Inativas</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Data Locação</th>
                        <th>Data Devolução</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inactiveRents as $rent)
                        <tr>
                            <td>{{ $rent->id }}</td>
                            <td>{{ $rent->customer->name }}</td>
                            <td>{{ $rent->product->name }}</td>
                            <td>{{ $rent->rental_date }}</td>
                            <td>{{ $rent->returned_at }}</td>
                            <td>{{ $rent->active ? 'Alugado' : 'Devolvido' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('rents.show', $rent->id) }}">Exibir</a>
                                <a class="btn btn-primary" href="{{ route('rents.edit', $rent->id) }}">Editar</a>
                                @csrf
                                <form action="{{ route('rents.destroy', $rent->id) }}" method="POST" style="display: inline;">
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
        <!-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
            {{-- {{ $inactiveRents->links() }}  --}} 
            </ul>
        </div> -->
    </div>
@endsection
