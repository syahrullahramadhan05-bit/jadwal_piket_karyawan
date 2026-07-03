<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    $query = "DELETE FROM table_piket WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success'] = "Data jadwal piket berhasil dihapus!";
    } else {
        $_SESSION['error'] = "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    $_SESSION['error'] = "ID tidak ditemukan!";
}

header("Location: dasar.php");
exit();
?>