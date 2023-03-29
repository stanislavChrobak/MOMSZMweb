<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MO MS ZM</title>

        <!-- Styles -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
        
    </head>
    <body>
    <div class="container">
        <nav class="nav justify-content-end">
            <a class="nav-link active" href="{{ asset('logout') }}">Odhlásiť</a>
        </nav>
        <h1 class="text-center"> MO MS ZM GUI </h1>
        <div class='containel-luid'>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    @if( $activePage == 'articles' )
                        <a class="nav-link active" href="{{ route('GUI-index', ['id' => 'articles']) }}">Články</a>
                    @else
                        <a class="nav-link" href="{{ route('GUI-index', ['id' => 'articles']) }}">Články</a>
                    @endif
                    
                </li>
                <li class="nav-item">
                    @if( $activePage == 'articles' )
                        <a class="nav-link" href="{{ route('GUI-index', ['id' => 'gallery']) }}">Galéria</a>
                    @else
                        <a class="nav-link active" href="{{ route('GUI-index', ['id' => 'gallery']) }}">Galéria</a>
                    @endif
                </li>
            </ul>
        </div>
        @if( $activePage == 'articles' )
            <div class="container-fluid py-2 text-center mb-5" style="background-color: #FFF2CC;">
                <a href="{{ asset('add-article') }}" class="btn btn-success" role="button">Vytvoriť nový článok</a>
            </div>

            <div class="container-fluid py-2">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Riadok</th>    
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Obsah</th>
                        <th scope="col">Dátum a čas vytvorenia</th>
                        <th scope="col">Upraviť</th>
                        <th scope="col">Zmazať</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i <  $articlesCount  ; $i++ )
                            <tr>
                                <th scope="row"> {{$i+1}} </th>
                                <td>{{$articles[$i]['id']}}</td>
                                <td>{{Str::limit($articles[$i]['name'], 30, '...')}}</td>
                                <td>{{Str::limit($articles[$i]['text'], 30, '...')}}</td>
                                <td>{{$articles[$i]['created_at']}}</td>
                                <td>
                                    <a href="{{ route('edit-article', ['id' => $articles[$i]['id']]) }}" style="color: white;">Upraviť</a>
                                </td>
                                <td>
                                    <form action="{{ route('delete-article', ['id' => $articles[$i]['id']]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="article_id" value="{{ $articles[$i]['id'] }}">
                                        <button type="submit">Zmazať</button>
                                    </form>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div> 
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>