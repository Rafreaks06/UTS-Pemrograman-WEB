<article>
<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
    }
    article {
        max-width: 1200px;
        margin: 20px auto;
        padding: 25px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-height:1200px;
    }
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 2px solid #3498db;
        font-size: 24px;
        margin-top:-20px;
    }
    .button {
        background-color: #3498db;
        border-radius: 6px;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .button:hover {
        background-color: #2980b9;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 14px;
    }
    
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    
    th {
        background-color: #f8f9fa;
        color: #2c3e50;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
    }
    
    tr:hover {
        background-color: #f5f7fa;
    }
    
    .action-btn {
        background-color: #e74c3c;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 13px;
        transition: background-color 0.3s;
    }
</style>
    <h1>Daftar Data Mahasiswa</h1>
    
    <table>
        <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="15%">NIM</th>
                <th width="20%">Nama</th>
                <th width="20%">Prodi</th>
                <th width="15%">Kota</th>
                <th width="15%">Alamat</th>
                <th width="10%"><a href="mahasiswa2.php">TINDAKAN</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                include 'raffikoneksi.php';
                $raffidata = mysqli_query($koneksi, "SELECT * FROM raffimahasiswa");
                while($raffi = mysqli_fetch_array($raffidata)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($raffi['raffiMahNim']); ?></td>
                <td><?php echo htmlspecialchars($raffi['raffiMahNama']); ?></td>
                <td><?php echo htmlspecialchars($raffi['raffiMahProdi']); ?></td>
                <td><?php echo htmlspecialchars($raffi['raffiMahKota']); ?></td>
                <td><?php echo htmlspecialchars($raffi['raffiMahAlamat']); ?></td>
                <td>
                    <a href="raffimahasiswahapus.php?id=<?php echo urlencode($raffi['raffiMahNim']); ?>" 
                       class="action-btn" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>      
            </tr>
            <?php } ?>
        </tbody>
    </table>
</article>