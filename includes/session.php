<?php
	session_start();	
	require_once('connection.php'); 
	
	function logged_in() {
		return isset($_SESSION["ustcode"]);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			echo "
				<script language='javascript'>
					location.href='index'
				</script>
			";
		}
	}
	
	function logs($operation,$table,$description,$user,$xdate){
		mysqli_query($db, "insert into logs set operation='$operation', description='$description', otable='$table', user='$user', xdate='$xdate' ") 
		or die("Unable to insert into Logs Table ".mysqli_error($db));
		return logs;
	}
	
	//echo formatMoney(1050 , true). "<br>"; # 1,050 
	function formatMoney($number, $fractional=false) { 
		if ($fractional) { 
			$number = sprintf('%.2f', $number); 
		} 
		while (true) { 
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
			if ($replaced != $number) { 
				$number = $replaced; 
			} else { 
				break; 
			} 
		} 
		return $number; 
	} 
	
	//////////////// SMS Format
	function smsContent($smsContent, $name = null){
		$msg = str_replace('{$name}', $name, $smsContent);
		return $msg;
	}
?>
