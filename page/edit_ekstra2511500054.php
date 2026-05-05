<?php
$kd = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM ekstra2511500054 WHERE id_ekstra='$kd'");
$data = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-md-8">
        <h3>Edit Ekstrakulikuler</h3>
        <form method="POST">
            <div class="form-group">
                <label>Nama ekstrakulikuler</label>
                <input type="text" name="nama_ekstra" class="form-control" value="<?php echo $data['nama_ekstra']; ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" value="<?php echo $data['ket']; ?>" required>        
             <div class="form-group">
                <label>Semester</label>
                <select name="semester" class="form-control">
                    <option value="1" <?php if($data['semester'] == '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if($data['semester'] == '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if($data['semester'] == '3') echo 'selected'; ?>>3</option>
                    <option value="4" <?php if($data['semester'] == '4') echo 'selected'; ?>>4</option>
                    <option value="5" <?php if($data['semester'] == '5') echo 'selected'; ?>>5</option>
                    <option value="6" <?php if($data['semester'] == '6') echo 'selected'; ?>>6</option>
                    <option value="7" <?php if($data['semester'] == '7') echo 'selected'; ?>>7</option>
                    <option value="8" <?php if($data['semester'] == '8') echo 'selected'; ?>>8</option>
                </select>
            </div>
            <div>
                <label>Tahun Ajaran</label>
                <select name="thn_ajaran" class="form-control">
                    <option value="2020/2021" <?php if($data['thn_ajaran'] == '2020/2021') echo 'selected'; ?>>2020/2021</option>
                    <option value="2021/2022" <?php if($data['thn_ajaran'] == '2021/2022') echo 'selected'; ?>>2021/2022</option>
                    <option value="2022/2023" <?php if($data['thn_ajaran'] == '2022/2023') echo 'selected'; ?>>2022/2023</option>
                    <option value="2023/2024" <?php if($data['thn_ajaran'] == '2023/2024') echo 'selected'; ?>>2023/2024</option>
                    <option value="2024/2025" <?php if($data['thn_ajaran'] == '2024/2025') echo 'selected'; ?>>2024/2025</option>
                    <option value="2025/2026" <?php if($data['thn_ajaran'] == '2025/2026') echo 'selected'; ?>>2025/2026</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php?page=ekstra2511500054" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $nm = mysqli_real_escape_string($koneksi, $_POST['nama_ekstra']);
    $ket = mysqli_real_escape_string($koneksi, $_POST['ket']);
    $semester = $_POST['semester'];
    $thn_ajaran = $_POST['thn_ajaran'];

    $update = mysqli_query($koneksi, "UPDATE ekstra2511500054 SET nama_ekstra='$nm', ket='$ket', semester='$semester', thn_ajaran='$thn_ajaran' WHERE id_ekstra='$kd'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diperbarui'); window.location.href='index.php?page=ekstra2511500054';</script>";
    }
}
?>