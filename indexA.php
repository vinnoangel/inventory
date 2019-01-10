<?php
require_once("includes/session.php"); 
require_once ('connection.php');
?>

<?php
$ucode_=$_POST['user'];
$passkey_=trim($_POST['password']);
$login_=$_POST['Submitc'];
$pcode_ = md5($passkey_);
$serverID_= isset($_POST['server']) ? $_POST['server'] : '';

// Check if have logged in before
if (logged_in()) {
		echo "
			<script language='javascript'>
				location.href='dashboard.php'
			</script>
		";
}


$select_user=("select * from systemusers where username = '$ucode_' and password = '$pcode_'");
$user_result= mysqli_query($db, $select_user) or die (mysqli_error($db));
$user = mysqli_fetch_assoc($user_result);
$user_rows= mysqli_num_rows($user_result);
$status = $user ['status'];
$login_status = $user ['login'];

if ($status == 1)
{
	echo "
		<script language='javascript'>
			location.href='index.php?chk=10'
		</script>
	";
}
else
{
	
	$_SESSION["ustcode"] = $user ['id'];
	$_SESSION["cat"] = $user ['cat'];
	$_SESSION["username"] = $user ['username'];
	$_SESSION["fullname"] = $user ['surname'].' '.$user ['fname'];
	
	$select_content1=("select * from company");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	$num_chk1 = mysqli_num_rows ($content_result1);
	$_SESSION["regnof"] = $content1['regnof'];
	
	if ($login_== "Log in")
	{
		if (($user_rows == 1) && ($pcode_ !="") && ($ucode_ !="") )
			{
	//		$mess= "<b>You are Logged in  as $name<b>";
	
			// Track Version 
			$select_content2=("select * from counter");
			$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
			$content2 = mysqli_fetch_assoc($content_result2);
			$num_chk2 = mysqli_num_rows ($content_result2);
			if($content2["counter"] > 500){
				echo "
				<script language='javascript'>
					location.href='index.php?chk=5'
				</script>
				";
			}
			else{
				$c = $content2["counter"] + 1;
				mysqli_query($db, "UPDATE counter SET counter= '$c'") or die(mysqli_error($db));

				$select_content=("select * from sms_account");
				$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
				$content = mysqli_fetch_assoc($content_result);

				$_SESSION['account_username'] = $content['username'];
				$_SESSION['account_password'] = $content['password'];

				echo "
					<script language='javascript'>
						location.href='dashboard.php'
					</script>
				";
			}
			
			if ($login_status == 0){	
				$xID = $_SESSION["ustcode"];		
				$xdate = date("Y-m-d");
				mysqli_query($db, "UPDATE systemusers SET login='1', login_date='$xdate' WHERE id = '$xID'");
				
				echo "
					<script language='javascript'>
						location.href='dashboard.php'
					</script>
				";
			}
			else{
				echo "
				<script language='javascript'>
					location.href='index.php?chk=11'
				</script>
				";
			}
			
			
			}
		else 
			{
			echo "
							<script language='javascript'>
								location.href='index.php?chk=20'
							</script>
						";
			
			}
	}
}
?>