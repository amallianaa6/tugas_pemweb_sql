<?php
// connect ke db
$servername = "localhost";
$username = "root";
$password = "";
$database = "tugassql"; 

$koneksi = mysqli_connect($servername,$username,$katasandi,$database);

if (!$koneksi){
    die ("Gagal terhubung ke database");
}else{
    print ("berhasil terhubung ke database <br>");
}
?>