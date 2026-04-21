<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM guru WHERE kd_guru='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-md-8">
        <h3>Edit Guru</h3>
        <form method="POST">
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nm_guru" class="form-control" value="<?php echo $data['nm_guru']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenkel" class="form-control">
                    <option value="Laki-laki" <?php if($data['jenkel'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($data['jenkel'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
                <div class="form-group">
                <label>Pendidikan Terakhir</label>
                <select name="pend_terakhir" class="form-control" required>
                    <option value="">-- Pilih Pendidikan --</option>
                    <option value="Strata 2">Strata 2</option>
                    <option value="Strata 1">Strata 1</option>
                    <option value="Diploma 3">Diploma 3</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php?page=guru" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $nm = mysqli_real_escape_string($koneksi, $_POST['nm_guru']);
    $jk = $_POST['jenkel'];
    $pt = mysqli_real_escape_string($koneksi, $_POST['pend_terakhir']);

    $update = mysqli_query($koneksi, "UPDATE guru SET nm_guru='$nm', jenkel='$jk', pend_terakhir='$pt' WHERE kd_guru='$id'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diperbarui'); window.location.href='index.php?page=guru';</script>";
    }
}
?>