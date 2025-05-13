<style>
   .form-container {
    margin: 20px auto;           /* Tengah otomatis */
    width: 40%;
    padding: 20px;
    box-sizing: border-box;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    margin-left:100px;
}

.form-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    width: 100%;
}

.form-group label {
    flex: 1;
    text-align: right;
    margin-right: 10px;
}

.form-group input,
.form-group select {
    flex: 2;
}

.button-group {
    display: flex;
    justify-content: center;
    gap: 20px; /* Jarak antar tombol */
    margin-top: 15px;
}

.btn-submit,
.cancel-btn {
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    border: none;
    color: white;
}

.btn-submit {
    background-color: #4CAF50;
}

.cancel-btn {
    background-color: #f44336;
}

</style>


<?php
include 'raffikoneksi.php';
// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    // Sanitize input data
    $nid = mysqli_real_escape_string($koneksi, $_POST['nid']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);

    $query = "INSERT INTO raffidosen (raffiDosNid, raffiDosNama, raffiDosProdi) 
              VALUES ('$nid', '$nama', '$prodi')";

    if (mysqli_query($koneksi, $query)) {
        header("Location:dosen.php?status=sukses");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<div class="form-container">
    <h2>Tambah Data Dosen Baru</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>NID:</label>
            <input type="text" name="nid" required maxlength="20">
        </div>
        <div class="form-group">
            <label>Nama Dosen:</label>
            <input type="text" name="nama" required maxlength="50">
        </div>
        <div class="form-group">
            <label>Program Studi:</label>
            <input type="text" name="prodi" required maxlength="30">
        </div>
        <div class="button-group">
            <button type="submit" name = "submit" class="btn-submit">Simpan Data</button>
            <a href="dosen.php" class="cancel-btn">Batal</a>
        </div>
    </form>
</div>