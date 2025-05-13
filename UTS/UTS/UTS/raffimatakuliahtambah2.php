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

.form-buttons {
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

if (isset($_POST['submit'])) {
    // Sanitize input data
    $kode = mysqli_real_escape_string($koneksi, $_POST['kode']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $sks = mysqli_real_escape_string($koneksi, $_POST['sks']);
    $semester = isset($_POST['semester']) ? mysqli_real_escape_string($koneksi, $_POST['semester']) : NULL;
    $dosen = isset($_POST['dosen']) ? mysqli_real_escape_string($koneksi, $_POST['dosen']) : NULL;

    $query = "INSERT INTO raffimatkul (raffiMatKode, raffiMatNama, raffiMatSks, raffiMatSemester, raffiMatDosen) 
              VALUES ('$kode', '$nama', '$sks', '$semester', '$dosen')";

    if (mysqli_query($koneksi, $query)) {
        header("Location:matakuliah.php?status=sukses");
        exit();
    } else {
        echo "<div class='error'>Gagal menambahkan data: " . htmlspecialchars(mysqli_error($koneksi)) . "</div>";
    }
}
?>
<div class="form-container">
    <h2>Form Input Data Mata Kuliah</h2>
    
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <div style="color: green; background-color: #e6ffe6; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            Data mata kuliah berhasil ditambahkan!
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Kode Mata Kuliah:</label>
            <input type="text" name="kode" required maxlength="10" placeholder="Contoh: MK001">
        </div>
        <div class="form-group">
            <label>Nama Mata Kuliah:</label>
            <input type="text" name="nama" required maxlength="100" placeholder="Contoh: Pemrograman Web">
        </div>
        <div class="form-group">
            <label>SKS:</label>
            <select name="sks" required>
                <option value="" required maxlength="1">Pilih SKS</option>
                <?php for($i=1; $i<=4; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i;?>SKS</option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <select name="semester" required>
                <option value="" required maxlength="1">Pilih Semester</option>
                <?php for($i=1; $i<=8; $i++): ?>
                    <option value="<?php echo $i; ?>">Semester<?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengampu:</label>
            <input type="text" name="dosen" maxlength="50" placeholder="Nama Dosen">
        </div>
        <div class="form-buttons"><input class="btn-submit" type="submit" name="submit" value="Simpan Data">
        <a href="matakuliah.php" class="cancel-btn">Batal</a>  
        </div>
        
    </form>
</div>