<?php
require_once 'koneksi.php';

// Cek apakah ada parameter 'id' di URL
if (isset($_GET['id'])) {
    // Ambil ID dan amankan dari SQL Injection
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM table_siswa WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data siswa berhasil dihapus!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    // Jika mencoba akses langsung hapus.php tanpa ID, lempar balik ke index.php
    header("Location: index.php");
    exit();
}
?>