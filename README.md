# Project Name

Task app 
**Description:**  
The project is achieving what I recieved in the email and all the tests I have done have passed , I didn't want to go further the autherisation,middlewares also business logic like tasks assigned to or work on as I was intending to do but I have less time unfortunatly to make that although it's easy ,improve the code more due to being busy those days I recieved the task I hope you like my style
Sorry for the latency I made this app by action design pattern because I like it and I see it's more cleaner than the traditional way even if the thing is trivial it's more scalable and laravel creator Trevor did the same thing in building large app , also using Dtos to organise data, stricting php types for safety , I forgot to put casts to models as a layer to security and preventing any change of the type of any attribute

---

## Requirements

- PHP >= 8.1
- Composer
- MySQL
- Laravel >= 11

---

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/AhmedEmad101/OsolutionTask.git
cd project-name
## 1 composer install
## 2 php artisan key:generate
## 3 php artisan config:cache
## 4 php artisan migrate
## 5 php artisan serve
-----------------------------------
seed the database
php artisan db:seed
and you can try test@example.com with password 123456
---------------------------------------------
## How to run Tests
Create a test database and connect with it on .env.testing file and run 
php artisan key:generate --env=testing
php artisan test --env=testing
---------------------------------
you can use Osolutions.postman_collection.json to test the data on postman 