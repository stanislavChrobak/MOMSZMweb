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
            <a class="nav-link active" href="{{ asset('GUI-index/articles') }}">Späť</a>
        </nav>
        <h1 class="text-center"> Pridať novú udalosť </h1>
    </div>
    <div class="container d-flex justify-content-center" style="max-width: 500px;">
        {!! Form::open(['url' => '/submit-add-action', 'enctype' => 'multipart/form-data']) !!}


            <div class="form-group py-2">
                {!! Form::label('when', 'Kedy') !!}
                {!! Form::text('when', null, ['class' => 'form-control', 'maxlength' => '49']) !!}
            </div>

            <div class="form-group py-2">
                {!! Form::label('where', 'Kde') !!}
                {!! Form::text('where', null, ['class' => 'form-control', 'maxlength' => '199']) !!}
            </div>

            <div class="form-group py-2">
                {!! Form::label('note', 'Poznámka') !!}
                {!! Form::textArea('note', null , ['class'=> 'form-control', 'maxlength' => '999']) !!}
            </div>

            <div class="form-group py-2">
                {!! Form::label('visible', 'Viditeľný v príspevkoch?') !!}
                {!! Form::checkbox('visible', 'true', true) !!}
            </div>

            

        {!! Form::submit('Uložiť', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>