<?php
include 'koneksi.php';
$query = "SELECT * FROM siswa ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #FFF0C4;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #3E0703;
        }
        .tombol-tambah {
            display: inline-block;
            background: #ab934cff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3E0703;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .tombol-edit {
            background: #f39c12;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .tombol-hapus {
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .pesan {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .sukses {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .gagal {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        h6{
            color: #3E0703
        }
    </style>
</head>
<body>
    <div>
    <div class="container">
        <h1>Data Siswa</h1>
        
        <?php
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            $status = $_GET['status'];
            
            if ($status == 'sukses') {
                echo '<div class="pesan sukses">' . $pesan . '</div>';
            } else {
                echo '<div class="pesan gagal">' . $pesan . '</div>';
            }
        }
        ?>
        
        <a href="tambah.php" class="tombol-tambah">+ Tambah Siswa</a>
        
        <table>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>gender</th>
                <th>Aksi</th>
            </tr>
            
            <?php
            if (mysqli_num_rows($hasil) > 0) {
                while ($data = mysqli_fetch_array($hasil)) {
                    echo "<tr>";
                    echo "<td>" . $data['id'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['kelas'] . "</td>";
                    echo "<td>" . $data['gender'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $data['id'] . "' class='tombol-edit'>Edit</a> ";
                    echo "<a href='hapus.php?id=" . $data['id'] . "' class='tombol-hapus' onclick='return confirm(\"Yakin nih mau hapus data?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>ga ada data siswa nya nih</td></tr>";
            }
            ?>
        </table>
    </div>

    <style>
    body {
      margin: 0;
      height: 100vh;
      position: relative;
    }
    .teks {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 20px;
      font-weight: bold;
    }
  </style>
  <body>
  <div class="teks">
    <h6>-Fakhri Arkana Rochman-</h6>
  </div>
</body>
</body>
</html>

<?php
mysqli_close($koneksi);
?>