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
    <!-- Header -->            
    @include('header')
    <!-- Main navbar-->
        <nav class="container navbar navbar-expand-lg navbar-light" style="background-color: #E4DCCF;">
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
    <div class="container bg-light px-0 mb-3"> 
        @for($i = 0; $i <  $galleriesCount  ; $i++ ) 
        <div class="container-fluid my-3" style="background-color: #E4DCCF;" >
            <header class="container-fluid mb-3">
                    <h1 class="display-4 text-center py-1">{{Str::limit($galleries[$i]['name'], 30, '...')}}</h1>
            </header> 
            <div class="container-fluid d-flex justify-content-center">
                @if( $galleries[$i]['imgPath1'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath1']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath2'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath2']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath3'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath3']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath4'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath4']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath5'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath5']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath6'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath6']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath7'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath7']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
                @if( $galleries[$i]['imgPath8'] != 'none' )
                    <div class="mx-2"><img class="img-fluid mx-auto mb-5" src="{{ asset($galleries[$i]['imgPath8']) }}" style="height: 200px; min-width: 250px;"></div>
                @endif
            </div>
        </div>
        @endfor
    </div>

    <!-- Footer -->  
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>