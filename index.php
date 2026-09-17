<?php
require_once 'koneksi.php';

$query = "SELECT * FROM table_siswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Siswa-Data Siswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #363636; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="tambah.php">Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
<tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nis'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['kelas'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='hapus.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>";
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