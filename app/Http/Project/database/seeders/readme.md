# Seeders

Make
```bash
php artisan make:seeder UserSeeder
```
move to app\Http\Project\database\seeders\api
change namespace to App\Http\Project\Database\Seeders\Api;

Seed
```bash
php artisan db:seed --class=App\Http\Project\database\seeders\api\UserSeeder
php artisan db:seed --class=App\Http\Project\database\seeders\web\NewsSeeder
```

