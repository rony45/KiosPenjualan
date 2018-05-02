<html>
<head>
<script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.harga<?php echo $i; ?>.value;
two = document.autoSumForm.jumlah2<?php echo $i; ?>.value; 
document.autoSumForm.jumlahoto.value = (one * 1) * (two * 1);}
function stopCalc(){
clearInterval(interval);}
</script>


</head>
<?php include 'header.php';	?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Form Input Entry Penjualan </h3>

<form action="barang_laku_act.php" name='autoSumForm' >

<input name="tgl<?php echo $i; ?>" type="text" id="tgl" placeholder="Tanggal">
<select name="nama<?php echo $i; ?>">
								<?php 
								$brg=mysql_query("select * from barang");
								while($b=mysql_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>
<input type='text' name='harga<?php echo $i; ?>' style="text-align:right;"  size='23'   onFocus="startCalc();" onBlur="stopCalc();" />
<input type='text' name='jumlah2<?php echo $i; ?>'  style="text-align:right;"  size='23'   onFocus="startCalc();" onBlur="stopCalc();" />
<input readonly type=text value='0' name="jumlahoto" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
</br>

      <input type="hidden" name="jumlah" value="<?php echo $_POST['angka']?>"/>
     <input type="submit" class="btn btn-primary" value="Simpan">
     </form>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
<?php include 'footer.php'; ?>
</html>
