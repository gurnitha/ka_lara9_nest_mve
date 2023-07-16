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


