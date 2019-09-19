<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		//Asign variable
		$a = 15;
		echo"variable a bernilai ". $a ."<br>";
		$a = "Variabel telah diganti";
		echo"variable a setelah diganti bernilai ". $a ."<br>";
		//local variable
		echo "<br>================== VARIABEL LOKAL ==================<br>";
		function diskon(){
			$harga = 1000;
			$harga = 0.2 * $harga;
			echo"variable harga di dalam fungsi bernilai = " . $harga . "<br>";
		}
		$harga = 2000;
		diskon();
		echo"variable harga di di luar fungsi bernilai = " . $harga . "<br>";
		//global variable
		echo "<br>================== VARIABEL GLOBAL ==================<br>";
		function diskon1(){
			global $harga1;
			$harga1 = 0.3 * $harga1;
		}
		$harga1 = 300000;
		echo"Variable harga1 sebelum digunakan fungsi diskon1() adalah = " . $harga1 . "<br>";
		diskon1();
		echo"Variable harga1 sesudah digunakan fungsi diskon1() adalah = " . $harga1 . "<br>";
		//Static variable
		echo "<br>================== VARIABEL STATIK ==================<br>";
		function diskon2(){
			static $harga2 = 1000;
			$harga2 = 0.8 * $harga2;
			echo"Variable harga2 di dalam fungsi diskon2() = " . $harga2 . "<br>";
		}
		$harga2 = 300;
		echo"variable harga2 sebelum digunakan fungsi diskon2() adalah = " . $harga2 . "<br>";
		diskon2();
		diskon2();
		echo"variable harga2 setelah digunakan fungsi diskon2() adalah = " .$harga2 . "<br>";
		echo "<br>================== VARIABEL SUPER GLOBAL ==================<br>";
		echo htmlentities($_SERVER["PHP_SELF"]);
		echo "<br>";
		define("PWI", "Pemrograman Web dan Internet");
		echo"Hari ini " . PWI . "<br>";
		$constant_name = "PWI";
		echo"Hari ini sedang praktikum " . $constant_name . "<br>";
		echo"FIle yang sedang di proses " . __FILE__ . " pada baris " . __LINE__  . "<br>" ;
	?>
</body>
</html>