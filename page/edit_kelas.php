<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas ='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-md-8">
        <h3>Edit Kelas</h3>
        <form method="POST">
            <div class="form-group">
                <label>Kode Kelas</label>
                <input type="text" name="id_kelas" class="form-control" value="<?php echo $data['id_kelas']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nm_kelas" class="form-control" value="<?php echo $data['nm_kelas']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nm_kelas" class="form-control" value="<?php echo $data['nm_kelas']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php?page=kelas" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);
    $nm = mysqli_real_escape_string($koneksi, $_POST['nm_kelas']);

    $update = mysqli_query($koneksi, "UPDATE kelas SET nm_kelas='$nm', id_kelas='$id' WHERE id_kelas='$id'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diperbarui'); window.location.href='index.php?page=kelas';</script>";
    }
}
?>