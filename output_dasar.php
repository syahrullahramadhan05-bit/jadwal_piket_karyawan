<?php
include 'koneksi.php';

if (isset($_POST['tambah_data'])) {

    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $hari    = $_POST['hari'];
    $tugas   = $_POST['tugas'];
    $status  = $_POST['status'];

    $query = "INSERT INTO table_piket
              (nama, jabatan, hari, tugas, status)
              VALUES
              ('$nama', '$jabatan', '$hari', '$tugas', '$status')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                window.location.href='dasar.php';
              </script>";
    }
}
?>
