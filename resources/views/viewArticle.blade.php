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
        <div class="container bg-light " style="min-height: 85vh">
            <header>
                <h1 class="display-1 text-center py-5">{{$article['name']}}</h1>
            </header>
            <div class="container-fluid text-center" style = "max-width: 700px">
                <p>{{$article['text']}}</p>
            </div>
            <div class="container-fluid d-flex align-items-center">
                <img class="img-fluid mx-auto mb-5" src="{{ asset($article['imgPath']) }}" style="height: 250px;">
            </div>
        </div>
        <div class="container py-2 text-center" style="background-color: #FFF2CC;">
            <a href="{{ asset('/') }}" class="btn btn-success" role="button">Naspäť</a>
        </div>
    <!-- Footer -->  
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>