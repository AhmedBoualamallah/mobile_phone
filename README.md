# Mobile Phone

## Stack technique:

- Symfony
- Easy Admin
- Twig
- Bootstrap
- Stripe
- Mailjet

## Installation des dépendances

```bash
composer install
```

## Modification de l'URI de la base de données

Dans le fichier (.env)

## Création d'une base de données 

```php
php bin/console doctrine:database:create
```

## Génération d'une migration

```php
php bin/console make:migration
```

## Exécution d'une migration

```php
php bin/console doctrine:migrations:migrate
```

## Lancer le serveur

```bash 
symfony server:start
```

## Rendez-vous sur localhost

[localhost:8000](http://localhost:8000/)

## Inscription

- ***Création de l'administrateur***: inscription en tant qu'utilisateur, puis changer le role en : ***\"ROLE_ADMIN\"*** pour devenir administrateur. 

- ***Création des catégories***.

- ***Création des produits***.

- ***Inscription utilisateur***.

- ***Passer des commandes***.