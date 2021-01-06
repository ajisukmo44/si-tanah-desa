<!DOCTYPE html>
<html lang="en">

<?php
include 'fungsi/imgpreview.php';
include 'komponen/header.php';


?>

<body id="page-top">

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
                <div class="card card-body bg-primary">
                <center> <h5> Cari Berdasarkan ..</h5></center>
                   <form action="hasilcaritanah.php" method="post"> 
                <div class="row col-sm-12 justify-content-center  bg-primary " style="border-radius:2%">     
                <div class="col-sm-7 mb-1 col-12">
                    <input type="text" class="form-control" name="data" placeholder="Masukan nomer iuran ......" aria-label="Recipient's username">
                    </div>
                    <div class="col-12 mb-1 col-sm-3">
                        <select name="type" id="" class="form-control">
                            <option value="sawah">Data Tanah Sawah</option>
                            <option value="kering">Data Tanah Kering</option>
                        </select>
                    </div>
                    <div class="col-12 mb-1 col-sm-2">
                    <button type="submit" name="submit" class="btn btn-warning btn-block"  class="form-control" ><i class="fa fa-search"></i> CARI </button>
                    </div>
                </div>
                </div>
                </form>
                
            </div>
            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php include 'komponen/footer.php' ?>

        </div>

    </div>
    <!-- End of Page Wrapper -->


 

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>



</body>

</html>