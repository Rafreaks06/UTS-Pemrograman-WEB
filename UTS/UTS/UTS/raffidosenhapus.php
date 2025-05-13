<?php
include 'raffikoneksi.php';
if (isset($_GET['id'])) {
    // membuka koneksi dengan mysql
    $nim = mysqli_real_escape_string($koneksi, $_GET['id']);
    // query buat hapus data yang ada pada tabel dosen
    $query = "DELETE FROM raffidosen WHERE raffiDosNid = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>
                alert('Data dosen berhasil dihapus!');
                window.location='dosen.php';
            </script>";
        } else {
            echo "<script>
                alert('Data tidak ditemukan atau sudah dihapus');
                window.location='raffidosen.php';
            </script>";
             }
       }
            }
    ?>