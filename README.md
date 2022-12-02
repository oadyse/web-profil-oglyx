- tahap pertama
  
```js 
composer update 
````

- tahap kedua copy file `.env example` menjadi `.env`

- buat database di phpmyadmin sesuai dengan nama di `.env`

- kemudian key:generate terlebih dahulu
  
```js 
php artisan key:generate
````

- kemudian migrate
  
```js 
php artisan migrate:fresh --seed
````

- jalankan sistem
  
```js 
php artisan serve
````
