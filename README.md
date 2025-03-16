```php
git clone https://github.com/AlamRidha/sistemrepo.git
```

-   Masuk ke folder

```php
cd adminlte-laravel10
```

-   Setelah instalasi harus update vendor folder, bisa mengupdate vendor folder menggunakan perintah ini

```php
composer update
```

-   Setelah update kemudan buatlah sebuah `.env` file via menggunakan command ini.

```php
cp .env.example .env
```

-   Sekarang untuk mengenerate product key.

```php
php artisan key:generate
```

-   Migrasi table & seed dari database.

```php
php artisan migrate --seed
```

-   Sudah selesai. Kemudian jalankan projectnya.

```php
php artisan serve
```

-   Untuk mendapatkan akses admin berikut akun yang telah dibuatkan

-   Admin

email: `andi@gmail.com`
password: `12345678`

-   User

email: `andi@gmail.com`
password: `12345678`

-   Untuk permasalahan pada upload file

Untuk melihat symbolic link ada atau tidak

```php
dir public\storage
```

Hapus link lama dan buat ulang

```php
rmdir public\storage
```

```php
php artisan storage:link
```
