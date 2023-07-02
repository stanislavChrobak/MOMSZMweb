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
                    <a class="nav-item nav-link active" href="{{ asset('history') }}">História</a>
                    <a class="nav-item nav-link " href="{{ asset('contact') }}">Kontakt</a>
                </div>
            </div>
        </nav>
    <!-- Content -->  
    <div class="container px-5" style="background-color: rgb(0, 163, 237,0.2);"> 
        <header class="container-fluid pb-3">
            <h1 class="display-4 text-center pb-3 pt-5 ">Vznik Miestnej organizácie Matice slovenskej v Zlatých Moravciach</h1>
        </header> 
        <p class=" pb-5">V roku 1875 bola na Slovensku zrušená Matica Slovenská. Monarchia  sa pomaly blížila k svojmu  zániku.  28.júna 1914 bol spáchaný atentát  na následníka trónu   „Ferdinanda d´ Este a jeho manželku Žofiu Chotkovú“. Obaja zomreli. 
            <br><br>28.júla 1914 vypukla I. svetová vojna, ktorá mala za následok 10 miliónov mŕtvych. V roku 1918 zanikla Rakúsko-Uhorská monarchia,  zo 40 miliónom obyvateľov monarchie vznikli národne štáty - aj Československá republika. 
            <br><br>V našom meste  po zániku monarchie  nastala anarchia,  začalo  rabovanie obchodov.  Na Bernolákovej ulici došlo k streľbe,  bolo zabitých 5 občanov a 10 boli zranení. Občianska garda, ktorá tu pôsobila, si neplnila povinnosti, ale sa podieľala na bezpráví. 
            <br><br>14.januára1919 prišli do mesta talianski legionári, ktorých srdečne privítali pred  župným domom. Nový župan prišiel  24.januára 1919 v osobe dr. Martina Mičuru, rozpustil Občiansku gardu. Vydal rozkaz na odovzdanie  zbraní. Začali sa vydávať slovenské noviny - týždenník „Tekov“.
            <br><br>MATICA SLOVENSKA obnovila svoju činnosť 1. septembra 1920. Tekovský župan  prideľuje  MS v  župnom dome  kancelárie, vyriešil to tak,  že hospodárske oddelenie župného úradu, ktoré sídlilo v týchto kanceláriách,  presťahoval  do domu číslo  9  na Sládkovičovej ulici, ktorý bol rekvirovaný Jozefíne Urík.  Správa Matice Slovenskej  v Turčianskom SV Martine žiadala  župana, aby pridelil  Matici Slovenskej v Zlatých  Moravciach  všetok majetok,  ktorý v r.1875 bol  zhabaný, ďalej žiadali, aby  MS boli pridelené aj  finančne  prostriedky, ktoré má organizácia „FMKE deponované v Pešti Magyar Kerskedelmi bank Budapešť“ v pobočke Levice. Žiadosť bola vystavená 30.januara1922, podpísali ju Jozef Škultéty správca  a Štefan Krčméry tajomník MS, župan tejto žiadosti  vyhovel.  22. februára  1922 bol  majetok odovzdaný  MS v Zlatých Moravciach.
            <br><br><b>Autor:</b> M. Tomajko
            <br><b>Zdroj:</b> archív MV SR. 
            </p>
    </div>

   
    <!-- Footer -->  
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>