<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Tambah Kelas</h3></div>
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Kelas</label>
                        <input type="text" name="id_kelas" class="form-control" maxlength="5" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nm_kelas" class="form-control" required>
                    </div>
                    <div class="card-footer">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php?page=kelas" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $kd = $_POST['id_kelas'];
    $nm = $_POST['nm_kelas'];

    $queryKelas = mysqli_query($koneksi, "INSERT INTO kelas VALUES ('$kd', '$nm')");

    // Perbaikan: $queryGuru sekarang menggunakan huruf 'G' besar sesuai deklarasi di atas
    if ($queryKelas) {
        echo "<script>alert('Data Kelas berhasil disimpan'); window.location.href='index.php?page=kelas';</script>";
    } else {
        // Opsional: Tambahan pesan error untuk memudahkan pencarian bug jika gagal masuk database
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>