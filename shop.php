<?php
if (isset($_GET['param1'])) {
 define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "android_api");
 
 $name=$_GET['param1'];
 
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $stmt = $conn->prepare("SELECT shop.longitude,shop.latitude FROM shop WHERE name=$name;");
 
 $stmt->execute();
 
 $stmt->bind_result($longitude, $latitude);
 
 $location = array(); 
 
 while($stmt->fetch()){
 $temp = array(); 
 $temp['longitude']=$longitude;
 $temp['latitude']=$latitude; 

 array_push($location, $temp);
 }
 
 echo json_encode($location);
}else{
	echo "Shop_Name is Required";
}







?>