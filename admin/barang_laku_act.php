<?php 
include 'config.php';
for($i=0;$i<$_POST['jumlah'];$i++){
$tgl=$_POST['tgl'.$i];
$nama=$_POST['nama'.$i];
$harga=$_POST['harga'.$i];
$jumlah=$_POST['jumlah2'.$i];

$dt=mysql_query("select * from barang where nama='$nama'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
mysql_query("insert into barang_laku values('','$tgl','$nama','$jumlah','$harga','$total_harga','$labaa')")or die(mysql_error());
header("location:barang_laku.php");

}
?>