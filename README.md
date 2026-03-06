# Task Management System - Backend API

Proyek ini adalah sistem manajemen tugas (Task Management) yang dibangun menggunakan Laravel 11. Saat ini aplikasi fokus pada fungsionalitas Backend API untuk pengelolaan Project dan Task.

## Fitur Utama

- **Authentication**: Login menggunakan Laravel Sanctum.
- **Project Management**: CRUD Project dengan status (Active/Archived).
- **Task Management**: CRUD Task dengan sistem Soft Delete.
- **Dashboard**: Ringkasan statistik project dan task.
- **Filtering & Search**: Pencarian task berdasarkan judul dan filter per project.

---

## Prasyarat (Prerequisites)

Pastikan perangkat Anda sudah terinstall:

- PHP >= 8.2
- Composer
- MySQL / PostgreSQL
- Postman (Untuk pengujian API)

---

## Instalasi Lokal

1. **Clone Repository**

    ```bash
    git clone git@github.com:trooulala/Task-and-Project-Tracker.git
    cd Task-and-Project-Tracker-main

    ```

2. **Instal Dependensi**

    ```bash
    composer install
    npm install

    ```

3. **Konfigurasi Environment**

    Salin file .env.example menjadi .env dan sesuaikan koneksi database Anda.

    ```Bash
    cp .env.example .env

    ```

4. **Generate App Key & Migrate**
   ```Bash
   php artisan key:generate
   php artisan migrate --seed
   Catatan: Perintah --seed akan membuat user default: *admin@example.com* dengan password _password_.

5. **Jalankan Server**
   ```Bash
   php artisan serve
   API akan berjalan di http://localhost:8000

## Pengujian via Postman (Exported Collection)

Karena dokumentasi Swagger sedang dalam pemeliharaan, saya telah menyediakan Postman Collection yang dapat langsung di-import untuk mencoba seluruh fitur API.

Cara Import:

1. Buka aplikasi Postman.

2. Klik tombol Import di pojok kiri atas.

3. Pilih file Task and Project Tracker.postman_collection.json yang berada di root folder proyek ini.

4. Klik Import.
