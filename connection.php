<?php
$db = mysqli_connect("localhost", "root", "", "inventory");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

date_default_timezone_set('Africa/Lagos'); 
?>



