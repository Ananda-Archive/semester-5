<html>
<head>
<title>Conditional</title>
</head>
<body>
<?php
	$lulus = TRUE;
	if ($lulus){
		echo 'Selamat Anda Lulus. <br/>';
	} 
	else{
		echo 'Maaf, Anda gagal. Silakan mencoba lagi. <br />';
	}

	$nilai = 60;
	if ($nilai >= 80 && $nilai <= 100){
		echo 'Nilai : A <br />';
	} else if ($nilai >= 60 && $nilai < 80){
		echo 'Nilai : B <br />';
	}else if ($nilai >= 40 && $nilai < 60){
		echo 'Nilai : C <br />';
	}else if ($nilai >= 20 && $nilai < 40){
		echo 'Nilai : D <br />';
	}else if ($nilai >= 0 && $nilai < 20){
		echo 'Nilai : E <br />';
	}else {
		echo 'Invalid nilai <br />';
	}
?>
</body>
</html>