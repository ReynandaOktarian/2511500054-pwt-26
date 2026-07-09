<?php
if (isset($_POST['simpan'])) {
    // Tangkap data dari form
    $id_kelas = $_POST['id_kelas'];
    $thn_ajaran = $_POST['thn_ajaran'];
    $semester = $_POST['semester'];
    $kd_mapel = $_POST['kd_mapel'];
    $kd_guru = $_POST['kd_guru'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $query_jadwal = "INSERT INTO jadwal (id_kelas, kd_guru, semester) 
                     VALUES ('$id_kelas', '$kd_guru', '$semester')";
    $insert_jadwal = mysqli_query($koneksi, $query_jadwal);

    $query_detail = "INSERT INTO detail_jadwal (id_kelas, thn_ajaran, kd_mapel, kd_guru, hari, jam_mulai, jam_selesai, semester) 
                     VALUES ('$id_kelas', '$thn_ajaran', '$kd_mapel', '$kd_guru', '$hari', '$jam_mulai', '$jam_selesai', '$semester')";
    $insert_detail = mysqli_query($koneksi, $query_detail);

    if ($insert_jadwal && $insert_detail) {
        echo "<script>alert('Data Jadwal berhasil disimpan ke database'); window.location.href='index.php?page=jadwal';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data! Error: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Jadwal Pelajaran</h3>
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        $q_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while($k = mysqli_fetch_array($q_kelas)) {
                            echo "<option value='".$k['id_kelas']."'>".$k['nm_kelas']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="thn_ajaran" class="form-control" placeholder="Contoh: 2023/2024" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control" required>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Mata Pelajaran</label>
                    <select name="kd_mapel" class="form-control" required>
                        <option value="">Pilih Mapel</option>
                        <?php
                        $q_mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                        while($m = mysqli_fetch_array($q_mapel)) {
                            echo "<option value='".$m['kd_mapel']."'>".$m['nm_mapel']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Guru Pengampu</label>
                    <select name="kd_guru" class="form-control" required>
                        <option value="">Pilih Guru</option>
                        <?php
                        $q_guru = mysqli_query($koneksi, "SELECT * FROM guru");
                        while($g = mysqli_fetch_array($q_guru)) {
                            echo "<option value='".$g['kd_guru']."'>".$g['nm_guru']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan Jadwal</button>
            <a href="index.php?page=jadwal" class="btn btn-default">Batal</a>
        </div>
    </form>
</div>

