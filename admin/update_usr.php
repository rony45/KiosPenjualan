<?php 
include 'config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$level=$_POST['level'];
$pass=$_POST['pass'];

mysql_query("update admin set level='$level' where id='$id'");
header("location:data_user.php");

?>