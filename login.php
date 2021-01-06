<?php session_start();
// Cek sudah Login/belum
if (isset($_SESSION['email'])) {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Desa Karanggeneng - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-22.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-4 col-md-5">

        <!-- Nested Row within Card Body -->
        <div class="login-box mt-5" style="background-color:#FAFA1F; border-radius: 2%;">

          <!-- /.login-logo -->
          <div class="card" style="background-color:#FAFA1F">
            <div class="login-logo justify-content-center">
              <center> <img src="img/batang.png" width="100" alt="" class="text-center mb-1 mt-4"></center>
             <center> <h4> Desa Karanggeneng</h3></center> 
            </div>

            <div class="card-body">
              <?php
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == "gagal") {
                  echo "<div class='alert alert-danger text-center'>Email atau Password salah!</div>";
                } elseif ($_GET['alert'] == "tidakterdaftar") {
                  echo "<div class='alert alert-danger text-center'>Email Tidak Terdaftar!</div>";
                }
              }
              ?>
              <form action="aksi/login.php" method="post">
                <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" id="password" minlength="6" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-7 col-xs-6">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember" onclick="myFunction()">
                      <label for="remember">
                        Show Password
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-5 col-xs-6">
                    <button  type="submit" name="submit" class="btn btn-primary btn-block" style="color:#FAFA1F">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>


            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
    //password
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    };
  </script>


</body>

</html>