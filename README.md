# Hammernemt

# Live site

https://www.hammernemt.dk/

live [![CircleCI](https://circleci.com/gh/huesimon/Hammernemt/tree/master.svg?style=svg)](https://circleci.com/gh/huesimon/Hammernemt/tree/master)

# Dev site 

https://www.dev.hammernemt.dk/

dev [![CircleCI](https://circleci.com/gh/huesimon/Hammernemt/tree/dev.svg?style=svg)](https://circleci.com/gh/huesimon/Hammernemt/tree/dev)

# Setup

## Database

MySQL Workbench https://dev.mysql.com/get/Downloads/MySQLGUITools/mysql-workbench-community-8.0.13-winx64.msi

Need to get added to the Whitelist before connecting

Hostname: hammernemt.dk

Port: 3306

Username: PREFIX_username

Default Schema: PREFIX_schemaName

## Laravel

- Start MySQL server
- Create env file (change .env.example to .env)
- Set env DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Create a database named the same as env(DB_DATABASE)
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan serve`


# Contact

## Discord 

https://discord.gg/bdCzMuS


