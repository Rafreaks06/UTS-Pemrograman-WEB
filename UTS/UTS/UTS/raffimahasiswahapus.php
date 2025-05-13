<?php
include 'raffikoneksi.php';
if (isset($_GET['id'])) {
    $nim = $_GET['id'];
    //query hpus
    $query = "DELETE FROM raffimahasiswa where raffiMahNim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='mahasiswa.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='mahasiswa.php';</script>";
}
?>


