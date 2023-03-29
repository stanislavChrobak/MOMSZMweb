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
            <a class="nav-link active" href="{{ asset('GUI-index/gallery') }}">Späť</a>
        </nav>
        <h1 class="text-center"> Pridať galériu </h1>
    </div>
    <div class="container d-flex justify-content-center" style="max-width: 500px;">
        {!! Form::open(['url' => '/submit-add-gallery', 'enctype' => 'multipart/form-data']) !!}


            <div class="form-group">
                {!! Form::label('name', 'Meno') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '49']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image1', 'Obrázok 1 - povinný') !!}
                {!! Form::file('image1', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image2', 'Obrázok 2 - volitelný') !!}
                {!! Form::file('image2', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image3', 'Obrázok 3 - volitelný') !!}
                {!! Form::file('image3', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image4', 'Obrázok 4 - volitelný') !!}
                {!! Form::file('image4', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image5', 'Obrázok 5 - volitelný') !!}
                {!! Form::file('image5', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image6', 'Obrázok 6 - volitelný') !!}
                {!! Form::file('image6', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image7', 'Obrázok 7 - volitelný') !!}
                {!! Form::file('image7', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image8', 'Obrázok 8 - volitelný') !!}
                {!! Form::file('image8', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>

            

        {!! Form::submit('Uložiť', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>