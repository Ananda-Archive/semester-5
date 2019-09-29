<?php
// connect database
require_once('../db_login.php');
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){  
	die ("Could not connect to the database: <br />". $db>connect_error); 
} 

if (isset($_POST["submit"])){  
		$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);   
		$address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);   
  		$city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
  		$error_name = NULL;
  		if ($name == ''){   
  			$error_name = "Name is required";   
  		}elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) 
  		{        
  			$error_name = "Only letters and white space allowed";     
  		}
  		$error_address = NULL;
  		if ($address == ''){   
  			$error_address = "Address is required";   
  		}
  		$error_city = NULL;

  		if ($city == '' || $city == 'none'){   
  			$error_city = "City is required";   
  		}
	  	if($error_name || $error_address || $error_city){
     		/*echo $error_name;
     		echo $error_address;
     		echo $error_city;*/
  		} else{	      
		  	$query = " INSERT INTO customers (customerid,name,address,city) VALUES (NULL,'$name','$address','$city')";   // Execute the query   
		  	$result = $db->query( $query );   
		  	if (!$result){      
		  		die ("Could not query the database: <br />". $db->error);   
		  	}else{      
		  		echo '1 recoord added';
		  	}  
	  	}
	} 
	 	    

	?> 
	<!DOCTYPE HTML>  
	<html> 
	<head> 
		<style> 
		.error {color: #FF0000;} 
	</style> 
</head> 
<body>  
	<h2>User Input</h2> 
	<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"> 
		<table>  
			<tr>   
				<td valign="top">Name</td>   
				<td valign="top">:</td>   
				<td valign="top">
					<input type="text" name="name" size="30" maxlength="50" placeholder="Name (max 50 characters)" autofocus>
				</td>
				<td valign="top">
					<span class="error">* <?php echo (isset($error_name)) ? $error_name : '';?></span>
				</td>  
			</tr>  
			<tr>   
				<td valign="top">Address</td>   
				<td valign="top">:</td>   
				<td valign="top">
					<textarea name="address" rows="5" cols="30" placeholder="Address (max 100 characters)"></textarea>
				</td>   
				<td valign="top">
					<span class="error">* <?php echo (isset($error_address)) ? $error_address : '';?></span>
				</td>  
			</tr>  
			<tr>   
				<td valign="top">City</td>   
				<td valign="top">:</td>   
				<td valign="top">
					<select name="city" required>    
						<option value="none" <?php if (!isset($city)) echo 'selected="true"';?>>--Select a city--</option>    
						<option value="Airport West" <?php if (isset($city) && $city=="Airport West") echo 'selected="true"';?>>Airport West</option>    
						<option value="Box Hill" <?php if (isset($city) && $city=="Box Hill") echo 'selected="true"'; ?>>Box Hill</option>    
						<option value="Yarraville" <?php if (isset($city) && $city=="Yarraville") echo 'selected="true"'; ?>>Yarraville</option>    
					</select>   
				</td>   
				<td valign="top">
					<span class="error">* <?php echo (isset($error_city)) ? $error_city : '';?></span>
				</td>  
			</tr>
			<tr>   
				<td valign="top" colspan="3"><br>
				<input type="submit" name="submit" value="Submit" href="../view_customer.php">  
			</tr>
			</table> 
		</form>
		<a href="view_customer.php">Back</a>
	</body> 
	</html> 
	<?php $db->close(); ?>