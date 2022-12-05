<!DOCTYPE HTML>
<html lang="fr">
    <head> 
        <title>Pokémon</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        @yield('css')
    </head>
    <body>
        <p>Mon site Pokémon</p>
        <p>Contenu :</p>
        <section>
            @yield('content')
        </section>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @yield('javascript')
</html>