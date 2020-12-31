 <?php
 
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "android_api");

 $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
 
  if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 $stmt = $conn->prepare("SELECT product_id, name, description, image_url FROM product;");
 
 $stmt->execute();
 
 $stmt->bind_result($product_id, $name, $description, $image_url);
 
 $products = array(); 
 
 while($stmt->fetch()){
 $temp = array();
 $temp['product_id'] = $product_id; 
 $temp['name'] = $name; 
 $temp['description'] = $description; 
 $temp['image_url'] = $image_url; 
 array_push($products, $temp);
 }
 echo json_encode($products);
?>




