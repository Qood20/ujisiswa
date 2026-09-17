<?php
require_once 'koneksi.php';

// Cek apakah form sudah di-submit
if (isset($_POST['simpan'])) {
    // Ambil data dari form dengan aman
    $nis           = mysqli_real_escape_string($koneksi, $_POST['nis'] ?? '');
    $nama          = mysqli_real_escape_string($koneksi, $_POST['nama'] ?? '');
    $kelas         = mysqli_real_escape_string($koneksi, $_POST['kelas'] ?? '');
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin'] ?? '');
    $alamat        = mysqli_real_escape_string($koneksi, $_POST['alamat'] ?? '');

    // Sesuaikan nama tabel jika di phpMyAdmin kamu 'siswa' atau 'table_siswa'
    // Di bawah ini menggunakan 'table_siswa'
    $query = "INSERT INTO table_siswa (nis, nama, kelas, `jenis kelamin`, alamat) 
          VALUES ('$nis', '$nama', '$kelas', '$jenis_kelamin', '$alamat')";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data siswa berhasil ditambahkan!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Siswa</title>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, select { width: 100%; max-width: 400px; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
        .btn-kembali { display: inline-block; margin-top: 10px; color: #555; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Tambah Data Siswa</h2>
    <a href="index.php" class="btn-kembali">&laquo; Kembali ke Data Siswa</a>
    <br><br>

    <form action="tambah.php" method="POST">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" id="nis" name="nis" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" placeholder="Contoh: XI RPL 1" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>
        </div>

        <button type="submit" name="simpan">Simpan Data</button>
    </form>

</body>
</html>