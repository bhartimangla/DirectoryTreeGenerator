# DirectoryTreeGenerator
Developed on Laravel 5.8, On this directory tree generator we can add, delete any directory & file and change structure accordinly.
Database name - DirectoryTreeGenerator

After clone repository from github-
Instrall composer & PHP >= 7.1.3 version

Create copy of .env.example with name .env

This is your environment file which is required by laravel project

Open .env file and update this file with your MySQL Connection credentials

After that run the following command-

php artisan key:generate

php artisan config:cache

composer dump-autoload

After that run your migration commands

php artisan migrate

php artisan db:seed

Now Run your project with the following command-

php artisan serve --host 0.0.0.0 --port 8000

