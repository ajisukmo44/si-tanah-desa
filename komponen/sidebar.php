<style>
@media screen and (max-width: 600px) {
  .desa {
    font-size: 10px;
  }
}
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<div class="bg-warning">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon  rotate-n-4 mt-3">
            <img src="img/batang.png" class="mt-5 mb-2 img-fluid" alt="" width="60px">
            
    <span class="text-primary desa" >Karanggeneng</span>
           
        </div>
    </a>
    <br>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-5">

    <!-- Nav Item - Dashboard -->
    </div>
    <li class="nav-item active mt-2">    
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt text-warning"></i>
        <span class="text-warning">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- sidebar berdasarkan user -->

    <!-- Heading -->
    <?php if($sesen_jabatan == 'admin') { 
        echo " 
    <div class='sidebar-heading'>
    Superadmin
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
            <i class='fas fa-fw fa-file text-warning'></i>
            <span class='text-warning'>Data Master</span>
        </a>
        <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
            <div class=' py-2 collapse-inner rounded bg-white'>
                <a class='collapse-item' href='datauser.php'>Data User</a>
                
            <a class='collapse-item' href='datapemilik.php'>Data Pemilik Tanah</a>
            </div>
        </div>
    </li>
    <li class='nav-item'>
    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#c2' aria-expanded='true' aria-controls='c2'>
        <i class='fas fa-fw fa-file text-warning' ></i>
        <span class='text-warning'>Data Tanah</span>
    </a>
    <div id='c2' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
        <div class=' py-2 collapse-inner rounded bg-white'>
            <a class='collapse-item' href='datatanahsawah.php'>Data Tanah Sawah</a>
            <a class='collapse-item' href='datatanahkering.php'>Data Tanah Kering</a>
        </div>
    </div>
</li>
"; }
?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    
<li class='nav-item'>
    <a class='nav-link collapsed' href='caridatapemiliktanah.php'  aria-expanded='true' aria-controls='c2'>
        <i class='fa fa-search text-warning' ></i>
        <span class='text-warning'>Cari Pemilik Tanah</span>
    </a>
    <div>
    </div>
</li>
    <li class='nav-item'>
    <a class='nav-link collapsed' href='caridatatanah.php'  aria-expanded='true' aria-controls='c2'>
        <i class='fa fa-search  text-warning'></i>
        <span class='text-warning'>Cari Data Tanah</span>
    </a>
    <div>
    </div>
</li>

<hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
