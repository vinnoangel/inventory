<?php
		// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		session_start();
		
		require_once ('connection.php');
		$xID = $_SESSION["ustcode"];
		$xdate = date("Y-m-d");
		mysqli_query($db, "UPDATE systemusers SET login='0', login_date='$xdate' WHERE id = '$xID'");
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();
		
		echo "
			<script language='javascript'>
				location.href='index?logout=1'
			</script>
		";
?>