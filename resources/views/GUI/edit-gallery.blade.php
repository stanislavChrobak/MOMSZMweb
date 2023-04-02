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
        <h1 class="text-center"> Upraviť galériu </h1>
    </div>
    <div class="container d-flex justify-content-center" style="max-width: 500px;">
        <!--{!! Form::open(['url' => '/submit-edit-article', 'enctype' => 'multipart/form-data']) !!}-->
        
        {!! Form::open(['url' => '/submit-edit-gallery/' . $gallery['id']  , 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}    
        {!! Form::hidden('_method', 'PUT') !!}

            <div class="form-group">
                {!! Form::label('name', 'Meno') !!}
                {!! Form::text('name', $gallery['name'], ['class' => 'form-control', 'maxlength' => '49']) !!}
            </div>
            <!--Image 1 -->
            <div class="form-group">
                @if($hasImage1)
                    {!! Form::hidden('storedImage1', $storeImagePath1 ) !!} 
                    {!! Form::label('info1', 'Aktuálny obrázok 1') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath1) }}" style="height: 250px;">
                @else
                    {!! Form::label('info1', 'Obrázok 1 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image1', 'Nový obrázok 1') !!}
                {!! Form::file('image1', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 2 -->
            <div class="form-group">
                @if($hasImage2)
                    {!! Form::hidden('storedImage2', $storeImagePath2 ) !!} 
                    {!! Form::label('info2', 'Aktuálny obrázok 2') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath2) }}" style="height: 250px;">
                @else
                    {!! Form::label('info2', 'Obrázok 2 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image2', 'Nový obrázok 2') !!}
                {!! Form::file('image2', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 3 -->
            <div class="form-group">
                @if($hasImage3)
                    {!! Form::hidden('storedImage3', $storeImagePath3 ) !!}
                    {!! Form::label('info3', 'Aktuálny obrázok 3') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath3) }}" style="height: 250px;">
                @else
                    {!! Form::label('info3', 'Obrázok 3 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image3', 'Nový obrázok 3') !!}
                {!! Form::file('image3', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 4 -->
            <div class="form-group">
                @if($hasImage4)
                    {!! Form::hidden('storedImage4', $storeImagePath4 ) !!}
                    {!! Form::label('info4', 'Aktuálny obrázok 4') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath4) }}" style="height: 250px;">
                @else
                    {!! Form::label('info4', 'Obrázok 4 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image4', 'Nový obrázok 4') !!}
                {!! Form::file('image4', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 5 -->
            <div class="form-group">
                @if($hasImage5)
                    {!! Form::hidden('storedImage5', $storeImagePath5 ) !!}
                    {!! Form::label('info5', 'Aktuálny obrázok 5') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath5) }}" style="height: 250px;">
                @else
                    {!! Form::label('info5', 'Obrázok 5 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image5', 'Nový obrázok 5') !!}
                {!! Form::file('image5', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 6 -->
            <div class="form-group">
                @if($hasImage6)
                    {!! Form::hidden('storedImage6', $storeImagePath6 ) !!}
                    {!! Form::label('info6', 'Aktuálny obrázok 6') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath6) }}" style="height: 250px;">
                @else
                    {!! Form::label('info6', 'Obrázok 6 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image6', 'Nový obrázok 6') !!}
                {!! Form::file('image6', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 7 -->
            <div class="form-group">
                @if($hasImage7)
                    {!! Form::hidden('storedImage7', $storeImagePath7 ) !!}
                    {!! Form::label('info7', 'Aktuálny obrázok 7') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath7) }}" style="height: 250px;">
                @else
                    {!! Form::label('info7', 'Obrázok 7 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image7', 'Nový obrázok 7') !!}
                {!! Form::file('image7', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>
            <!--Image 8 -->
            <div class="form-group">
                @if($hasImage8)
                    {!! Form::hidden('storedImage8', $storeImagePath8 ) !!}
                    {!! Form::label('info8', 'Aktuálny obrázok 8') !!}
                    <img class="img-fluid mx-auto" src="{{ asset($viewImagePath8) }}" style="height: 250px;">
                @else
                    {!! Form::label('info8', 'Obrázok 8 nebol vložený.') !!}
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image8', 'Nový obrázok 8') !!}
                {!! Form::file('image8', ['class' => 'form-control mb-2', 'type' => 'file']) !!}
            </div>


            

        {!! Form::submit('Uložiť', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>