# Auteur
- DEVA Nilavan

# Jalon 4

## Description

Le jalon 4 est la livraison du site.

Voici la liste des fonctionnalités qui ont été implémenté au cours de ce projet :
- Pour toute personne :
    - Parcourir l'ensemble des pokémons
    - Consulter l'accueil
- Pour les visiteurs uniquement :
    - Créer un compte
    - Se connecter
- Pour les joueurs connectés :
    - Consulter son profil (pseudo, mail, maîtrises)
    - Parcourir l'ensemble des pokémons possédés
    - Faire des battailles en local
- Mode de jeux implémenté :
    - Combat classique (choix manuel + tour par tour)
- Sauvegarde des combats dans la base de donnée (l'affichage de l'historique n'est pas encore mis en place)

Voici la liste des lacunes du site :
- Consulter les stats des joueurs
- Consulter l'historique et les rejouer
- Mode de jeux :
    - Combat semi-automatique (choix aléatoire + tour par tour)
    - Combat automatique (Tout les choix sont aléatoires)
- Récompense de fin de partie

Correction à apporter :
- La liste des pokémons possédés par un joueur ne prend pas en compte le level du joueur (uniquement dans le pokédex, lors de la sélection des pokémons pour un combat le level du joueur est bien pris en compte)

## Méthode d'installation du projet
```
git clone https://github.com/Alin236/CDAW.git
cd CDAW/pokemon
cp .env.example .env
composer update
php artisan breeze:install
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
https://www.dropbox.com/sh/c6v6dxt8lyhssgi/AACkZjURw6evabaSOGedzM7ea?dl=0