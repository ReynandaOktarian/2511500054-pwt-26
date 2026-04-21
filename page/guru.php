<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Data Guru</h3>
        <a href="index.php?page=tambah_guru" class="btn btn-primary mb-3">Tambah Guru</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Guru</th>
                    <th>L/P</th>
                    <th>Pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM guru");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kd_guru']; ?></td>
                    <td><?php echo $data['nm_guru']; ?></td>
                    <td><?php echo $data['jenkel']; ?></td>
                    <td><?php echo $data['pend_terakhir']; ?></td>
                    <td>
                        <a href="index.php?page=edit_guru&id=<?php echo $data['kd_guru']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=guru&hapus=<?php echo $data['kd_guru']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($koneksi, "DELETE FROM guru WHERE Kd_guru='$id'");
    $deleteUser = mysqli_query($koneksi, "DELETE FROM user WHERE Username='$id'");
    if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?page=guru';</script>";
    }
}
?>