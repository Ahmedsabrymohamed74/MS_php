<?php
include "DB_Functions.php";
$db = new DB_Functions();
if (isset($_POST['email'])) {
	if ($db->DB_Connect()) {
		echo $db->fetchName("users",$_POST['email']);
	} else echo "Error: Database connection";
}
?>