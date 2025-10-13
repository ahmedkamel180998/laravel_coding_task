# Laravel User Management System

A Laravel-based user management system with API endpoints and admin dashboard.

## Features

-   User authentication (Register/Login)
-   Admin dashboard
-   User management
-   Excel export functionality
-   REST API endpoints
-   Role-based authorization

## Requirements

-   Laravel >= v10.49.1
-   PHP >= v8.3.16
-   Composer
-   Node.js & NPM

## Installation

1. Clone the repository

```bash
git clone https://github.com/yourusername/laravel_coding_task.git
cd laravel_coding_task
```

2. Install PHP dependencies

```bash
composer install
```

3. Install NPM dependencies

```bash
npm install && npm run dev
```

4. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

5. Update `.env` with your database credentials

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations and seeders

```bash
php artisan migrate --seed
```

## Admin Credentials

Use these credentials to access the admin dashboard:

```
Email: admin@example.com
Password: password
```

## API Documentation

### Authentication Endpoints

#### Register User

```http
POST /api/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```

#### Login User

```http
POST /api/login
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "password"
}
```

#### Get User Info

```http
GET /api/user
Authorization: Bearer {your_token}
```

### Response Format

Success Response:

```json
{
    "status": 200,
    "message": "Success message",
    "data": {
        // Response data
    }
}
```

Error Response:

```json
{
    "status": 400,
    "message": "Error message",
    "data": null
}
```

## Postman Collection

Import the Postman collection using this link:
[Postman Collection](https://documenter.getpostman.com/view/46311752/2sB3QML8zw#2a791cd1-3878-4830-b030-19aa68acd65a)

Or download the collection file from:
`/postman/Laravel_Coding_Task.postman_collection.json`

## Running Tests

```bash
php artisan test
```

## Development Server

Start the development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
