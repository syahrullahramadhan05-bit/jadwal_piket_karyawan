CREATE DATABASE jadwal_piket_kantor;
USE jadwal_piket_kantor;

CREATE TABLE table_piket (
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    jabatan VARCHAR(30) NOT NULL,
    hari VARCHAR(15) NOT NULL,
    tugas VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'Terjadwal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
