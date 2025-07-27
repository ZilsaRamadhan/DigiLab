# Aplikasi Perpustakaan Buku Digital - UAS Pemrograman Web II

[cite_start]Aplikasi ini dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web II (IF402)[cite: 7]. Proyek ini merupakan sistem manajemen buku digital sederhana yang dibangun menggunakan **CodeIgniter 4** dan database **MySQL**.

## Fitur Utama

Sesuai dengan soal ujian, aplikasi ini memiliki beberapa fitur utama:
* [cite_start]**Authentication**: Sistem login dan logout dengan manajemen sesi untuk melindungi halaman[cite: 24].
* [cite_start]**CRUD**: Fungsionalitas penuh untuk *Create* (menambah), *Read* (membaca), *Update* (mengubah), dan *Delete* (menghapus) data buku[cite: 23].
* [cite_start]**Pencarian**: Fitur untuk mencari buku berdasarkan judul atau penulis[cite: 25].
* [cite_start]**Paginasi**: Membatasi data yang tampil per halaman untuk meningkatkan performa dan pengalaman pengguna[cite: 25].

## Prasyarat

Sebelum menjalankan aplikasi, pastikan Anda telah menginstal perangkat lunak berikut:
* PHP 8.1 atau lebih baru
* Composer
* Web Server (Apache/Nginx, atau bisa menggunakan server bawaan CodeIgniter)
* Database Server (MySQL/MariaDB)

## Panduan Instalasi dan Konfigurasi

Berikut adalah langkah-langkah untuk menjalankan aplikasi ini di lingkungan lokal Anda.

### 1. Clone Repository
Buka terminal atau Git Bash, lalu clone repository ini ke direktori lokal Anda.
```bash
git clone [URL_GITHUB_ANDA]
cd [NAMA_FOLDER_PROYEK]
