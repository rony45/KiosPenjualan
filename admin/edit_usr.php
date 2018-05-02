<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit User</h3>
<a class="btn" href="data_user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysql_real_escape_string($_GET['id']);
$qry=mysql_query("select * from admin where id='$id'");
while($d=mysql_fetch_array($qry)){
?>					
	<form action="update_usr.php" method="post" autocomplete="off">
		<table class="table" >
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['uname'] ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" class="form-control" name="pass" value="<?php echo $d['pass'] ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
				<select class="form-control" name="level">
									<option value="<?php echo $d['level']; ?>"><?php echo $d['level'] ?></option>
									<option value="User">User</option>
									<option value="Admin">Admin</option>
							</select>
				</td>
			</tr>
			<tr>
			<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>