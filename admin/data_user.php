<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data User</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah User</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from admin");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	</br>
	</br>
	</div>
<form action="cari_usr.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari User di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">User</th>
		<th class="col-md-3">Password</th>
		<th class="col-md-1">Level</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from admin where uname like '%$cari%'");
	}else{
		$brg=mysql_query("select * from admin limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['uname'] ?></td>
			<td><?php echo $b['pass'] ?></td>
			<td><?php
				echo ($b['level']==1) ? "Administrator" : "User";
			?></td>
			<td>
				<a href="det_usr.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_usr.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_usr.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Pengguna</td>
		<td>			
		<?php 
		
			$x=mysql_query("select count(uname) as total from admin");	
			$xx=mysql_fetch_array($x);			
			echo "<b> ".($xx['total'])." orang</b>";		
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data User</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_usr_act.php" method="post">
					<div class="form-group">
						<label>Nama User</label>
						<input name="user" type="text" class="form-control" placeholder="Nama User .." autocomplete="off">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="pass" type="text" class="form-control" placeholder="Password .." autocomplete="off">
					</div>
					<div class="form-group">
							<label>Level</label>								
							<select class="form-control" name="level">
									<option value="0">User</option>
									<option value="1">Admin</option>
							</select>
						</div>										
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>