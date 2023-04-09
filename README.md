# Installation

## Requirements

- PHP 8.1+
- Composer
- MySQL

## Installation

* Create an empty database for your application (MySQL/MariaDB).
* Copy the content from .env.example and put it into .env file.
* Run composer to install all the dependencies required.

    ```bash
    composer install
    ```
* Build the frontend assets.

    ```bash
    npm install
    npm run build
    ```
* Run database migrations to create tables inside database.

    ```bash
    php artisan migrate --seed
    ```

* And you're done.

## Test User

| Email            | Password |
|------------------|----------|
| test@example.com | password |
