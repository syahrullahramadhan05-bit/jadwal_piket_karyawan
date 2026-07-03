<?php
session_start();
include 'koneksi.php';

if (isset($_POST['edit_data'])) {
    $id      = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $hari    = mysqli_real_escape_string($koneksi, $_POST['hari']);
    $tugas   = mysqli_real_escape_string($koneksi, $_POST['tugas']);

    // Validasi data
    if(empty($nama) || empty($jabatan) || empty($hari) || empty($tugas)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: update.php?id=$id");
        exit();
    }

    $query = "UPDATE table_piket SET 
              nama='$nama', 
              jabatan='$jabatan', 
              hari='$hari', 
              tugas='$tugas' 
              WHERE id='$id'";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Data jadwal piket berhasil diupdate!";
    } else {
        $_SESSION['error'] = "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
    
    header("Location: dasar.php");
    exit();
} else {
    header("Location: dasar.php");
    exit();
}
?>