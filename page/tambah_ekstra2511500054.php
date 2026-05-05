<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Tambah Ekstrakulikuler</h3></div>
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Ekstrakulikuler</label>
                        <input type="text" name="id_ekstra" class="form-control" maxlength="5" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Ekstrakulikuler</label>
                        <input type="text" name="nama_ekstra" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control" required>
                    </div>
                     <div class="form-group">
                <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
            </div>
                    <div class="form-group">
                        <label>Tahun ajaran</label>
                        <select name="thn_ajaran" class="form-control">
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2022/2023">2022/2023</option>
                            <option value="2023/2024">2023/2024</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2025/2026">2025/2026</option>
                        </select>
                    <div class="card-footer">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php?page=ekstra2511500054" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $kd = $_POST['id_ekstra'];
    $nm = $_POST['nama_ekstra'];
    $ket = $_POST['ket'];
    $semester = $_POST['semester'];
    $thn_ajaran = $_POST['thn_ajaran'];

    $queryekstra = mysqli_query($koneksi, "INSERT INTO ekstra2511500054 VALUES ('$kd', '$nm', '$ket', '$semester', '$thn_ajaran')");

    if ($queryekstra) {
        echo "<script>alert('Data Ekstrakulikuler berhasil disimpan'); window.location.href='index.php?page=ekstra2511500054';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>