CREATE DATABASE pengaduan_sekolah;
USE pengaduan_sekolah;

-- Tabel Admin
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO admin (username, password) VALUES ('admin', '123');

-- Tabel Pengaduan
CREATE TABLE pengaduan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    kelas VARCHAR(50),
    lokasi VARCHAR(100),
    jenis VARCHAR(100),
    deskripsi TEXT,
    status VARCHAR(50) DEFAULT 'Menunggu'
);
