<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=md5($_POST['pass']);
$level=$_GET['level'];

$query=mysql_query("select * from admin where uname='$uname' and pass='$pass'")or die(mysql_error());
if(mysql_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	$_SESSION['level']=$level;
	header("location:admin/index.php");
}else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>