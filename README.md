# KA LARA9 NEST MULTIVENDOR ECOMMERCE
Belajar membuat aplikasi multivendor ecommerce menggunakan Laravel 9


#### 1. Create projec and Github repository

        > composer create-project laravel/laravel:^9.1 .

        modified:   .gitignore
        modified:   README.md


#### 2. Install Laravel Breeze

        Steps:

        > composer require laravel/breeze --dev << --- error
        > composer require laravel/breeze:1.11 --dev
        > php artisan breeze:install
        > npm install
        NOTE: 
        It needs vite plugin (source):
        https://stackoverflow.com/questions/73045616/vite-manifest-not-found
        > npm install --save-dev vite laravel-vite-plugin
        > change package.json script to this:
            "scripts": {
                "dev": "vite",
                "build": "vite build"
            },
        > npm run dev

        new file:   app/Http/Controllers/Auth/AuthenticatedSessionController.php
        new file:   app/Http/Controllers/Auth/ConfirmablePasswordController.php
        new file:   app/Http/Controllers/Auth/EmailVerificationNotificationController.php
        new file:   app/Http/Controllers/Auth/EmailVerificationPromptController.php
        new file:   app/Http/Controllers/Auth/NewPasswordController.php
        new file:   app/Http/Controllers/Auth/PasswordResetLinkController.php
        new file:   app/Http/Controllers/Auth/RegisteredUserController.php
        new file:   app/Http/Controllers/Auth/VerifyEmailController.php
        new file:   app/Http/Requests/Auth/LoginRequest.php
        modified:   app/Providers/RouteServiceProvider.php
        new file:   app/View/Components/AppLayout.php
        new file:   app/View/Components/GuestLayout.php
        modified:   composer.json
        modified:   composer.lock
        new file:   package-lock.json
        modified:   package.json
        new file:   postcss.config.js
        modified:   resources/css/app.css
        modified:   resources/js/app.js
        new file:   resources/views/auth/confirm-password.blade.php
        new file:   resources/views/auth/forgot-password.blade.php
        new file:   resources/views/auth/login.blade.php
        new file:   resources/views/auth/register.blade.php
        new file:   resources/views/auth/reset-password.blade.php
        new file:   resources/views/auth/verify-email.blade.php
        new file:   resources/views/components/application-logo.blade.php
        new file:   resources/views/components/auth-card.blade.php
        new file:   resources/views/components/auth-session-status.blade.php
        new file:   resources/views/components/auth-validation-errors.blade.php
        new file:   resources/views/components/button.blade.php
        new file:   resources/views/components/dropdown-link.blade.php
        new file:   resources/views/components/dropdown.blade.php
        new file:   resources/views/components/input.blade.php
        new file:   resources/views/components/label.blade.php
        new file:   resources/views/components/nav-link.blade.php
        new file:   resources/views/components/responsive-nav-link.blade.php
        new file:   resources/views/dashboard.blade.php
        new file:   resources/views/layouts/app.blade.php
        new file:   resources/views/layouts/guest.blade.php
        new file:   resources/views/layouts/navigation.blade.php
        modified:   resources/views/welcome.blade.php
        new file:   routes/auth.php
        modified:   routes/web.php
        new file:   tailwind.config.js
        new file:   tests/Feature/Auth/AuthenticationTest.php
        new file:   tests/Feature/Auth/EmailVerificationTest.php
        new file:   tests/Feature/Auth/PasswordConfirmationTest.php
        new file:   tests/Feature/Auth/PasswordResetTest.php
        new file:   tests/Feature/Auth/RegistrationTest.php
        new file:   vite.config.js

        :)


#### 3. Create db and connect it with the project

        Steps:

        1. Run server and open mysql
        λ mysql -u root -p
        Enter password: ****
        Welcome to the MySQL monitor.  Commands end with ; or \g.
        Your MySQL connection id is 93
        Server version: 8.0.13 MySQL Community Server - GPL

        2. Create db
        > mysql> CREATE DATABASE ka_lara9_nest_mve;
        > mysql> USE ka_lara9_nest_mve;

        3. Define db credentials in .env file

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=ka_lara9_nest_mve
        DB_USERNAME=root
        DB_PASSWORD=root


#### 4. Create default tables and create a new user

        Steps:

        1. Run migrations
        > php artisan migrate

        modified:   resources/js/bootstrap.js
        new file:   resources/js/bootstrap_ori.js

        NOTE:

        1. There was a problem: the dropdown menu did not work.
        2. Fixing using resources/js/bootstrap.js from source_code

        :)


#### 5. Customizing users table

        Steps:

        1. Modified: 2014_10_12_000000_create_users_table to this:

            public function up()
            {
                Schema::create('users', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('username')->nullable();
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->string('photo')->nullable();
                    $table->string('phone')->nullable();
                    $table->text('address')->nullable();
                    $table->enum('role',['admin','vendor','user'])->default('user');
                    $table->enum('status',['active','inactive'])->default('active'); 
                    $table->rememberToken();
                    $table->timestamps();
                });
            }

        2. Run fresh migration

        λ php artisan migrate:fresh

          Dropping all tables ................................................................................................................. 1,911ms DONE

           INFO  Preparing database.

          Creating migration table .............................................................................................................. 638ms DONE

           INFO  Running migrations.

          2014_10_12_000000_create_users_table ................................................................................................ 1,238ms DONE
          2014_10_12_100000_create_password_resets_table ...................................................................................... 1,143ms DONE
          2019_08_19_000000_create_failed_jobs_table .......................................................................................... 1,223ms DONE
          2019_12_14_000001_create_personal_access_tokens_table ............................................................................... 1,522ms DONE


        3. Check the result

        mysql> DESC users;
        +-------------------+-------------------------------+------+-----+---------+----------------+
        | Field             | Type                          | Null | Key | Default | Extra          |
        +-------------------+-------------------------------+------+-----+---------+----------------+
        | id                | bigint(20) unsigned           | NO   | PRI | NULL    | auto_increment |
        | name              | varchar(255)                  | NO   |     | NULL    |                |
        | username          | varchar(255)                  | YES  |     | NULL    |                |
        | email             | varchar(255)                  | NO   | UNI | NULL    |                |
        | email_verified_at | timestamp                     | YES  |     | NULL    |                |
        | password          | varchar(255)                  | NO   |     | NULL    |                |
        | photo             | varchar(255)                  | YES  |     | NULL    |                |
        | phone             | varchar(255)                  | YES  |     | NULL    |                |
        | address           | text                          | YES  |     | NULL    |                |
        | role              | enum('admin','vendor','user') | NO   |     | user    |                |
        | status            | enum('active','inactive')     | NO   |     | active  |                |
        | remember_token    | varchar(100)                  | YES  |     | NULL    |                |
        | created_at        | timestamp                     | YES  |     | NULL    |                |
        | updated_at        | timestamp                     | YES  |     | NULL    |                |
        +-------------------+-------------------------------+------+-----+---------+----------------+
        14 rows in set (0.00 sec)

        4. Testing by creating a new user

        :)

        modified:   README.md
        modified:   database/migrations/2014_10_12_000000_create_users_table.php


#### 6. SEEDERS - Create seeder file: UsersTableSeeder

        Steps:

        1. Create file
        λ php artisan make:seeder UsersTableSeeder

        INFO  Seeder [E:\workspace\laragon\www\ka_lara9_nest_mve\database/seeders/UsersTableSeeder.php] created successfully.
        
        modified:   README.md
        new file:   database/seeders/UsersTableSeeder.php