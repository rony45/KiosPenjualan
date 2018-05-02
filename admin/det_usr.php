<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pengguna</h3>
<a class="btn" href="data_user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_usr=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from admin where id='$id_usr'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['uname'] ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo $d['pass'] ?></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><?php echo $d['level'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>