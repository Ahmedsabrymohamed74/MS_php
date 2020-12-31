<?php
 if (isset($_GET['param1'], $_GET['param2'])) {
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'android_api');
	
	$email=$_GET['param1'];
	$product_shop_id=$_GET['param2'];
		
	
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}
	
	$result=mysqli_query($conn,"SELECT id FROM `users` WHERE email=$email");
	$id=mysqli_fetch_assoc($result);
	$user_id=$id['id'];
	
	$stmt=$conn->prepare("DELETE FROM `favourite` WHERE favourite.user_id=$user_id AND favourite.product_shop_id=$product_shop_id");
	 
	$stmt->execute();
	 
	
 }else{
	echo "User_ID is Required and product_shop_id";
 }






?>