<!DOCTYPE HTML>
<html>
<head>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<?php
	$error_name = "";
	$address = '';

	function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }
	if (isset($_POST["submit"])){
		$name = test_input($_POST['name']);
		if ($name == ''){
		$error_name = "Name is required";
		$valid_name = FALSE;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$error_name = "Only letters and white space allowed";
			$valid_name = FALSE;
		}else{
			$valid_name = TRUE;
		}
		if($address == ''){
			$error_address = 'Address is required';
			$valid_address = FALSE;

		} else{
			$valid_address = TRUE;

		}
		if($_POST['city'] == "" ){
			$error_city = 'City is required'; 
			$valid_city = FALSE;

		}else {
			$city = test_input($_POST['city']);
			$valid_city = TRUE;

		}
		//insert data into database
		if ($valid_name && $valid_address && $valid_city){
			// Include our login information
			require_once('db_login.php');
			// Connect
			$db = new mysqli($db_host, $db_username, $db_password,$db_database);
			if ($db->connect_errno){
				die ("Could not connect to the database: <br />". $db->connect_error);
			}
			//Asign a query
			$query = " INSERT INTO customers (name, address, city) VALUES('$name', '$address', '$city') ";
			// Execute the query
			$result = $db->query( $query );
			if (!$result){
				die ("Could not query the database: <br />". $db->error);
			}else{
				echo '1 record added. <br />';
			}
		}
	}
//close db connection}
?>
	<h2>User Input</h2>
	<form method="POST" autocomplete="on" action="<?php echo
	htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td valign="top">Name</td>
				<td valign="top">:</td>
				<td valign="top"><input type="text" name="name" size="30" maxlength="50" placeholder="Name (max 50 characters)"></td>
				<td valign="top"><span class="error">* <?php echo $error_name;?></span></td>
			</tr>
			<tr>
				<td valign="top">Address</td>
				<td valign="top">:</td>
				<td valign="top"><textarea name="address" rows="5" cols="30" placeholder="Address (max 100 characters)"></textarea></td>
			</tr>
			
			<tr>
				<td valign="top">City</td>
				<td valign="top">:</td>
				<td valign="top">
					<select name="city">
						<option value="none">--Select a city--</option>
						<option value="Airport West">Airport West</option>
						<option value="Box Hill">Box Hill</option>
						<option value="Yarraville">Yarraville</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="3"><br><input type="submit" name="submit" value="Submit">&nbsp;
				<input type="reset" name="reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	<?php
		//membaca isi form
		if (isset($_POST["submit"])){
			echo "<h2>Your Input:</h2>";
			echo 'Name = '.$_POST['name'].'<br />';
			echo 'Address = '.$_POST['address'].'<br />';
			echo 'City = '.$_POST['city'].'<br />';
			
		}
	?>
</body>
</html>