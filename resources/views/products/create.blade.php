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
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-ban"></i><strong>Ops!</strong> Existem problemas com seu input.<br><br>
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
                        <label for="name">Ano de Lançamento</label>
                        <input type="text" class="form-control" id="release" placeholder="Ano" name="release">
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
                    <button type="button" class="btn btn-warning" onclick="getMovieData()">Pegar Infos do filme</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div id="movieCoverContainer" class="flex items-center p-4 ml-md-3">
            <img id="movieCoverImage" src="https://upload.wikimedia.org/wikipedia/commons/b/b9/No_Cover.jpg" alt="Capa do Filme" style="height:350px" class="rounded img-fluid">
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

    var apiKey = "{{ $apiKey }}";
    var tmdbEndpoint = "{{ $tmdbEndpoint }}";
    

    function getMovieData() {
        var movieName = document.getElementById('name').value;

        if (!movieName) {
            alert('Por favor, insira o nome do filme.');
            return;
        }

        // Solicita os filmes correspondentes ao nome fornecido
        fetch(`${tmdbEndpoint}search/movie?api_key=${apiKey}&query=${encodeURIComponent(movieName)}&language=pt-BR&page=1&include_adult=false`)
            .then(response => response.json())
            .then(data => {
                // Verifica se foram encontrados filmes correspondentes
                if (data.results.length > 0) {
                    // Obtém o ID do primeiro filme encontrado
                    var movieId = data.results[0].id;
                    // Atualiza a capa do filme com o ID obtido
                    updateMovieData(movieId);
                } else {
                    alert('Nenhum filme encontrado com esse nome.');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar filmes:', error);
            });
    }

    function updateMovieData(movieId) {
        // Solicita os detalhes do filme com o ID fornecido na API em português
        fetch(`${tmdbEndpoint}movie/${movieId}?api_key=${apiKey}&language=pt-BR`)
            .then(response => response.json())
            .then(data => {
                // Verifica se a sinopse está disponível em português
                var overview = data.overview;
                if (!overview) {
                    // Se a sinopse não estiver disponível em português, solicita na API em inglês
                    fetch(`${tmdbEndpoint}movie/${movieId}?api_key=${apiKey}&language=en-US`)
                        .then(response => response.json())
                        .then(data => {
                            // Atualiza a sinopse com os dados obtidos na API em inglês
                            overview = data.overview;
                            document.getElementById('overview').value = overview;
                        })
                        .catch(error => {
                            console.error('Erro ao buscar sinopse do filme em inglês:', error);
                        });
                } else {
                    // Se a sinopse estiver disponível em português, atualiza normalmente
                    document.getElementById('overview').value = overview;
                }

                // Atualiza a capa do filme na página
                var movieCoverUrl = `https://image.tmdb.org/t/p/w500/${data.poster_path}`;
                var movieCoverImage = document.getElementById('movieCoverImage');
                movieCoverImage.src = movieCoverUrl;
                movieCoverImage.style.display = 'block';

                document.getElementById('coverInput').value = movieCoverUrl;

                var releaseDate = new Date(data.release_date);
                var releaseYear = releaseDate.getFullYear();

                var release = document.getElementById('release');
                release.value = releaseYear;
            })
            .catch(error => {
                console.error('Erro ao buscar detalhes do filme em português:', error);
            });
    }
</script>
@stop