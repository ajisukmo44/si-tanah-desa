<?php
if (isset($_SESSION['email'])) {
	$sesen_id		 = $_SESSION['id_user'];
	$sesen_nama		 = $_SESSION['nama'];
	$sesen_alamat	 = $_SESSION['alamat'];
	$sesen_email 	 = $_SESSION['email'];
	$sesen_nohp 	 = $_SESSION['no_hp'];
	$sesen_jabatan 	 = $_SESSION['jabatan'];
	$sesen_foto	     = $_SESSION['foto'];
}
