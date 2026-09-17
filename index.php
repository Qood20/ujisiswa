<?php
require_once 'koneksi.php';

$query = "SELECT * FROM table_siswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Siswa - Data Siswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #363636; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        .btn-tambah {
            display: inline-block;
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .btn-tambah:hover { background-color: #218838; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Data Siswa</h2>
    <a href="tambah.php" class="btn-tambah">+ Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Cek ketersediaan nama kolom (baik 'jenis_kelamin' maupun 'jenis kelamin')
                    $jk = $row['jenis_kelamin'] ?? $row['jenis kelamin'] ?? '-';
                    $tampil_jk = ($jk === 'L') ? 'Laki-laki' : (($jk === 'P') ? 'Perempuan' : $jk);

                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nis']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                    echo "<td>" . htmlspecialchars($tampil_jk) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='hapus.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\" style='color: red;'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data siswa.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>