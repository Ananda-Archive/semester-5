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
				$query = " SELECT * FROM book_reviews RIGHT JOIN books ON book_reviews.isbn = books.isbn ";
				// Execute the query
				$result = mysqli_query($con,$query);
				if (!$result){
					die ("Could not query the database: <br />". mysqli_error($con));
				}
				// Fetch and display the results
				while ($row = mysqli_fetch_assoc($result)){
					echo 'ISBN: '.$row['isbn']."<br>";
					echo 'Author: '.$row['author']."<br>";
					echo 'Title: '.$row['title']."<br>";
					echo 'Price: '.$row['price']."<br>";
					if(isset($row['review'])){
						echo 'Review: '.$row['review']."<br>";
					}else{
						echo "Review: No review"."<br>";
					}
					echo "<br>";
				}
				echo '<br />';
				echo 'Total Rows = '.mysqli_num_rows($result).'<br />';
				mysqli_close($con);
			?>
	</body>
</html>