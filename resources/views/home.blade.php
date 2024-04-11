{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in App Locadora!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="row">
            <div class="col-lg-3 col-6 droppable">
                <div class="small-box bg-info draggable">
                    <div class="inner">
                    <h3>{{ $productCount }}</h3>
                    <p>{{ $productCount == 1 ? 'Filme' : 'Filmes' }} no catálogo</p>
                    </div>
                <div class="icon">
                    <i class="fas fa-fw fa-film"></i>
                </div>
                <a href="/products" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6 droppable">
            <div class="small-box bg-warning draggable">
                <div class="inner">
                    <h3>{{ $customerCount }}</h3>
                    <p>{{ $customerCount == 1 ? 'Cliente' : 'Clientes' }} cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-user"></i>
                </div>
                <a href="/customers" class="small-box-footer">
                More info <i class="fas fa-fw fa-user"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6 droppable">
            <div class="small-box bg-success draggable">
                <div class="inner">
                    <h3>{{ $rentCount }}</h3>
                    <p>{{ $rentCount == 1 ? 'Filme' : 'Filmes' }} alugados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-tv"></i>
                </div>
                <a href="/rents" class="small-box-footer">
                More info <i class="fas fa-fw fa-user"></i>
                </a>
            </div>
        </div>

    </div>
    <div class="row">
    <div class="col-lg-6 droppable">
            <div class="card draggable">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>Locações por Mês</h3>
                </div>
                <div class="card-body">
                    <canvas id="rentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(function () {
            var ctx = document.getElementById('rentsChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                        label: 'Quantidade de Locações',
                        data: {!! json_encode($rentsPerMonth) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'black'
                            }
        }
                    }
                }
            });
        });

        $(document).ready(function() {
        $(".draggable").draggable(); // Torna os cartões arrastáveis
        $(".droppable").droppable({ // Define a área de drop
            drop: function(event, ui) {
                $(this).append(ui.draggable); // Move o cartão arrastado para dentro da área de drop
            }
        });
    });
    </script>
@stop