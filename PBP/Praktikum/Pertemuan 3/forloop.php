<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$harga = 1000;
		echo"<table border='1'>";
		echo"
			<tr>
				<td>No</td>
				<td>Diskon</td>
				<td>Harga setelah di diskon</td>
			</tr>
		";
		for($i=0; $i<=10; $i++){
			echo"<tr>";
				echo"<td>" . $i . "</td>";
				$diskon = 0.1 * $i;
				echo"<td>" . $diskon*100 . "%" . "</td>";
				$hargaDiskon = $harga - ($harga*$diskon);
				echo"<td>" . $hargaDiskon . "</td>";
			echo"</tr>";
		}
	?>
</body>
</html>