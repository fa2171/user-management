# User Management API

## Setup

1. Copy `.env.example` to `.env` and configure.
2. Run `docker-compose up -d --build`.
3. Exec into app container:
   ```
   docker-compose exec app bash
   composer install
   php artisan key:generate
   php artisan migrate
   exit
   ```
4. Akses API di `http://localhost:8000`.
5. Akses Swagger di `http://localhost:8000/api/documentation`.

## Endpoints

| Method | URL             | Description               |
| ------ | --------------- | ------------------------- |
| GET    | /api/users      | List all users            |
| POST   | /api/users      | Create new user           |
| GET    | /api/users/{id} | Get user by ID            |
| PUT    | /api/users/{id} | Update user by ID         |
| DELETE | /api/users/{id} | Delete user by ID         |
