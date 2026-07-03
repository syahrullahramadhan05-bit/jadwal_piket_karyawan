<?php
$koneksi = mysqli_connect("localhost", "root", "", "jadwal_piket_kantor");

if (mysqli_connect_errno()) {
    die("Gagal Terkoneksi ke Database: " . mysqli_connect_error());
} 
?>