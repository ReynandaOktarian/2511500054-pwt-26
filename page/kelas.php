<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query_hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$kd'");
        if ($query_hapus) {
            echo '<div class="alert alert-warning alert-dismissible">Berhasil dihapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_kelas" class="btn btn-primary btn-sm mb-3">Tambah kelas</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kelas</th>
                            <th>Nomor/Nama Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysqli_error($koneksi));
                        
                        while ($result = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['id_kelas']; ?></td>
                            <td><?= $result['nm_kelas']; ?></td>
                            <td>
                                <a href="index.php?page=kelas&action=hapus&kd=<?= $result['id_kelas'] ?>" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                   class="badge badge-danger">Hapus</a>
                                
                                <a href="index.php?page=edit_kelas&kd=<?= $result['id_kelas'] ?>" 
                                   class="badge badge-warning">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>