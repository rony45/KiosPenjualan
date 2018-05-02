<?php
include 'config.php';
$nama = $_GET['nama'];
$query = mysqli_query("select * from barang where nama='$nama'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'harga'      =>  $mahasiswa['harga'],
      
 echo json_encode($data);
?>