 <?php
 
 include "..\php\connect.php";
// echo "Connection Success!";
$query = "SELECT * FROM shop_product";
$result = mysql_query($query);

//Disp vals
while($value = mysql_fetch_array($result)){
	echo $value['Shop Name'], " ";
	echo $value['Product Name'], " ";
	echo $value['Price'], " ";
	echo $value['special offers'], " ", "<br>";
	

 
 ?>