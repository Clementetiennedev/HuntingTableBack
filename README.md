# Hunting Table

Hunting Table est un projet de gestion de chasse développé en utilisant le framework Laravel. Cette application vise à fournir aux chasseurs un outil complet pour gérer leurs activités de chasse de manière efficace.

## Version

php 8.1.10 \
laravel Installer 5.1.3 \
Composer 2.2.22

## Installation

```bash
git clone https://github.com/votre-utilisateur/hunting-table.git
cd hunting-table
npm install
composer install
Copier coller le .env.example dans le projet et le rennomer en .env
php artisan migrate
Choisir "oui" a la prochaine question pour que la base de donnée sois creer directement
php artisan migrate:fresh --seed (Pour remplir votre base de donnée)
Il faudra dedans rentrer le nom de la base de donnée, le password et l’username de votre host ainsi que votre url host (wsl ou wamp) dans le .env
php artisan serve
