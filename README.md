
# Absensi dengan Foto dan QR code 


Aplikasi absensi online berbasis web yang saya buat menggunakan Laravel 9 adalah sebuah solusi modern untuk memudahkan pengelolaan absensi dalam sebuah organisasi atau perusahaan. Aplikasi ini memungkinkan pengguna untuk melakukan absensi dengan menggunakan foto wajah atau melakukan pemindaian QR code. Selain fitur-fitur tersebut, aplikasi ini juga dilengkapi dengan fitur rekap harian dan bulanan yang memungkinkan admin atau pengelola untuk menghasilkan laporan absensi secara teratur. Fitur rekap harian akan memberikan ringkasan kehadiran karyawan setiap hari, sementara fitur rekap bulanan akan mengumpulkan data absensi selama satu bulan, termasuk jumlah jam kerja, ketepatan waktu, dan kehadiran karyawan. Fitur ini memberikan gambaran yang lebih luas tentang pola kehadiran karyawan dan memudahkan pengambilan keputusan berdasarkan analisis data yang tersedia. Dengan demikian, aplikasi ini menjadi sebuah solusi lengkap untuk manajemen absensi yang efisien dan terstruktur.


## Installation


### Clone Repository
git clone https://github.com/razorzero0/Absensi-Foto-QR-code-PHP.git

### Masuk ke Direktori
cd Absensi-Foto-QR-code-PHP

### Instal Dependensi
composer install

### Buat File Environment
cp .env.example .env

### Konfigurasi Environment
 Sesuaikan pengaturan database (nama database, username, password) di file .env

### Generate App Key
php artisan key:generate

### Jalankan Migrasi Database
php artisan migrate

### Menjalankan Database Seeder
php artisan db:seed

### Link Storage
php artisan storage:link

### Menjalankan Server
php artisan serve



## Requirments

- PHP Version 8.x

- mysql


## Demo

http://lademy.my.id


## Auth

email   : yayan@gmail.com
pass    : yayan
