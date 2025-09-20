<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);

$pesan = '';
$status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_baru = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    
    if (!empty($id_baru) && !empty($nama) && !empty($kelas) && !empty($gender)) {
        if ($id_baru != $id) {
            $cek_query = "SELECT * FROM siswa WHERE id = '$id_baru'";
            $cek_hasil = mysqli_query($koneksi, $cek_query);
            
            if (mysqli_num_rows($cek_hasil) > 0) {
                $pesan = "id nya sudah dipakai,ganti id lain yaa.";
                $status = "gagal";
            } else {
                $query = "UPDATE siswa SET id='$id_baru', nama='$nama', kelas='$kelas', gender='$gender' WHERE id='$id'";
                
                if (mysqli_query($koneksi, $query)) {
                    header("Location: index.php?pesan=Data berhasil diupdate&status=sukses");
                    exit();
                } else {
                    $pesan = "Terjadi kesalahan: " . mysqli_error($koneksi);
                    $status = "gagal";
                }
            }
        } else {
            $query = "UPDATE siswa SET nama='$nama', kelas='$kelas', gender='$gender' WHERE id='$id'";
            
            if (mysqli_query($koneksi, $query)) {
                header("Location: index.php?pesan=Data berhasil diupdate&status=sukses");
                exit();
            } else {
                $pesan = "Terjadi kesalahan: " . mysqli_error($koneksi);
                $status = "gagal";
            }
        }
    } else {
        $pesan = "Semua field harus diisi!";
        $status = "gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #FFF0C4;
        }
        .container {
            max-width: 500px;
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .tombol {
            background: #ab934cff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .tombol-kembali {
            background: #7f8c8d;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-right: 10px;
        }
        .pesan {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .gagal {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        
        <?php
        if (!empty($pesan)) {
            echo '<div class="pesan gagal">' . $pesan . '</div>';
        }
        ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">ID Siswa:</label>
                <input type="text" id="id" name="id" value="<?php echo $data['id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Siswa:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" id="kelas" name="kelas" value="<?php echo $data['kelas']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="Laki-laki" <?php if($data['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($data['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <a href="index.php" class="tombol-kembali">Kembali</a>
            <button type="submit" class="tombol">Update</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($koneksi);
?>