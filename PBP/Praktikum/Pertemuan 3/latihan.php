<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		tr th{
			padding: 30px;
		}
		tr td{
			padding: 5px;
		}
	</style>
</head>
<body>
	<?php
		$array_mhs = array(
			'Abdul' => array(89,90,54),
			'Budi' => array(78,60,64),
			'Nina' => array(89,69,50),
			'Budi' => array(98,65,74)
		);
		function hitung_rata($a){
			$sum = 0;
			for($i=0; $i<sizeof($a); $i++){
				$sum = $sum + $a[$i];
			}
			return $sum/sizeof($a);
		}
		echo"<table border=1 style='border-collapse: collapse; border: 3px solid black;'>";
		echo"<tr>";
			echo"<th>Nama</th>";
			echo"<th>Nilai 1</th>";
			echo"<th>Nilai 2</th>";
			echo"<th>Nilai 3</th>";
			echo"<th>Rata2</th>";
		echo"</tr>";
		foreach ($array_mhs as $mhs => $nilai) {
			echo"<tr>";
				echo"<td>" . $mhs . "</td>";
				echo"<td>" . $nilai[0] . "</td>";
				echo"<td>" . $nilai[1] . "</td>";
				echo"<td>" . $nilai[2] . "</td>";
				echo"<td>" . hitung_rata($nilai) . "</td>";
			echo"</tr>";
		}
	?>
</body>
</html>