<?php
// Ambil Username dan Role dari session saat login
$username_ses = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
$role_ses = isset($_SESSION['Role']) ? $_SESSION['Role'] : ''; 
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal Pelajaran</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-body">
                
                <?php 
                // Tombol Tambah Jadwal HANYA muncul untuk Admin
                if ($role_ses == 'admin') { 
                ?>
                    <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm mb-3">
                        <i class="fas fa-plus"></i> Tambah Jadwal Baru
                    </a>
                
                <a href="page/cetak_jadwal.php" target="_blank" class="btn btn-success btn-sm mb-3">
                    <i class="fas fa-print"></i> Cetak Jadwal
                </a>
                <?php } ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Mapel</th>
                            <th>Guru Pengampu</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <?php 
                            // Kolom Aksi HANYA muncul untuk Admin
                            if ($role_ses == 'admin') { echo "<th>Aksi</th>"; } 
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        
                        // 1. Query Dasar (Tampilkan Semua untuk Admin)
                        $query = "SELECT j.*, k.nm_kelas, m.nm_mapel, g.nm_guru 
                                  FROM detail_jadwal j 
                                  JOIN kelas k ON j.id_kelas = k.id_kelas 
                                  JOIN mapel m ON j.kd_mapel = m.kd_mapel 
                                  JOIN guru g ON j.kd_guru = g.kd_guru ";
                        
                        // 2. Filter Query Berdasarkan Role
                        if ($role_ses == 'guru') {
                            // Asumsi: Username di tabel 'users' sama dengan 'kd_guru' atau 'nip' di tabel guru
                            $query .= " WHERE g.kd_guru = '$username_ses' "; // Sesuaikan 'kd_guru' jika relasinya berbeda
                        } 
                        else if ($role_ses == 'siswa') {
                            // Asumsi: Kita harus menghubungkan jadwal dengan tabel siswa berdasarkan NIS (Username)
                            $query .= " JOIN siswa s ON s.id_kelas = j.id_kelas 
                                        WHERE s.nis = '$username_ses' "; // Sesuaikan 'nis' jika kolom beda
                        }

                        // 3. Urutkan Jadwal
                        $query .= " ORDER BY FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), j.jam_mulai ASC";
                        
                        $sql = mysqli_query($koneksi, $query);
                        
                        if ($sql && mysqli_num_rows($sql) > 0) {
                            while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><strong><?= $data['nm_kelas']; ?></strong></td>
                                <td class="text-center"><?= $data['thn_ajaran']; ?></td>
                                <td class="text-center">
                                    <span class="badge badge-info"><?= ucwords($data['semester']); ?></span>
                                </td>
                                <td>
                                    <strong><?= $data['nm_mapel']; ?></strong><br>
                                    <small class="text-muted">Kode: <?= $data['kd_mapel']; ?></small>
                                </td>
                                <td><?= $data['nm_guru']; ?></td>
                                <td class="text-center">
                                    <span class="badge badge-success"><?= $data['hari']; ?></span>
                                </td>
                                <td class="text-center">
                                    <i class="far fa-clock"></i> 
                                    <?= date('H:i', strtotime($data['jam_mulai'])); ?> - <?= date('H:i', strtotime($data['jam_selesai'])); ?>
                                </td>
                                <?php 
                                // Tombol Hapus HANYA muncul untuk Admin
                                if ($role_ses == 'admin') { 
                                ?>
                                    <td class="text-center">
                                        <a href="index.php?page=jadwal&hapus=<?= $data['id_jadwal']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php 
                            }
                        } else {
                            $colspan = ($role_ses == 'admin') ? 9 : 8; // Jika bukan admin, kolomnya sisa 8
                            $error_msg = !$sql ? "Error Database: " . mysqli_error($koneksi) : "Belum ada data jadwal yang tersedia.";
                            echo "<tr><td colspan='{$colspan}' class='text-center text-muted py-4'>{$error_msg}</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Fungsi hapus dilindungi, pastikan hanya admin yang bisa memicu script hapus ini
if (isset($_GET['hapus']) && $role_ses == 'admin') {
    $id = $_GET['hapus'];
    
    $delete = mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE id_detail='$id'");
    
    if ($delete) {
        echo "<script>alert('Data Jadwal Berhasil Dihapus'); window.location.href='index.php?page=jadwal';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data jadwal. Error: " . mysqli_error($koneksi) . "'); window.location.href='index.php?page=jadwal';</script>";
    }
}
?>