CREATE TABLE jam_kerja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jam_mulai VARCHAR(20) NOT NULL,
    jam_selesai VARCHAR(20) NOT NULL,
    batas_awal_absen VARCHAR(20) NOT NULL,
    batas_akhir_absen VARCHAR(20) NOT NULL
);
