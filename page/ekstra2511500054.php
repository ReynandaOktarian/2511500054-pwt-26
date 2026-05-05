<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Data Ekstrakulikuler</h3>
        <a href="index.php?page=tambah_ekstra2511500054" class="btn btn-primary mb-3">Tambah Ekstra</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>id Ektra</th>
                    <th>Nama Ekstra</th>
                    <th>keterangan</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM ekstra2511500054");
                while ($data = mysqli_fetch_array($query)) {
                ?>  
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_ekstra']; ?></td>
                    <td><?php echo $data['nama_ekstra']; ?></td>
                    <td><?php echo $data['ket']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['thn_ajaran']; ?></td>
                    <td>
                        <a href="index.php?page=edit_ekstra2511500054&id=<?php echo $data['id_ekstra']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=ekstra2511500054&hapus=<?php echo $data['id_ekstra']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
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
    $delete = mysqli_query($koneksi, "DELETE FROM ekstra2511500054 WHERE id_ekstra='$id'");
    if ($delete) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?page=ekstra2511500054';</script>";
    }
}
?>