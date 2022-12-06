<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('accueil') }}">Pokémon</a>
</nav>
<nav class="navbar navbar-light bg-light">
    <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
    <a class="nav-link" href="{{ route('pokedex') }}">Pokedex</a>
    <a class="nav-link" href="{{ route('combat') }}">Combat</a>
    <a class="nav-link" href="{{ route('historique') }}">Historique</a>
    @auth
        <a class="nav-link" href="{{ route('profile.edit') }}">Profil</a>
    @else
        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
    @endauth
</nav>