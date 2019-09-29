<?php
	// Include our login information
	require_once('db_login.php');
	// Connect
	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);

	if(mysqli_connect_errno()){
		die('Tidak bisa terhubung dengan database.<br>'.mysqli_connect_error());
	}


	$query1 = "SELECT DISTINCT customerid, name, address, email, date FROM (SELECT customers.customerid, customers.name, customers.address, customers.email, orders.date FROM orders INNER JOIN customers ON orders.customerid = customers.customerid) AS C";
	$result1 = $con->query($query1);
	
	$quantity = 0;
	$price = 0;
	while($row1 =mysqli_fetch_assoc($result1)){
		$query2 = "SELECT order_items.orderid, books.isbn, books.title, books.price, order_items.quantity FROM order_items INNER JOIN orders ON orders.orderid = order_items.orderid INNER JOIN customers ON customers.customerid = orders.customerid INNER JOIN books ON order_items.isbn = books.isbn WHERE customers.customerid=".$row1['customerid']."";
		$result2 = $con->query($query2);
		echo '<table>';
		echo '<tr>';
		echo '<td>Date</td>';
		echo '<td>:</td>';
		echo '<td>'.$row1['date'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Name</td>';
		echo '<td>:</td>';
		echo '<td>'.$row1['name'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Address</td>';
		echo '<td>:</td>';
		echo '<td>'.$row1['address'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Email</td>';
		echo '<td>:</td>';
		echo '<td>'.$row1['email'].'</td>';
		echo '</tr>';
		echo '</table>';
		echo '<table border=1>';
		echo '<tr>';
		echo '<th>OrderID</th>';
		echo '<th>ISBN</th>';
		echo '<th>Title</th>';
		echo '<th>Qty</th>';
		echo '<th>Price</th>';
		echo '<th>Price X Qty';
		echo '</tr>';
		while($row2 = mysqli_fetch_assoc($result2)){
			echo '<tr>';
			echo '<td>'.$row2['orderid'].'</td>';
			echo '<td>'.$row2['isbn'].'</td>';
			echo '<td>'.$row2['title'].'</td>';
			echo '<td>'.$row2['price'].'</td>';
			echo '<td>'.$row2['quantity'].'</td>';
			echo '<td>'.$row2['price'] * $row2['quantity'].'</td>';
			echo '</tr>';
			$quantity = $quantity + $row2['quantity'];
			$price = $price + ($row2['price'] * $row2['quantity']);
		}
		echo '<td colspan="4">Total</td>';
		echo '<td>'.$quantity.'</td>';
		echo '<td>'.$price.'</td>';
		echo '</table>';
		echo '<br>';
		$quantity = 0;
		$price = 0;
	}
	mysqli_close($con); 

?>