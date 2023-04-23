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
    <!-- Cookie -->            
    @include('cookieAlert')
    <!-- Header -->            
    @include('header')
    <!-- Main navbar-->
        <nav class="container navbar navbar-expand-lg navbar-light" >
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" aria-current="page" href="{{ asset('/') }}">Úvod</a>
                    <a class="nav-item nav-link active" href="{{ asset('gallery') }}">Galéria</a>
                    <a class="nav-item nav-link " href="{{ asset('contact') }}">Kontakt</a>
                </div>
            </div>
        </nav>
    <!-- Content -->  
    <div class="container px-0" > 
        @for($i = 0; $i <  $galleriesCount  ; $i++ ) 
        <div class="container-fluid py-3" style="background-color: rgb(0, 163, 237,0.2);" >
            <header class="container-fluid pb-3">
                    <h1 class="display-4 text-center py-3">{{Str::limit($galleries[$i]['name'], 30, '...')}}</h1>
            </header> 
            <div class="row">
                @if( $galleries[$i]['imgPath1'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath1']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath2'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath2']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath3'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath3']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath4'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath4']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath5'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath5']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath6'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath6']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath7'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath7']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath8'] != 'none' )
                    <div class="col mx-2 d-flex justify-content-center"><img class="img-fluid mx-auto mb-5 rounded img-thumbnail" src="{{ asset($galleries[$i]['imgPath8']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
            </div>
        </div>
        @endfor
    </div>

    <div class="container py-3 text-center" style="background-color: rgb(0, 163, 237,0.2);">
            <span>Stránka: </span>
        @for($i = 1; $i <=  $pagesCount  ; $i++ )
            @if( $actualPage == $i )
                <a href="{{ route('get-galleries-of-page', ['id' => $i]) }}" style="color: red;">{{ $i }}</a>
            @else
                <a href="{{ route('get-galleries-of-page', ['id' => $i]) }}" style="color: black;">{{ $i }}</a>
            @endif
            
        @endfor
    </div>

    <!-- Footer -->  
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>