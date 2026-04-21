<?php
$ns = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$ns'");
$data = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-md-8">
        <h3>Edit Siswa</h3>
        <form method="POST">
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nm_siswa" class="form-control" value="<?php echo $data['nm_siswa']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenkel" class="form-control">
                    <option value="Laki-laki" <?php if($data['jenkel'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($data['jenkel'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
             <div class="form-group">
                <label>Id Kelas</label>
                <input type="text" name="id_kelas" class="form-control" value="<?php echo $data['id_kelas']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php?page=siswa" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $nm = mysqli_real_escape_string($koneksi, $_POST['nm_siswa']);
    $jk = $_POST['jenkel'];
    $ik = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);

    $update = mysqli_query($koneksi, "UPDATE siswa SET nm_siswa='$nm', jenkel='$jk', id_kelas='$ik' WHERE nis='$ns'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diperbarui'); window.location.href='index.php?page=siswa';</script>";
    }
}
?>