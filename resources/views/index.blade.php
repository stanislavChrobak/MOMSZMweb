<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MO MS ZM</title>

        <!-- Styles -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   

    </head>
    <body>
    <!-- Cookie -->            
    @include('cookieAlert')
    <!-- Header -->            
    @include('header')
    <!-- Main navbar-->
    <nav class="container navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-item nav-link active" aria-current="page" href="{{ asset('/') }}">Úvod</a>
                    <a class="nav-item nav-link" href="{{ asset('gallery') }}">Galéria</a>
                    <a class="nav-item nav-link" href="{{ asset('contact') }}">Kontakt</a>
                </div>
            </div>
        </nav>
    <!-- Content -->  
    @if( $hasPreparingActions )
        <div class="container px-0 py-5 px-5" style="background-color: rgb(0, 163, 237,0.2);">
            <h1 class="display-4 text-center py-3" style="color: #01161E;">Pripravujeme</h1>
            <table class="table table-striped ">
                        <thead>
                            <tr>
                            <th scope="col"></th>  
                            <th scope="col">Kedy</th>    
                            <th scope="col">Kde</th>
                            <th scope="col">Poznámka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for( $i = 0; $i < $preparingActionsCount; $i++)
                                <tr>
                                    <th scope="row"> {{ $i+1 }} </th> 
                                    <td>{{ $preparingActions[$i]['when'] }}</td>
                                    <td>{{ $preparingActions[$i]['where'] }}</td>
                                    <td>{{Str::limit($preparingActions[$i]['note'], 60, '...')}}</td>
                                </tr>  
                            @endfor                     
                        </tbody>
                    </table>
        </div>
    @endif
    <div class="container px-0 py-3" style="background-color: #002D3F;"> 
        <div class="container-fluid " >  
        <h1 class="display-4 text-center py-3" style="color: #E4DCCF;">Udialo sa</h1>
            @php
                use Illuminate\Support\Str;
            @endphp

            @for($i = 0; $i <  $articlesCount  ; $i++ )

                <article class="container-fluid my-3 py-2" style="background-color: ##002D3F;">
                    <div class="row">
                        <div class="col-sm-4  text-center d-flex align-items-center">
                            <img class="img-fluid mx-auto" src="{{ asset($articles[$i]['imgPath']) }}" style="height: 250px;">
                        </div>
                        <div class="col-sm-8">
                            <h2 style="color: #E4DCCF;">{{Str::limit($articles[$i]['name'], 30, '...')}}</h2>
                            <p class="text-justify" style="color: #E4DCCF;">{{Str::limit($articles[$i]['text'], 300, '...')}}</p>
                            <p style="color: #E4DCCF;">{{$articles[$i]['created_at']}}</p>
                            <a href="{{ route('view-article', ['id' => $articles[$i]['id']]) }}" style="color: #EFF6E0;">Čítať viac...</a>
                        </div>
                    </div>
                </article>
            @endfor
        </div>

        <div class="container py-3 mb-3 text-center" style="background-color: #002D3F;">
            <span style="color: #EFF6E0;">Stránka: </span>
        @for($i = 1; $i <=  $pagesCount  ; $i++ )
            @if( $actualPage == $i )
                <a href="{{ route('get-articles-of-page', ['id' => $i]) }}" style="color: #598392;">{{ $i }}</a>
            @else
                <a href="{{ route('get-articles-of-page', ['id' => $i]) }}" style="color: #EFF6E0;">{{ $i }}</a>
            @endif
            
        @endfor
    </div>
    </div>

    

    <!-- Footer -->  
    @include('footer')

    
    </body>
</html>