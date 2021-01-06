<?php session_start();
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $errors   = array();
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email) && empty($password)) {
        echo "<script language='javascript'>alert('Silahkan Isikan email dan PASSWORD'); location.replace('../login.php')</script>";
    } elseif (empty($email)) {
        echo "<script language='javascript'>alert('Isikan email'); location.replace('../login.php')</script>";
    } elseif (empty($password)) {
        echo "<script language='javascript'>alert('Isikan PASSWORD'); location.replace('../login.php')</script>";
    }

    $sql    = "SELECT * FROM tb_user WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $data   = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $data['password'])) {
            if (empty($errors)) {

                // Menyimpan session login
                $_SESSION['id_user']    = $data['id_user'];
                $_SESSION['nama']       = $data['nama'];
                $_SESSION['alamat']     = $data['alamat'];
                $_SESSION['email']      = $data['email'];
                $_SESSION['no_hp']      = $data['no_hp'];
                $_SESSION['jabatan']    = $data['jabatan'];
                $_SESSION['foto']       = $data['foto'];

                if ($data['jabatan']  == 'admin') {
                    echo "<script language='javascript'>alert('Anda berhasil Login sebagai superadmin'); location.replace('../index.php')</script>";
                } elseif ($data['jabatan'] == 'manajer') {
                    echo "<script language='javascript'>alert('Anda berhasil Login sebagai Sales'); location.replace('../index.php')</script>";
                } 
            }
        } else {

            header("location:../login.php?alert=gagal");
        }
    } else {
        header("location:../login.php?alert=tidakterdaftar");
    }
} else {
    echo "<script>alert('Pencet dulu tombolnya!');history.go(-1)</script>";
}
