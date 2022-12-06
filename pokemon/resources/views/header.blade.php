<nav class="navbar navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{ route('accueil') }}">Pokémon</a>
</nav>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('accueil') }}">Pokémon2</a>
</nav>
<nav class="navbar nav-pills nav-fill navbar-light bg-light">
    <a class="nav-item nav-link" href="{{ route('accueil') }}">Accueil</a>
    <a class="nav-item nav-link" href="{{ route('pokedex') }}">Pokedex</a>
    <a class="nav-item nav-link" href="{{ route('combat') }}">Combat</a>
    <a class="nav-item nav-link" href="{{ route('historique') }}">Historique</a>
    @auth
        <a class="nav-item nav-link" href="{{ route('profile.edit') }}">Profil</a>
    @else
        <a class="nav-item nav-link" href="{{ route('login') }}">Connexion</a>
    @endauth
</nav>