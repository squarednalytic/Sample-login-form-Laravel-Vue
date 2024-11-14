Sample login form Laravel + Vue.js Application

This project is a web application built using Laravel (PHP >= 8.1.x) as the backend and Vue.js as the frontend. The application includes features such as user authentication, role-based access control, dynamic menu generation, and audit trails. It also implements secure coding practices and is fully responsive.
Features

    User Authentication: Allows users to register, log in, and log out.
    User Management: Includes management for Users, Roles, and Permissions.
    Dynamic Nested Menu: Menus are dynamically generated and support nested structures based on user roles and permissions.
    Audit Trail: Tracks user activities, including:
        User ID
        Username
        Menu accessed
        HTTP method used (GET, POST, etc.)
        Activity timestamp
    Secure Coding: Implements secure coding practices, including data validation and protection against common vulnerabilities.
    Responsive Design: The application is fully responsive, optimized for both mobile and desktop screens.

Tech Stack
Backend (Laravel)

    Laravel (PHP >= 8.1.x)
    PostgreSQL (Database)
    Eloquent ORM
    Laravel Migrations
    Laravel Seeding
    JWT Authentication for secure API authentication

Frontend (Vue.js)

    Vue.js (Frontend Framework)
    Vue Router (for routing)
    Axios (for API requests)
    Responsive Design using CSS media queries

Prerequisites

Before running the application, make sure you have the following installed:

    PHP (>= 8.1.x)
    Composer (for managing PHP dependencies)
    Node.js and npm (for managing JavaScript dependencies)
    PostgreSQL (Database)
    Git (for version control)

    Setup Instructions
Backend (Laravel)

    Clone the repository:

git clone https://github.com/yourusername/laravel-vue-app.git
cd laravel-vue-app

Install PHP dependencies using Composer:

composer install

Copy the .env.example file to .env and configure your database connection:

cp .env.example .env

Edit the .env file and set your PostgreSQL database details:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

Generate the application key:

php artisan key:generate

Run database migrations and seeding:

php artisan migrate --seed

Serve the Laravel application:

    php artisan serve

    By default, the backend will be accessible at http://localhost:8000.

Frontend (Vue.js)

    Navigate to the frontend directory:

cd frontend

Install JavaScript dependencies using npm:

npm install

Run the Vue.js development server:

npm run serve

By default, the frontend will be accessible at http://localhost:8080.

Optional: Build the frontend for production:

npm run build
