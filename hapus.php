<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id = '$id'";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?pesan=Data berhasil dihapus&status=sukses");
} else {
    header("Location: index.php?pesan=Terjadi kesalahan: " . mysqli_error($koneksi) . "&status=gagal");
}
mysqli_close($koneksi);
?>