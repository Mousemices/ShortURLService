# ShortURLService

This project is using Laravel 10.13.5 with PHP 8.2.4.

Clone the repository.

```bash
git clone <repository>
```

Install dependencies.
```bash
composer install
```

```bash
npm install
```

Copy `.env.example` to `.env`. 

Open and configure credentials for `DB_DATABASE` `DB_USERNAME` `DB_PASSWORD`

Execute command to generate `APP_KEY`.
```bash
php artisan key:generate
```

We seed some fake data

```bash
php artisan migrate:fresh --seed
```
Launch server.

```bash
php artisan serve
```
