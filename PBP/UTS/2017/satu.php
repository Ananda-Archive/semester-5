<!DOCTYPE html>
<html>
<!-- Soal tahun 2017/2018 no. 1 -->
<head>
	<title></title>
	<style type="text/css">
		*{
			font-family: arial;
			font-size: 14px;
			color: #504ABA;
		}
		table tr td{
			padding: 10px;
			vertical-align: top;
			text-align: left;
		}
		tr:nth-child(odd){
			background-color: #FFFFC2;
		}
	</style>
</head>
<body>
	<table>
		<form name="forma" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="nama smartphone" required></td>
		</tr>
		<tr>
			<td>Merek</td>
			<td>:</td>
			<td>
				<select id="merek" name="merek" required onchange="disable()">
					<option value="">--Pilih Merk--</option>
					<option value="Samsung">Samsung</option>
					<option value="Iphone">Iphone</option>
					<option value="Oppo">Oppo</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kondisi</td>
			<td>:</td>
			<td>
				<input type="radio" id="kondisi" name="kondisi" value="Baru" required checked="checked">Baru &nbsp
				<input type="radio" id="kondisi" name="kondisi" value="Bekas">Bekas
			</td>
		</tr>
		<tr>
			<td>Fitur</td>
			<td>:</td>
			<td>
				<input type="checkbox" name="fitur[]" value="4G">4G<br>
				<input type="checkbox" name="fitur[]" value="Front Camere">Front Camere<br>
				<input type="checkbox" name="fitur[]" value="GPS Navigation">GPS Navigation
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input type="text" name="harga" placeholder="harga dalam rupiah" required pattern="[0-9]{2,}">
			</td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" name="submit" value="submit"></td>&nbsp
			<td ><input type="reset" name="reset"></td>
		</tr>
		</form>
	</table>

	<script>
		function disable(){
			if(document.forms['forma']['merek'].value == "Iphone"){
				document.forms['forma']['kondisi'][1].disabled = true;
			}else{
				document.forms['forma']['kondisi'][1].disabled = false;				
			}
		}
		function validate(){
			if(document.forms['forma']['harga'].value > 3000000 && document.forms['forma']['kondisi'].value == "Bekas"){
				alert('Harga UNtuk Barang bekas harus di bawah 3 Juta');
			}
		}
	</script>
</body>
</html>