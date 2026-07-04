<?php 
session_start();
include 'koneksi.php'; 

// Cek apakah ada ID yang dikirim
if(!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = "ID tidak ditemukan!";
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$ambil = mysqli_query($koneksi, "SELECT * FROM table_piket WHERE id = '$id'");
$data = mysqli_fetch_array($ambil);

if(!$data) {
    $_SESSION['error'] = "Data tidak ditemukan!";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Piket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title">
            Edit Jadwal Piket
            <span>Sistem Informasi Kantor</span>
        </h1>

        <div class="form-wrapper">
            <h2 class="form-title">Edit Data Jadwal Piket</h2>
            
            <form action="proses_update.php" method="post">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <div class="form-group">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <?php
                        $jabatanList = ['Staff Admin','HRD','Keuangan','IT','Security','Office Boy'];
                        foreach ($jabatanList as $j) {
                            $selected = ($data['jabatan'] == $j) ? 'selected' : '';
                            echo "<option value=\"$j\" $selected>$j</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" id="hari" required>
                        <option value="">-- Pilih Hari --</option>
                        <?php
                        $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                        foreach ($hariList as $h) {
                            $selected = ($data['hari'] == $h) ? 'selected' : '';
                            echo "<option value=\"$h\" $selected>$h</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tugas">Tugas Piket</label>
                    <input type="text" name="tugas" id="tugas" value="<?= htmlspecialchars($data['tugas']) ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="edit_data" class="btn-submit">Update Data</button>
                    <a href="index.php" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>