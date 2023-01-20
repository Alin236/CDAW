# Auteur
- DEVA Nilavan

# Jalon 5

## Evaluation

Message aux évaluateur :
Si ce jalon 5 est présent, vous possédez la mauvaise version à évaluer.
La bonne version à évaluer est labellé tagué [v0.3.0-alpha](https://github.com/Alin236/CDAW/tree/v0.3.0-alpha) sur git

## Description

Le jalon 5 ne fait pas parti de l'évaluation du projet.

### Changement

- Amélioration du visuel
- Historique fonctionnel
- Mode de jeux semi-automatique fonctionnel
- Mode de jeux automatique fonctionnel
- Replay fonctionnel
- Système de récompense fonctionnel
- Affichage des stats du joueur sur son profil
- Bug fixé :
    - Le level du joueur n'était pas prie en compte dans le pokédex
    - Les nouveaux joueurs n'avaient pas d'énergie maitrisée
    - Les indicateurs du caroussel ne fonctionnaient pas

### Lacune restante

- Podium des joueurs
- Consulter le profils des autres joueurs
- Bug :
    - L'API donnant les informations des pokémons dans le pokédex ne marche pas pour les pokémons ne venant pas de la 1re page

## Méthode d'installation du projet
```
git clone https://github.com/Alin236/CDAW.git
cd CDAW/pokemon
cp .env.example .env
composer update
php artisan breeze:install
git restore .
php artisan migrate:fresh --seed
```

## Méthode pour initialiser la base de données

Par les migrations / seeders :
```
php artisan migrate:fresh --seed
```

## Méthode pour lancer le serveur

```
php artisan serve
```

## Route
http://127.0.0.1:8000

## Identifiants sur le site
- utilisateur 1 : alin@mail.com / admin
- utilisateur 2 : pinky@mail.com / admin

## Note
Dans le fichier "pokemon\database\seeders\DatabaseSeeder.php", le seeder "PokemonTrueStatSeeder" permettant d'avoir les vraies énergies des pokémons, effectuent un grand nombre d'appel à l'API pokéapi. Ce seeder à donc été commenté pour ne pas gêner l'évaluation des projets et ne pas dépassé la limite du nombre d'appels faisable à pokéapi, avec le cumul des appels des projets des autres groupes.

Les énergies des pokémons sont donc mis aléatoirement, et il est donc possible de ne pas pouvoir se battre s'il y a moins de 3 pokémons disponible pour un joueur. Si cela se produit, il est conseillé de relancer les seeders.

## Vidéo de démonstration
Aucune
