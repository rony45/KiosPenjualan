<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Input Data</h3>
<!--<a href="entry_penjualan.php"><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry</button></a>-->
 
<html>
<head>
	<title></title>
	
	<!-- Load plugin jquery nya -->
	<script src="jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
</head>
<body>
	<h1></h1>
	
	<form method="post" action="proses.php" autocomplete="off">
		<!-- Buat tombol untuk menabah form data -->
		<!--<button type="button" id="btn-tambah-form">Tambah Data Form</button>
		<button type="button" id="btn-reset-form">Reset Form</button><br><br>-->
		
		<b></b>
		<button type="button" id="btn-tambah-form" class="btn btn-primary">Tambah Data Form</button><button type="button" class="btn btn-danger" id="btn-reset-form">Reset Form</button>
		<table class="table">
		<tr>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Jumlah</th>
		</tr>
		<tr>
		<td><input class="form-control" placeholder="YYYY/MM/DD" type="text" name="nis[]" id="tgl" required></td>
		<td><input class='form-control' placeholder="Nama Barang" type='text' name='nama[]' required></td>
		<td><input class="form-control" placeholder='Harga' type="text" name="telp[]" required></td>
		<td><input class="form-control" placeholder='Jumlah' type="text" name="alamat[]" required></td>
		</tr>
		</table>
		<br><br>

		<div id="insert-form"></div>
		
		<hr>
		<input type="submit" class="btn btn-primary" value="Simpan">
	</form>
	
	<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append(
				"<table class='table'>" +
				"<tr>" +
				"<tr></tr>" +
				"<tr></tr>" +
				"<tr></tr>" +
				"<tr></tr>" +
				"<tr></tr>" +
				"</tr>" +
				"<tr>" +
				"<td><input class='form-control' placeholder='YYYY/MM/DD' type='text' name='nis[]' id='tgl' required></td>" +
				"<td><input class='form-control' placeholder='Nama Barang' type='text' name='nama[]' required></td>" +
				"<td><input class='form-control' placeholder='Harga' type='text' name='telp[]' required></td>" +
				"<td><input class='form-control' placeholder='Jumlah' type='text' name='alamat[]' required></td>" +
				"</tr>" +
				"</table>" +
				"<br><br>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
</body>
</html>

	<?php include 'footer.php'; ?>