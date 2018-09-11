# Live site

https://www.hammernemt.dk/

# Dev site 

https://www.dev.hammernemt.dk/

# Setup

- Start MySQL server
- Create env file (change .env.example to .env)
- Set env DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Create a database named the same as env(DB_DATABASE)
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Run `composer install`
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan serve`


## Status 	

live [![CircleCI](https://circleci.com/gh/huesimon/Hammernemt/tree/master.svg?style=svg)](https://circleci.com/gh/huesimon/Hammernemt/tree/master)

dev [![CircleCI](https://circleci.com/gh/huesimon/Hammernemt/tree/dev.svg?style=svg)](https://circleci.com/gh/huesimon/Hammernemt/tree/dev)