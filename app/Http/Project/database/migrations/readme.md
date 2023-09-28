# Migrations

Make
```bash
php artisan make:migration create_web_news_table --path=App\Http\Project\database\migrations\web
php artisan make:migration create_web_news_locales_table --path=App\Http\Project\database\migrations\web
```

Migrate
```bash
php artisan migrate
php artisan migrate:rollback

php artisan migrate --path=app/Http/Project/database/migrations/api
php artisan migrate:rollback --path=app/Http/Project/database/migrations/api

php artisan migrate --path=app/Http/Project/database/migrations/web 
php artisan migrate:rollback --path=app/Http/Project/database/migrations/web
```

