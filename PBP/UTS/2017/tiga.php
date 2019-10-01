<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		td{
			border: 1px solid black;
			padding: 10px;
		}
	</style>
</head>
<body>
	<table>
	<?php
		require_once("login.php");
		$con = mysqli_connect($db_host,$db_username,$db_password,$db_database);
		if(mysqli_connect_errno()){
			die("Co: ").mysql_connect_error();
		}

		$query = "SELECT * FROM books";
		$result = mysqli_query($con,$query);
		if(!$result){
			die("Co: ").mysqli_error($con);
		}
		$sum = 0;
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['isbn']."</td>";
			echo "<td>".$row['author']."</td>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['price']."</td>"; $sum = $sum + $row['price'];
			echo "</tr>";
		}
	?>
	</table>
	<?php echo "Total: ".$sum; ?><br>
	<?php echo "Total Data: ".mysqli_num_rows($result);  ?>

</body>
</html>