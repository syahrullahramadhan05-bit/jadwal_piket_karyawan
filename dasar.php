<?php 
session_start();
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Piket Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="page-title">
            Jadwal Piket Karyawan
            <span>Sistem Informasi Kantor</span>
        </h1>

        <!-- Notifikasi -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="notification notification-success">
                ✅ <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="notification notification-error">
                ❌ <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Data -->
        <div class="form-wrapper">
            <h2 class="form-title">Tambah Jadwal Piket</h2>
            <form action="proses_tambah.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama karyawan" required>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Staff Admin">Staff Admin</option>
                        <option value="HRD">HRD</option>
                        <option value="Keuangan">Keuangan</option>
                        <option value="IT">IT</option>
                        <option value="Security">Security</option>
                        <option value="Office Boy">Office Boy</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" id="hari" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tugas">Tugas Piket</label>
                    <input type="text" name="tugas" id="tugas" placeholder="cth. Bersihkan Ruang Rapat" required>
                </div>

                <button type="submit" name="tambah_data" class="btn-submit">Tambah Data</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="table-wrapper">
            <h2 class="table-title">Daftar Jadwal Piket</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Hari</th>
                        <th>Tugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM table_piket ORDER BY id DESC";
                $cek = mysqli_query($koneksi, $sql);
                $no = 1;
                
                if(mysqli_num_rows($cek) > 0) {
                    while($data = mysqli_fetch_array($cek)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= htmlspecialchars($data['nama']) ?></strong></td>
                            <td><?= htmlspecialchars($data['jabatan']) ?></td>
                            <td><?= htmlspecialchars($data['hari']) ?></td>
                            <td><?= htmlspecialchars($data['tugas']) ?></td>
                            <td>
                                <a href="update.php?id=<?= $data['id'] ?>" class="btn-edit">Edit</a>
                                <a href="proses_hapus.php?id=<?= $data['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php 
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px 0; color: #6b7488;">
                            <p style="font-size: 16px;">Belum ada data jadwal piket</p>
                            <p style="font-size: 13px; margin-top: 4px;">Silakan tambahkan data melalui form di atas</p>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            
            <div class="table-footer">
                <span>Total Data: <?= mysqli_num_rows($cek) ?></span>
            </div>
        </div>
    </div>
</body>
</html>