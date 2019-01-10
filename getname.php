<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

	//echo $TXTid = $_POST['id'];
	$TXTid = $_GET['id'];
	$select_content1=("select * from customers WHERE cid='$TXTid'") or die(mysqli_error($db));
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	$num_chk1 = mysqli_num_rows ($content_result1);
	echo $content1["name"];
?>