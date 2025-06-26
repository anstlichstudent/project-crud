# Laravel CRUD Project

A foundational Laravel 11 application designed to serve as a starting point for building robust web applications. This project includes a standard Laravel setup with a focus on CRUD (Create, Read, Update, Delete) operations, complete with frontend asset bundling via Vite and a pre-configured testing environment using Pest/PHPUnit.

[![Tests](https://github.com/your-username/your-repository/actions/workflows/tests.yml/badge.svg)](https://github.com/your-username/your-repository/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license)](https://packagist.org/packages/laravel/framework)

## About This Project

This repository provides a clean and modern Laravel project structure, ideal for developers looking to bootstrap a new project quickly. It follows Laravel's best practices and includes:

- **Authentication Scaffolding:** Basic user registration and login system.
- **Database Migrations:** Pre-built migrations for users, jobs, and cache tables.
- **Frontend Tooling:** Integrated with Vite for fast and modern frontend asset compilation (CSS & JS).
- **Testing Suite:** Ready-to-use testing setup with Feature and Unit test examples.
- **CI/CD Workflows:** GitHub Actions for automated testing and changelog updates.
- **RESTful Architecture:** Follows the MVC (Model-View-Controller) pattern for a clean and scalable backend structure.

## System Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- A database server (e.g., MySQL, PostgreSQL, SQLite)

## Getting Started

Follow these steps to get the project up and running on your local machine.

### 1. Clone the Repository

First, clone this repository to your local system.

```bash
git clone https://github.com/your-username/your-repository.git
cd your-repository
```

### 2. Install Dependencies

Install the backend (PHP) and frontend (JavaScript) dependencies.

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration

Create your local environment file by copying the example file. This file will store your application secrets and environment-specific settings.

```bash
cp .env.example .env
```

Next, generate a unique application key.

```bash
php artisan key:generate
```

Open the `.env` file in a text editor and configure your database connection details (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.).

### 4. Run Database Migrations

Create the necessary tables in your database by running the migration command.

```bash
php artisan migrate
```

Optionally, you can seed the database with some dummy data using the default factories.

```bash
php artisan db:seed
```

### 5. Compile Frontend Assets

Compile the JavaScript and CSS files for the frontend.

```bash
npm run dev
```

This command will start the Vite development server. Keep it running while you are developing.

### 6. Start the Application Server

In a new terminal window, start the Laravel development server.

```bash
php artisan serve
```

Your application will now be available at `http://127.0.0.1:8000`.

## Running Tests

This project uses Pest/PHPUnit for automated testing. To run the entire test suite, use the following artisan command:

```bash
php artisan test
```

## Built With

- [Laravel 11](https://laravel.com/) - The PHP Framework for Web Artisans.
- [Vite](https://vitejs.dev/) - Next Generation Frontend Tooling.
- [Blade](https://laravel.com/docs/11.x/blade) - Powerful, simple templating engine.
- [Eloquent ORM](https://laravel.com/docs/11.x/eloquent) - Beautifully simple ActiveRecord implementation.
- [PHPUnit](https://phpunit.de/) - The PHP Testing Framework.

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

Please refer to the `CONTRIBUTING.md` file for details on our code of conduct and the process for submitting pull requests.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
