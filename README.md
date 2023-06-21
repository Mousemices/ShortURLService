# ShortURLService

This project is using Laravel 10.13.5, PHP 8.2.4 with Node.js 18.16.0.

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

Now you 
| email      | password|
| ----------- | -----------|
| user@example.com.      |  password |

Launch vite.

```bash
npm run dev
```

Launch server.

```bash
php artisan serve
```

Run the tests by using

```bash
php artisan test
```
