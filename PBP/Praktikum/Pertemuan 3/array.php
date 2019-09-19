<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		for($i=0; $i<10; $i++){
			$diskon[] = $i * 5;
		}
		if(is_array($diskon)){
			echo"variabel diskon merupakan array<br>";
		}else{
			echo"not array<br>";
		}
		for($i=0; $i<sizeof($diskon); $i++){
			echo"Diskon hari ke - " . ($i+1) . " adalah = " . $diskon[$i] . "<br>";
		}
		echo"==============Assoc Array==============<br>";
		$bulan = array(
			'jan' => 'januari',
			'feb' => 'februari',
			'mar' => 'march',
			'apr' => 'april',
			'may' => 'may',
			'jun' => 'june',
			'jul' => 'july',
			'aug' => 'august',
			'sep' => 'september',
			'oct' => 'october',
			'nov' => 'november',
			'dec' => 'december'
		);

		foreach($bulan as $kode_bulan => $nama_bulan){
			echo"kode bulan untuk " . $kode_bulan . " adalah " . $nama_bulan . "<br>";
		}
	?>
</body>
</html>