<?php 
include 'config.php';
$user=$_POST['user'];
$pass=md5($_POST['pass']);
$level=$_POST['level'];


mysql_query("insert into admin values('','$user','$pass','','$level')");
header("location:data_user.php");

 ?>