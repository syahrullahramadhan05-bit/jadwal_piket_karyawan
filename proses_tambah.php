<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah_data'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $hari    = mysqli_real_escape_string($koneksi, $_POST['hari']);
    $tugas   = mysqli_real_escape_string($koneksi, $_POST['tugas']);

    // Validasi data tidak boleh kosong
    if(empty($nama) || empty($jabatan) || empty($hari) || empty($tugas)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: index.php");
        exit();
    }

    $query = "INSERT INTO table_piket (nama, jabatan, hari, tugas) 
              VALUES ('$nama', '$jabatan', '$hari', '$tugas')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Data jadwal piket berhasil ditambahkan!";
    } else {
        $_SESSION['error'] = "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
    
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>