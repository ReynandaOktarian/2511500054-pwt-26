<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Data Siswa</h3>
        <a href="index.php?page=tambah_siswa" class="btn btn-primary mb-3">Tambah Siswa</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>L/P</th>
                    <th>Id Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM siswa");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nm_siswa']; ?></td>
                    <td><?php echo $data['jenkel']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                    <td>
                        <a href="index.php?page=edit_siswa&id=<?php echo $data['nis']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=siswa&hapus=<?php echo $data['nis']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
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
    $delete = mysqli_query($koneksi, "DELETE FROM siswa WHERE Nis='$id'");
    $deleteUser = mysqli_query($koneksi, "DELETE FROM user WHERE Username='$id'");
    if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?page=siswa';</script>";
    }
}
?>