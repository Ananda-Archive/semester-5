<!-- File : form_customer.php
Deskripsi : Form untuk menerima input data customer -->
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>
		<?php
			$error_name = '';
			$error_address = '';
			$genderErr = '';
			$error_email = '';
			$gender = '';
			$hobby = array();
			if (isset($_POST["submit"])){
				$name = test_input($_POST['name']);
				$address = test_input($_POST['address']);
				$email = test_input($_POST['email']);
				if ($name == ''){
					$error_name = "Name is required";
				}elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$error_name = "Only letters and white space allowed";
				}
				if ($address == ''){
					$error_address = "Address is required";
				}else{
					$address = test_input($_POST['address']);
				}
				if (empty($_POST["gender"])) {
			    	$genderErr = "Gender is required";
				}else {
				    $gender = $_POST["gender"];
				}
				if($email == ''){
					$error_email = "Email is required";
				}else {
					$email = test_input($_POST["email"]);
				}
				if (!empty($_POST['hobby'])){
					foreach ($_POST['hobby'] as $hobby_item) {
						array_push($hobby, $hobby_item);
					}
				}
			}
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
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
					<td valign="top"><span class="error">* <?php echo $error_address; ?> </span></td>
				</tr>
				<tr>
					<td valign="top">Gender</td>
					<td valign="top">:</td>
					<td valign="top">
					<input type="radio" name="gender" value="male">Male <br />
					<input type="radio" name="gender" value="female">Female</td>
					<td valign="top"><span class="error">* <?php echo $genderErr; ?> </span></td>
				</tr>
				<tr>
					<td valign="top">Email</td>
					<td valign="top">:</td>
					<td valign="top"><input type="text" name="email" size="30"></td>
					<td valign="top"><span class="error">* <?php echo $error_email;?></span></td>
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
					<td valign="top">Hobby</td>
					<td valign="top">:</td>
					<td valign="top">
					<input type="checkbox" name="hobby[]" value="travelling">Travelling<br />
					<input type="checkbox" name="hobby[]" value="reading">Reading<br />
					<input type="checkbox" name="hobby[]" value="swimming">Swimming<br />
					<input type="checkbox" name="hobby[]" value="painting">Painting<br /></td>
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
					echo 'Gender = '.$gender.'<br />';
					echo 'Email = '.$_POST['email'].'<br />';
					echo 'City = '.$_POST['city'].'<br />';
					if(!empty($_POST['hobby'])){
						echo "the hobbies selected are: ";
						foreach ($hobby as $hobby_item) {
							echo "<br>".$hobby_item;
						}
					}else{
						echo "You don't selected any hobby";
					}
				}
			?>
	</body>
</html>