<!-- File: view_books.php
Deskripsi : menampilkan data buku menggunakan mysqli dengan
pendekatan prosedural
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html401/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Displaying in an HTML table</title>
	</head>
	<body>
		<?php
			// Include our login information
			require_once('db_login.php');
			// Connect
			$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />".
				mysqli_connect_error( ));
			}
			//Asign a query
			$query = " SELECT * FROM books ";
			// Execute the query
			$result = mysqli_query($con,$query);
			if (!$result){
				die ("Could not query the database: <br />". mysqli_error($con));
			}
			// Fetch and display the results
			while ($row = mysqli_fetch_row($result)){
				echo 'ISBN: '.$row[0].'<br/>';
				echo 'Author: '.$row[1].'<br/>';
				echo 'Title: '.$row[2].'<br/>';
				echo 'Price: '.$row[3].'<br/><br/>';
			}
			echo '<br />';
			echo 'Total Rows = '.mysqli_num_rows($result).'<br />';
			mysqli_close($con);
		?>
	</body>
</html>