# Laravel Middleware Project

This project demonstrates a simple Laravel application with user authentication middleware. The application consists of two main user-facing pages (Accueil and Article) and a protected Backoffice page.

## Project Structure

```
laravel_middleware_1
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── AccueilController.php
│   │   │   ├── ArticleController.php
│   │   │   └── BackofficeController.php
│   │   └── Middleware
│   │       └── AuthMiddleware.php
├── resources
│   └── views
│       ├── accueil.blade.php
│       ├── article.blade.php
│       └── backoffice.blade.php
├── routes
│   └── web.php
├── composer.json
└── README.md
```

## Features

- **Accueil Page**: Accessible to all users, regardless of authentication status.
- **Article Page**: Accessible to all users, regardless of authentication status.
- **Backoffice Page**: Restricted access; only authenticated users can access this page.

## Middleware

The `AuthMiddleware` class implements the logic to restrict access based on user authentication. If a user is not logged in, they will only be able to access the Accueil page. Authenticated users can access all pages.

## Installation

1. Clone the repository.
2. Run `composer install` to install the dependencies.
3. Set up your `.env` file and configure your database.
4. Run migrations if necessary.
5. Start the Laravel development server using `php artisan serve`.

## Usage

- Navigate to `/` to access the Accueil page.
- Navigate to `/article` to access the Article page.
- Navigate to `/backoffice` to access the Backoffice page (authentication required).

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.# laravel_middleware1
