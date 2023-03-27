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
            <a class="nav-link active" href="{{ asset('GUI-index') }}">Späť</a>
        </nav>
        <h1 class="text-center"> Upraviť článok </h1>
    </div>
    <div class="container d-flex justify-content-center" style="max-width: 500px;">
        <!--{!! Form::open(['url' => '/submit-edit-article', 'enctype' => 'multipart/form-data']) !!}-->
        @php
            $imagePath = Str::remove('storage/images/', $article['imgPath']);
        @endphp

        {!! Form::open(['url' => '/submit-edit-article/' . $article['id'] .'/'.$imagePath , 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}    
        {!! Form::hidden('_method', 'PUT') !!}

            <div class="form-group">
                {!! Form::label('name', 'Meno') !!}
                {!! Form::text('name', $article['name'], ['class' => 'form-control', 'maxlength' => '49']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('text', 'Obsah článku') !!}
                {!! Form::textArea('text', $article['text'] , ['class'=> 'form-control', 'maxlength' => '999']) !!}
            </div>

            <div class="form-group">
                @if($hasImage)
                    {!! Form::label('info', 'Aktuálny obrázok') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath) }}" style="height: 250px;">
                @else
                    {!! Form::label('info', 'Článok nemá obrázok') !!}
                @endif
                
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Nový obrázok') !!}
                {!! Form::file('image', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            

        {!! Form::submit('Uložiť', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>