<!DOCTYPE HTML>
<html lang="fr">
    <head> 
        <title>Pokémon</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        @yield('css')
    </head>
    <body>
        <header>
            @include('header')
        </header>
        <div>
            @yield('content')
        </div>
        <footer>
            @include('footer')
        </footer>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @yield('javascript')
</html>