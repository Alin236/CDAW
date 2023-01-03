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

## Méthode d'installation du projet
```
git clone https://github.com/Alin236/CDAW.git
cd CDAW/pokemon
composer update
php artisan migrate:fresh --seed
cp .env.example .env
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

## Vidéo de démonstration
https://www.dropbox.com/sh/c6v6dxt8lyhssgi/AACkZjURw6evabaSOGedzM7ea?dl=0