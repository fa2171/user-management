# 📘 User Management API - Laravel + MySQL + Docker

Proyek ini adalah API sederhana untuk manajemen pengguna (CRUD) menggunakan Laravel, MySQL, dan Docker. API dilengkapi dengan validasi, dokumentasi Swagger, dan konfigurasi Docker untuk kemudahan pengembangan.

## 🛠️ Cara Menjalankan Aplikasi

### 1. Clone atau Ekstrak Proyek
```bash
unzip user-management-api.zip
cd user-management-api
```

### 2. Salin File `.env` dan Konfigurasi
```bash
cp .env.example .env
```

Pastikan bagian ini pada `.env`:
```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=user_db
DB_USERNAME=user
DB_PASSWORD=secret
```

### 3. Jalankan Docker
```bash
docker-compose up -d --build
```

### 4. Masuk ke Container & Instalasi Laravel
```bash
docker-compose exec app bash
composer install
php artisan key:generate
php artisan migrate
exit
```

### 5. Akses Aplikasi
- **API**: http://localhost:8000/api/users
- **Swagger Docs**: http://localhost:8000/api/documentation
- **phpMyAdmin**: http://localhost:8080 (user: `root`, pass: `root`)

## 📚 Dokumentasi Singkat API

### Base URL
```
http://localhost:8000/api
```

### 📌 Endpoint CRUD

| Method | Endpoint           | Deskripsi                 |
|--------|--------------------|---------------------------|
| GET    | `/users`           | Ambil semua user          |
| POST   | `/users`           | Buat user baru            |
| GET    | `/users/{id}`      | Ambil detail user by ID   |
| PUT    | `/users/{id}`      | Perbarui user by ID       |
| DELETE | `/users/{id}`      | Hapus user by ID          |

### ✅ Format Data (JSON)
```json
{
  "nama": "John Doe",
  "email": "john@example.com",
  "nomor_telepon": "081234567890",
  "status_aktif": true,
  "departement": "IT"
}
```

### ✅ Validasi
- **email** harus format valid dan unik
- **nomor_telepon** hanya angka, minimal 10 karakter
- **nama**, **departement** wajib diisi
- **status_aktif** boolean (`true/false`)

## 📄 Swagger Documentation

Swagger UI dapat diakses di:
```
http://localhost:8000/api/documentation
```
