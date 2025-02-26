CREATE TABLE pendaftaran (
    id_pendaftaran INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    nopol VARCHAR(20),
    type_motor VARCHAR(50),
    paket_service VARCHAR(50),
    keluhan TEXT
);

CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    part_tambahan TEXT,
    total_pembayaran DECIMAL(10, 2),
    tanggal_pembayaran DATE,
    id_pendaftaran INT,
    FOREIGN KEY (id_pendaftaran) REFERENCES pendaftaran(id_pendaftaran)
);

-- menambahkan kolom harga_service ke tabel pendaftaran
-- ALTER TABLE pendaftaran
-- ADD COLUMN harga_service DECIMAL(10, 2);

-- Menambahkan data ke tabel pendaftaran
INSERT INTO pendaftaran (nama, alamat, nopol, type_motor, paket_service, keluhan) VALUES
('Budi Santoso', 'Jl. Merdeka No. 1', 'AB 1234 CD', 'Honda Vario', 'Servis Berkala', 'Mesin berisik'),
('Rina Ayu', 'Jl. Maju No. 2', 'EF 5678 GH', 'Yamaha NMAX', 'Servis Lengkap', 'Rem blong'),
('Andi Pratama', 'Jl. Sejahtera No. 3', 'IJ 9101 KL', 'Suzuki Nex', 'Ganti Oli', 'Oli bocor'),
('Siti Aminah', 'Jl. Damai No. 4', 'MN 2345 OP', 'Honda Beat', 'Servis Berkala', 'Lampu mati'),
('Yusuf Rahman', 'Jl. Cinta No. 5', 'QR 6789 ST', 'Yamaha Mio', 'Tune Up', 'Aki lemah');

-- Menambahkan data ke tabel pembayaran
INSERT INTO pembayaran (part_tambahan, total_pembayaran, tanggal_pembayaran, id_pendaftaran) VALUES
('Oli mesin', 200000, '2025-01-10',1),
('Kampas rem', 350000, '2025-01-11',2),
('Filter oli', 150000, '2025-01-12',3),
('Busi', 180000, '2025-01-13',4),
('Aki', 400000, '2025-01-14',5);


-- menampilkan data nama dan total pembayaran
/*
SELECT pendaftaran.nama, pembayaran.total_pembayaran
FROM pendaftaran
JOIN pembayaran ON pendaftaran.id_pendaftaran = pembayaran.id_pendaftaran;
*/



-- -- Menambahkan data ke tabel pendaftaran dan mendapatkan id_pendaftaran yang baru ditambahkan
-- INSERT INTO pendaftaran (nama, alamat, nopol, type_motor, paket_service, keluhan) VALUES
-- ('Budi Santoso', 'Jl. Merdeka No. 1', 'AB 1234 CD', 'Honda Vario', 'Servis Berkala', 'Mesin berisik');
-- SET @last_id = LAST_INSERT_ID();

-- -- Menggunakan id_pendaftaran yang baru untuk memasukkan data ke tabel pembayaran
-- INSERT INTO pembayaran (part_tambahan, total_pembayaran, tanggal_pembayaran, id_pendaftaran) VALUES
-- ('Oli mesin', 200000, '2025-01-10', @last_id);
