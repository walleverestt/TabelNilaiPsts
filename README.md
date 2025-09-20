# Aplikasi CRUD Siswa dengan Input ID Manual

Aplikasi ini adalah penilaian tengah semester untuk Student Day Programming Web yang mengimplementasikan operasi CRUD (Create, Read, Update, Delete) pada tabel siswa dengan fitur input ID manual.

## Fitur Utama
- Create: Menambahkan data siswa baru dengan ID manual
- Read: Menampilkan data siswa dalam bentuk tabel
- Update: Mengedit data siswa yang sudah ada (termasuk ID)
- Delete: Menghapus data siswa

## Field Data
1. ID (Identifier unik untuk setiap siswa - input manual)
2. Nama (Nama lengkap siswa)
3. Kelas (Kelas tempat siswa belajar)
4. Gender (Jenis kelamin siswa)

## Cara Instalasi
1. Buat database MySQL dengan nama `db_siswa`
2. Import file SQL berikut untuk membuat tabel:
```sql
CREATE TABLE siswa (
    id VARCHAR(11) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    gender ENUM('Laki-laki', 'Perempuan') NOT NULL
);