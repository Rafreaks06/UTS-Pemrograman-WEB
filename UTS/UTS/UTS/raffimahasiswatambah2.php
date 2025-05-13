<style>
    .form-container {
    float: right;
    margin-right: 400px;     /* Jarak dari sisi kanan */
    margin-top: 20px;       /* Jarak dari atas */
    width: 40%;             /* Atur lebar form agar tidak terlalu lebar */
    }
    .form-group input,
    .form-group textarea {
        flex: 2;
    }
    .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        max-width: 500px;
    }
    .form-group label {
        flex: 1;
        text-align: right;
        margin-right: 10px;
    }
    .form-buttons {
        display: flex;
        justify-content: center;        
        gap: 20px;               
        margin-top: 15px;
    }

    .btn-submit, .cancel-btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .btn-submit {
        background-color: #4CAF50;
        color: white;
        border: none;
    }

    .cancel-btn {
        background-color: #f44336;
        color: white;
    }
    .form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    margin-right: 20px;
}

</style>
<?php
include 'raffikoneksi.php';
if (isset($_POST['submit'])) {
    // Sanitize input data
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $query = "INSERT INTO raffimahasiswa (raffiMahNim, raffiMahNama, raffiMahProdi, raffiMahKota, raffiMahAlamat) 
              VALUES ('$nim', '$nama', '$prodi', '$kota', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        header("Location:mahasiswa.php?status=sukses");
        exit();
    } else {
        echo "<div class='error'>Gagal menambahkan data: " . htmlspecialchars(mysqli_error($koneksi)) . "</div>";
    }
}
?>

<div class="form-container">
<h2>Form Input Data Mahasiswa</h2>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <div style="color: green; background-color: #e6ffe6; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            Data berhasil ditambahkan!
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" required maxlength="15">
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" required maxlength="50">
        </div>
        <div class="form-group">
            <label>Prodi:</label>
            <input type="text" name="prodi" required maxlength="30">
        </div>
        <div class="form-group">
            <label>Kota:</label>
            <input type="text" name="kota" required maxlength="30">
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div class="form-buttons">
            <input class="btn-submit" type="submit" name="submit" value="Simpan">
            <a href="mahasiswa.php" class="cancel-btn">Batal</a>
        </div>
    </form>
</div>