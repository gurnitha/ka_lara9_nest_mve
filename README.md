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


#### 7. SEEDERS - Create seeders: admin, vendor, customer

        Steps:

        1. Create seeders: admin, vendor, customer
        file: database/seeders/UsersTableSeeder.php

            public function run()
            {
                DB::table('users')->insert([

                    // Admin
                    [
                        'name' => 'admin', 
                        'username' => 'admin', 
                        'email' => 'admin@mail.com', 
                        'password' => Hash::make('111'), 
                        'role' => 'admin', 
                        'status' => 'active', 
                    ],

                    // Vendor
                    [
                        'name' => 'vendor', 
                        'username' => 'vendor', 
                        'email' => 'vendor@mail.com', 
                        'password' => Hash::make('111'), 
                        'role' => 'vendor', 
                        'status' => 'active', 
                    ],

                    // User or Customer
                    [
                        'name' => 'cutomer', 
                        'username' => 'cutomer', 
                        'email' => 'cutomer@mail.com', 
                        'password' => Hash::make('111'), 
                        'role' => 'customer', 
                        'status' => 'active', 
                    ],
                ]);

        modified:   README.md
        modified:   database/migrations/2014_10_12_000000_create_users_table.php
        modified:   database/seeders/UsersTableSeeder.php


#### 8. SEEDERS - Create fake data

        Steps:

        1. In database/factories/UserFactory.php Create fake data

            public function definition()
            {
                return [
                    'name'      => fake()->name(),
                    'email'     => fake()->safeEmail(),
                    'email_verified_at' => now(),
                    'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'phone'     => fake()->phoneNumber,
                    'address'   => fake()->address,
                    'photo'     => fake()->imageUrl('60','60'),
                    'role'      => fake()->randomElement(['admin','vendor','customer']),
                    'status'    => fake()->randomElement(['active','inactive']),
                    'remember_token' => Str::random(10),
                ];
            }

        modified:   README.md
        modified:   database/factories/UserFactory.php


#### 9. SEEDERS - Insert fake data to db

        Steps:

        1. Use fake data to insert data to db
        2. Run fresh migration with --seed flag

        λ php artisan migrate:fresh --seed

          Dropping all tables ................................................................................................................. 1,190ms DONE

           INFO  Preparing database.

          Creating migration table .............................................................................................................. 633ms DONE

           INFO  Running migrations.

          2014_10_12_000000_create_users_table ................................................................................................ 1,506ms DONE
          2014_10_12_100000_create_password_resets_table ...................................................................................... 1,113ms DONE
          2019_08_19_000000_create_failed_jobs_table .......................................................................................... 1,018ms DONE
          2019_12_14_000001_create_personal_access_tokens_table ............................................................................... 1,748ms DONE

           INFO  Seeding database.

          Database\Seeders\UsersTableSeeder ........................................................................................................ RUNNING
          Database\Seeders\UsersTableSeeder ................................................................................................. 354.06 ms DONE

        modified:   README.md
        modified:   database/seeders/DatabaseSeeder.php
        modified:   database/seeders/UsersTableSeeder.php

        mysql> select id, username, email, role from users;
        +----+----------+-------------------------------+----------+
        | id | username | email                         | role     |
        +----+----------+-------------------------------+----------+
        |  1 | admin    | admin@mail.com                | admin    |
        |  2 | vendor   | vendor@mail.com               | vendor   |
        |  3 | customer | customer@mail.com             | customer |
        |  4 | NULL     | chelsie.wiegand@example.com   | admin    |
        |  5 | NULL     | lkassulke@example.com         | admin    |
        |  6 | NULL     | karolann.flatley@example.com  | admin    |
        |  7 | NULL     | west.arielle@example.org      | vendor   |
        |  8 | NULL     | herzog.giovanna@example.net   | vendor   |
        |  9 | NULL     | colby.schmeler@example.org    | customer |
        | 10 | NULL     | feil.joyce@example.net        | customer |
        | 11 | NULL     | wisozk.candelario@example.net | customer |
        +----+----------+-------------------------------+----------+
        11 rows in set (0.00 sec)

        :)


#### 10. DASHBOARD - Create admin dashboard

        modified:   README.md
        new file:   app/Http/Controllers/AdminController.php
        new file:   resources/views/admin/admin_dashboard.blade.php
        modified:   routes/web.php

        1. Create AdminController
        > php artisan make:controller AdminController
        2. Create template
        > mkdir resources/views/admin/
        3. Create admin page
        > touch resources/views/admin/admin_dashboard.blade.php
        4. In routes/web.php reate route
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
        5. Testing: open browser here: http://127.0.0.1:8000/admin/dashboard

        NOTE:

        Successfully display admin dashboard :)


#### 11. DASHBOARD - Create admin dashboard

        new file:   app/Http/Controllers/VendorController.php
        new file:   resources/views/vendor/vendor_dashboard.blade.php
        modified:   routes/web.php

        1. Create VendorController
        > php artisan make:controller VendorController
        2. Create template
        > mkdir resources/views/vendor/
        3. Create Vendor page
        > touch resources/views/vendor/vendor_dashboard.blade.php
        4. In routes/web.php reate route
        Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');
        5. Testing: open browser here: http://127.0.0.1:8000/vendor/dashboard

        NOTE:

        Successfully display vendor dashboard :)


#### 12. DASHBOARD - Create MiddleWare called 'Role'

        modified:   README.md
        new file:   app/Http/Middleware/Role.php

        1. Create middeware
        > php artisan make:middleware 'Role'





