-- Membuat tabel roles
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT
);

-- Membuat tabel prodi
CREATE TABLE prodi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prodi_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT
);

-- Membuat tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);

-- Membuat tabel mahasiswa dengan relasi ke users (One-to-One atau Zero-to-One)
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mahasiswa VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    prodi_id INT,
    user_id INT UNIQUE,  -- Relasi one-to-one atau zero-to-one dengan users
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT,
    FOREIGN KEY (prodi_id) REFERENCES prodi(id) ON DELETE SET NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL -- Relasi ke users
);

INSERT INTO roles (role_name, created_by, updated_by) 
VALUES ('admin', 1, 1), ('mahasiswa', 1, 1);

INSERT INTO prodi (prodi_name, created_by, updated_by) 
VALUES 
('Sistem Informasi', 1, 1),
('Aktuaria', 1, 1),
('Matematika', 1, 1),
('Statistika', 1, 1);