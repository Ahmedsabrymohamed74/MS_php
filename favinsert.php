<?php

 if (isset($_GET['param1'], $_GET['param2'], $_GET['param3'])) {
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'android_api');
	
	$email=$_GET['param1'];
	$shop_id=$_GET['param2'];
	$product_id=$_GET['param3'];
	
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}
	$result=mysqli_query($conn,"SELECT id FROM `product_shop` WHERE product_id=$product_id AND shop_id=$shop_id");
	$id=mysqli_fetch_assoc($result);
	$product_shop_id=$id['id'];
	$conn -> close();
	
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}
	
	$result=mysqli_query($conn,"SELECT id FROM `users` WHERE email=$email");
	$id=mysqli_fetch_assoc($result);
	$user_id=$id['id'];
	
	$stmt=$conn->prepare("INSERT INTO `favourite`(`user_id`, `product_shop_id`, `shop_id`, `product_id`) VALUES ($user_id, $product_shop_id, $shop_id, $product_id)");
	$stmt->execute();
	
	

 }else{
	echo "All fields are Required"; 
 }

?>