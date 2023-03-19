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
    <!-- Content -->  
    <div class="container bg-light px-1">   
        @php
            use Illuminate\Support\Str;
        @endphp

        @for($i = 0; $i <  $articlesCount  ; $i++ )

            <article class="container-fluid my-3 py-2" style="background-color: #E4DCCF;">
                <div class="row">
                    <div class="col-sm-4  text-center d-flex align-items-center">
                        <img class="img-fluid mx-auto" src="{{ asset($articles[$i]['imgPath']) }}" style="height: 250px;">
                    </div>
                    <div class="col-sm-8">
                        <h2>{{Str::limit($articles[$i]['name'], 30, '...')}}</h2>
                        <p class="text-justify">{{Str::limit($articles[$i]['text'], 300, '...')}}</p>
                        <p>{{$articles[$i]['created_at']}}</p>
                    </div>
                </div>
            </article>
        @endfor
    </div>

    <!-- Footer -->  
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>