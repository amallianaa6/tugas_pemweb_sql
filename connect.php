<html>
<head>
</head>
<body>

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

// MEMBUAT DATABASE ke DB 
$sql1 = "CREATE DATABASE tugassql";
if (mysqli_query($koneksi,$sql1)){
    echo "<br>";
    echo "Database berhasil dibuat";
} else {
    echo "Database gagal dibuat" .mysqli_error($koneksi);
}

// MEMBUAT TABEL di DB
$sql2 = "CREATE TABLE mahasiswa (nim INT (10)
        UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        namadepan VARCHAR (20) NOT NULL, 
        namabelakang VARCHAR (20) NOT NULL,
        email VARCHAR (50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        ON UPDATE CURRENT_TIMESTAMP)";
if (mysqli_query($koneksi,$sql2)){
    echo "Tabel berhasil dibuat";
} else {
    echo "Tabel gagal dibuat" .mysqli_error($koneksi);
}

// insert
$sql3 = "INSERT INTO mahasiswa (namadepan,namabelakang,email) VALUES ('Amallia','Azizah','amallianurulaz@gmail.com')";
if (mysqli_query($koneksi,$sql3)){
    $last_id = mysqli_insert_id($koneksi);
    echo "Data baru berhasil dimasukan. ID terakhir:" . $last_id;
}else{
    echo "Gagal menambah data mahasiswa <br>" .mysqli_error($koneksi);
}

//update
echo "<br>========Update DATA==========<br>";
$sql4 = "UPDATE mahasiswa SET namadepan='LIliana' WHERE nim=2";

if (mysqli_query($koneksi, $sql4)) {
  echo "Data Berhasil diperbarui <br>";
} else {
  echo "Error Memperbarui Data: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>