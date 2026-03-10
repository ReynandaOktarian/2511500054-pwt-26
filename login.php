<?php
include "config/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" name="Username" id="Username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="Password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="login" value="login" class="btn btn-primary btn-block">
          </div>
        </div>
      </form>

      <?php
      if(isset($_POST['login'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['password'];

        if(empty($Username) || empty($Password)) {
          echo '<div class="text-danger text-center mt-2">Data tidak boleh kosong!</div>';
        } else {
          $query = mysqli_query($koneksi, "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'");
          $userquery = mysqli_fetch_array($query);
          
          if($userquery) {
            // Set session dari data database
            $_SESSION['Username'] = $userquery['Username'];
            $_SESSION['Role'] = $userquery['Role']; // Pastikan nama kolomnya 'level' di database
            
            // Arahkan berdasarkan level
            if($userquery['Role'] == 'admin') {
              header("location:index.php");
              exit;
            } elseif ($userquery['Role'] == 'guru') {
              header("location:index2.php");
              exit;
            } elseif ($userquery['Role'] == 'siswa') {
              header("location:index3.php");
              exit;
            } else {
              echo '<div class="alert alert-warning mt-3">Level user tidak dikenali.</div>';
            }
            
          } else {
            echo '<div class="alert alert-danger alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            Login gagal. Username atau Password salah.
            </div>';
          }
        }
      }
      ?>

    </div> </div> </div> <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>