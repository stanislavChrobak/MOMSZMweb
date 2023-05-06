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
                <div class="navbar-nav ps-2">
                    <a class="nav-item nav-link" aria-current="page" href="{{ asset('/') }}">Úvod</a>
                    <a class="nav-item nav-link" href="{{ asset('gallery') }}">Galéria</a>
                    <a class="nav-item nav-link active" href="{{ asset('contact') }}">Kontakt</a>
                </div>
            </div>
        </nav>
    <!-- Content -->  
    <div class="container bg-light px-0"> 

        <div class="container-fluid px-0" style="background-color: #002D3F;">
            <h1 class="display-4 text-center py-5" style="color: #E4DCCF;">Organizačná štruktúra</h1>

            <div class="row pb-5">
                <div class="col d-flex justify-content-around">
                    <div class="card px-2 pt-2" style="width: 200px;">
                        <img class="card-img-top" src="{{url('images/womanIcon.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">Eva Nováková</h5>
                            <p class="card-text text-center"><b>Predseda MOMSZM</b></p>
                            <p class="card-text text-center">Člen výboru</p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row pb-5">
                <div class="col d-flex justify-content-around pb-5">
                    <div class="card px-2 pt-2" style="width: 200px;">
                        <img class="card-img-top" src="{{url('images/manIcon.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">Ján Vymislený</h5>
                            <p class="card-text text-center"><b>Podpredseda MOMSZM</b></p>
                            <p class="card-text text-center">Člen výboru</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-around pb-5">
                    <div class="card px-2 pt-2" style="width: 200px;">
                        <img class="card-img-top" src="{{url('images/manIcon.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">Peter Presný</h5>
                            <p class="card-text text-center"><b>Ekonóm</b></p>
                            <p class="card-text text-center">Člen výboru</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-around pb-5">
                    <div class="card px-2 pt-2" style="width: 200px;">
                        <img class="card-img-top" src="{{url('images/manIcon.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">Anton Jednotný</h5>
                            <p class="card-text text-center"><b>Kronikár</b></p>
                            <p class="card-text text-center">Člen výboru</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div id="contactForm" class="container-fluid px-0" style="background-color: rgb(0, 163, 237,0.2);">
            <h1  class="display-4 text-center py-5" style="color: #01161E;">Zanechajte nám správu</h1>

            @if (session()->has('success'))
                <div class="alert alert-success mb-3 text-center display-5">
                   {{ session('success') }}
                </div>
            @elseif (session()->has('sendingErr'))
                <div class="alert alert-danger mb-3 text-center display-5">
                   {{ session('sendingErr') }}
                </div>
            @endif

            <div class="row py-5">
                <div class="col-md text-center px-5 "> <!-- Hidden on small devices -->
                    <h3 class="mb-5">Miestny odbor Matice slovenskej v Zlatých Moravciach</h3>
                    <p>Dom Matice ZM</p>
                    <p>Hlavná 44</p>
                    <p>953 01 Zlaté Moravce</p>
                    <br>
                    <br>
                    <p><b>Tel: 0987 878 969</b></p>
                    <p><b>E-mail: info@maticazm.sk</b></p>
                </div>
                <div class="col-md px-5">
                    <form method="POST" action="/send-email">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Meno:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Sem vložte vaše meno." value="{{ old('name','') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Sem vložte email." value="{{ old('email','') }}">
                            <small id="emailHelp" class="form-text text-muted">Nikdy nebudeme zdieľať váš e-mail s nikým iným.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Správa:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Sem vložte vašu správu." maxlength="1000" >{{ old('message','') }}</textarea>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger my-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Odoslať</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->  
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>