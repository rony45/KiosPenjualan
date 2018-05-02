<?php
mysql_connect("localhost","root","");
mysql_select_db("kios");

     $NIS = $_POST['NIS'.$i];
     $NAMA= $_POST['NAMA'.$i];

mysql_query("insert into siswa values('$nis','$nama')");

?>