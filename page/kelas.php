<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Data Kelas</h3>
        <a href="index.php?page=tambah_kelas" class="btn btn-primary mb-3">Tambah Kelas</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nomor Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                    <td><?php echo $data['nm_kelas']; ?></td>
                    <td>
                        <a href="index.php?page=edit_kelas&id=<?php echo $data['id_kelas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=kelas&hapus=<?php echo $data['id_kelas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
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
    $delete = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id'");
    if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?page=kelas';</script>";
    }
}
?>