<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM table_piket WHERE id = '$id'");

header("location:dasar.php");
?>
