<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Tambah Siswa</h3></div>
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nis Siswa (Username)</label>
                        <input type="text" name="nis" class="form-control" maxlength="5" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nm_siswa" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenkel" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Id Kelas</label>
                        <input type="text" name="id_kelas" class="form-control" required>
                    </div>
                    </div> </div> <div class="card-footer">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php?page=siswa" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $ns = $_POST['nis'];
    $nm = $_POST['nm_siswa'];
    $jk = $_POST['jenkel'];
    $ik = $_POST['id_kelas'];
    
    $querySiswa = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('$ns', '$nm', '$jk', '$ik')");
    $queryUser = mysqli_query($koneksi, "INSERT INTO users (Username, Password, role) VALUES ('$ns', '1234', 'siswa')");

    if ($querySiswa && $queryUser) {
        echo "<script>alert('Data Siswa & User berhasil disimpan'); window.location.href='index.php?page=siswa';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>