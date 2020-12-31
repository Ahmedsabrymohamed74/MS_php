<?php
if (isset($_GET['param1'])) {
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'android_api');
 $email=$_GET['param1'];
 
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $result=mysqli_query($conn,"SELECT id FROM `users` WHERE email=$email");
 $id=mysqli_fetch_assoc($result);
 $user_id=$id['id'];
 
 $stmt=$conn->prepare("SELECT product_shop.id,product_shop.price, shop.name, product.name, product_shop.specialOffers, product.image_url FROM favourite INNER JOIN product_shop ON favourite.product_shop_id=product_shop.id INNER JOIN shop ON favourite.shop_id=shop.shop_id INNER JOIN product ON favourite.product_id=product.product_id WHERE user_id=$user_id");
 
 $stmt->execute();
 
 $stmt->bind_result($id,$price,$shop_name,$product_name,$specialOffers,$image_url);
 
 $favourites = array(); 
 
 while($stmt->fetch()){
 $temp = array(); 
 $temp['id']=$id;
 $temp['price'] = $price; 
 $temp['shop_name'] = $shop_name; 
 $temp['product_name'] = $product_name;
 $temp['specialOffers'] = $specialOffers;
 $temp['image_url'] = $image_url;

 array_push($favourites, $temp);
 }
 
 echo json_encode($favourites);
}else{
	echo "User_ID is Required";
}

?>