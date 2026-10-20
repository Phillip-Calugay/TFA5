# Simple POS System — Laravel TFA5

Phillip E. Calugay · IT0049 · TC31

A Laravel version of the original Technical1 four-page POS application. The layout and sample records follow the TFA1 PDF screenshots, with framework references updated to Laravel.

## Setup

Requires PHP 8.2+ and Composer. Laravel 12 is included in `composer.lock`. No Node.js build is required; CSS is served from `public/css/pos.css`.

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Open **http://127.0.0.1:8000**. The current TSA5 working copy already has its local environment configured. With XAMPP Apache running, **http://localhost/TSA5/** is also supported through the root rewrite rules.

| Page | Route | Controller | Blade view |
| --- | --- | --- | --- |
| Home | `/` | `PageController@index` | `pages/home.blade.php` |
| About | `/about` | `PageController@about` | `pages/about.blade.php` |
| Customer Accounts | `/customers` | `CustomerController@index` | `customers/index.blade.php` |
| User Accounts | `/users` | `UserController@index` | `users/index.blade.php` |

Each account controller defines a static PHP array of five records. Both listing views use Blade `@foreach` and escaped `{{ }}` output. The shared layout and navigation are in `resources/views/layouts/app.blade.php`. Sessions and cache use files; no database is required for the four pages.

## Optional database copy

The submission includes a POS migration and `PosAccountSeeder`, plus the standard Laravel migrations. These preserve the same example records for the migration/seeder submission requirement. To create the optional SQLite database:

```powershell
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

The account pages still read controller arrays after migration. Staff records are demonstration data with no login credentials. The seeder can be repeated without duplicating records.

## Verification

```powershell
php artisan route:list --except-vendor
php artisan test
php artisan view:cache
```

Tests check all four routes, navigation, table columns, five sample records per table, escaped output, database-independent rendering, and optional database seeding.

## Hosting and submission

Use a PHP 8.2+ host supporting Laravel. Upload the project, run `composer install --no-dev --optimize-autoloader`, create the server `.env`, generate a unique application key, and set `APP_ENV=production`, `APP_DEBUG=false`, and `APP_URL` to the hosted URL. Point the web document root at `public/`, permit writes to `storage/` and `bootstrap/cache/`, then run `php artisan optimize`. Keep file sessions/cache and the synchronous queue. A database is optional.

Source repository: [Phillip-Calugay/TFA5](https://github.com/Phillip-Calugay/TFA5). The source includes `composer.lock`, migrations, and seeders. Git excludes `.env`, dependencies, local tools, and reference documents. Submit the repository URL and hosted URL after checking all four hosted pages. Public hosting is still pending.
