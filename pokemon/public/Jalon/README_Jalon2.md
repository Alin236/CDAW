# Auteur
- DEVA Nilavan

# Jalon 2

Après avoir compris le fonctionnement MVC de Laravel, on va créer une route appelant un controller afin d'afficher une view montrant la liste des Pokémons (avec leur énergie) contenu dans la base de donnée.

Fonctionnalités implémentées :
- Affichage de Pokémons avec leur énergie dans un tableau (Bestiaire)

Méthode pour initialiser la base de données :

Par les migrations / seeders :
```
php artisan migrate:fresh --seed
```

Route :
Pokédex : http://127.0.0.1:8000/pokedex

Identifiants sur le site :
Non implémenté.
Non nécessaire pour tester l'affichage de Pokémons (en visiteur).

Vidéo de démonstration : Aucune