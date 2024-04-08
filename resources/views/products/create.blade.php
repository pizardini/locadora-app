@extends('adminlte::page')

@section('content')
    @include('products.layout')
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
                <h3 class="card-title">Adicionar Filme</h3>
            </div>

            <form action="{{ route('products.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Título</label>
                        <input type="text" class="form-control" id="name" placeholder="Nome" name="name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Sinopse</label>
                        <textarea class="form-control" id="overview" name="detail" rows="4" placeholder="Sinopse do Filme..."></textarea>
                    </div>
                    <input type="hidden" name="cover" id="coverInput">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a class="btn btn-outline-primary" href="{{ route('products.index') }}"> Voltar</a>
                    <button type="button" class="btn btn-warning" onclick="getMovieCover()">Pegar Infos do filme</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div id="movieCoverContainer" class="flex items-center p-4 ml-md-3">
            <img id="movieCoverImage" src="#" alt="Capa do Filme" style="height:350px" class="rounded img-fluid">
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

    // Obtenha a chave da API e o endpoint da API do controller
    var apiKey = "{{ $apiKey }}";
    var tmdbEndpoint = "{{ $tmdbEndpoint }}";
    
    // Execute essa função assim que a página for carregada
    window.onload = function() {
        // Faça uma solicitação à API TMDb para obter os filmes disponíveis
        fetch(`${tmdbEndpoint}movie/popular?api_key=${apiKey}&language=es-ES&page=1`)
            .then(response => response.json())
            .then(data => {
                // Preencha dinamicamente as opções do campo de seleção com os filmes disponíveis
                var select = document.getElementById('tmdb_id');
                data.results.forEach(movie => {
                    var option = document.createElement('option');
                    option.value = movie.id;
                    option.textContent = movie.title;
                    select.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erro ao buscar filmes:', error);
            });
    };

    function getMovieCover() {
        var movieName = document.getElementById('name').value;
        var apiKey = "{{ $apiKey }}";
        var tmdbEndpoint = "{{ $tmdbEndpoint }}";

        // Verifica se um nome de filme foi fornecido
        if (!movieName) {
            alert('Por favor, insira o nome do filme.');
            return;
        }

        // Solicita os filmes correspondentes ao nome fornecido
        fetch(`${tmdbEndpoint}search/movie?api_key=${apiKey}&query=${encodeURIComponent(movieName)}&language=en-US&page=1&include_adult=false`)
            .then(response => response.json())
            .then(data => {
                // Verifica se foram encontrados filmes correspondentes
                if (data.results.length > 0) {
                    // Obtém o ID do primeiro filme encontrado
                    var movieId = data.results[0].id;
                    // Atualiza a capa do filme com o ID obtido
                    updateMovieCover(movieId);
                } else {
                    alert('Nenhum filme encontrado com esse nome.');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar filmes:', error);
            });
    }

    function updateMovieCover(movieId) {
        var apiKey = "{{ $apiKey }}";
        var tmdbEndpoint = "{{ $tmdbEndpoint }}";

        // Solicita os detalhes do filme com o ID fornecido
        fetch(`${tmdbEndpoint}movie/${movieId}?api_key=${apiKey}&language=en-US`)
            .then(response => response.json())
            .then(data => {
                // Atualiza a capa do filme na página
                var movieCoverUrl = `https://image.tmdb.org/t/p/w500/${data.poster_path}`;
                var movieCoverImage = document.getElementById('movieCoverImage');
                movieCoverImage.src = movieCoverUrl;
                movieCoverImage.style.display = 'block';

                document.getElementById('coverInput').value = movieCoverUrl;

            // Atualiza a sinopse do filme na página
            var overview = document.getElementById('overview');
            overview.value = data.overview;
            })
            .catch(error => {
                console.error('Erro ao buscar capa do filme:', error);
            });
    }
</script>
@stop