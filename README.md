# Hunting Table

Hunting Table est un projet de gestion de chasse développé en utilisant le framework Laravel. Cette application vise à fournir aux chasseurs un outil complet pour gérer leurs activités de chasse de manière efficace.

## Version

php 8.1.10 \
laravel Installer 5.1.3


## Installation

```bash
git clone https://github.com/votre-utilisateur/hunting-table.git
cd hunting-table
npm install
composer install
Copier coller le .env.example dans le projet et le rennomer en .env
Creer la base de donnée avec la commande create database « nom de bdd »
Il faudra dedans rentrer le nom de la base de donnée, le password et l’username de votre host ainsi que votre url host (wsl ou wamp)
php artisan migrate:fresh --seed
php artisan serve
