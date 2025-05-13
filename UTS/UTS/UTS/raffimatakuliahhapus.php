<?php
include 'raffikoneksi.php';

if (isset($_GET['id'])) {
    $kode = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    $query = "DELETE FROM raffimatkul WHERE raffiMatKode = '$kode'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
            alert('Data mata kuliah berhasil dihapus!');
            window.location.href = 'matakuliah.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data: ".addslashes(mysqli_error($koneksi))."');
            window.location.href = 'matakuliah.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID mata kuliah tidak valid');
        window.location.href = 'matakuliah.php';
    </script>";
}
?>