<!DOCTYPE html>
<html lang="en">

<?php include 'komponen/header.php' ?>

<?php
$sql    = "SELECT * FROM tb_pemilik_tanah ";
$result = mysqli_query($conn, $sql);
$datapt = mysqli_num_rows($result);

$sql    = "SELECT * FROM tb_tanah_sawah ";
$result = mysqli_query($conn, $sql);
$datats = mysqli_num_rows($result);

$sql    = "SELECT * FROM tb_tanah_kering ";
$result = mysqli_query($conn, $sql);
$datatk = mysqli_num_rows($result);
?>

<body style="background-color:#EFF7FC">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'komponen/sidebar.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'komponen/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            
<?php 
if($sesen_jabatan == 'admin' ){
  echo "
  <!-- Content Row -->
  <div class='row'>
    <div class='col-xl-4 col-md-4 mb-4 '>
      <div class='card border-bottom-success shadow h-100 py-2'>
        <div class='card-body '>
          <div class='row no-gutters align-items-center'>
            <div class='col mr-2'>
            <a href='datapemilik.php' style='text-decoration:none' ><div class='p mb-0 font-weight-bold text-gray-800'> <b>{$datapt}</b> DATA PEMILIK TANAH </div></a>
            </div>
            <div class='col-auto'>
              <i class='fas fa-address-card fa-2x text-gray-300'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class='col-xl-4 col-md-4 mb-4 '>
      <div class='card border-bottom-info shadow h-100 py-2'>
        <div class='card-body '>
          <div class='row no-gutters align-items-center'>
            <div class='col mr-2'>
            <a href='datatanahsawah.php' style='text-decoration:none' ><div class='p mb-0 font-weight-bold text-gray-800'> <b>{$datats}</b> DATA TANAH SAWAH </div></a>
            </div>
            <div class='col-auto'>
              <i class='fas fa-file fa-2x text-gray-300'></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<div class='col-xl-4 col-md-4 mb-4 '>
<div class='card border-bottom-danger shadow h-100 py-2'>
  <div class='card-body '>
    <div class='row no-gutters align-items-center'>
      <div class='col mr-2'>
      <a href='datatanahkering.php' style='text-decoration:none' ><div class='p mb-0 font-weight-bold text-gray-800'> <b> {$datatk} </b> DATA TANAH KERING</div></a>
      </div>
      <div class='col-auto'>
        <i class='fas fa-file fa-2x text-gray-300'></i>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
  ";
} 
         
?>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'komponen/footer.php' ?>

</body>

</html>