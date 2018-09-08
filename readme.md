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

{::nomarkdown}

<iframe src="https://discordapp.com/widget?id=488059421977739264&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>

{:/}