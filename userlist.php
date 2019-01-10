<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<script language="javascript" src="js/tree.js"></script>
<?php
$xID = $_SESSION["ustcode"];
?>
<?php
	$userID = $_SESSION["ustcode"];
	$select_content1=("select * from systemusers WHERE id='$userID'");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	$num_chk1 = mysqli_num_rows ($content_result1);
	$vv = $content1['users'];
	if ($vv  == 1)
	{
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
?>

<?php
	if ($pg == 8)
		{
			$TXTid = $_GET['id'];
			$email = $_GET['m'];
			
			 $var1 = mt_rand(1,10);
			  $var2 = mt_rand(1,10);
			  $var3 = mt_rand(1,10);
			  $var4 = mt_rand(1,10);
			  
			  $rand = $var1."".$var2."".$var3."".$var4;
			  $pass = $var3."".$rand;
			  $encPass = md5($pass);
			mysqli_query($db, "UPDATE systemusers SET `password` = '$encPass' WHERE id = '$TXTid'");
			$sql= "<b>Operation was Successful: Password Reset to ".$pass;
			
			//change this to your email.
    $to = "$email";
    $from = "admin@stgregoryscollege.com";
    $subject = "Password Reset was successful";
	$mailimg = '
		<img src="http://www.example.com/images/sample.jpg"</a>
		';
    //begin of HTML message
    $message = <<<EOF
					
					<html>
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					<title>Govt</title>
					</head>
					<body bgcolor="#e5e5e5">
					<table width="945" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
						  	<td valign="top">
								Hi,<br><br>
								
								Your Password has just been reset and a new password has been given to you<br><br>
								
								Here is your new Password: <u><b>$pass</b></u>.<br><br>
								
								Please login into the portal to change this default password to a New Password<br><br>
								
								Regards,
								
								Administrator.
								
								
							</td>
						  </tr>
						
						</table>

					</body>
					</html>

EOF;
   //end of message
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($to, $subject, $message, $headers);
	echo "
			<script language='javascript'>
				location.href='userlist.php?sql=$sql'
			</script>
		";			
		}
?>


<?php
	if ($pg == 7)
	
		{
			$TXTid = $_GET['id'];
			$Txtstatus = $_GET['v'];
			mysqli_query($db, "UPDATE systemusers SET `status`= '$Txtstatus' WHERE id = '$TXTid'");
			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='userlist.php?sql=$sql'
				</script>
			";
		}
?>

<?php

	if ($pg == 2)
		{	
		
			$txt1 = $_POST['txt1'];
				if ($txt1 == "on")
					{
						$txt1 = 1;	
					}
				else
					{
						$txt1 = 0;
					}

			$txt2 = $_POST['txt2'];
			
				if ($txt2 == "on")
					{
						$txt2 = 1;	
					}
				else
					{
						$txt2 = 0;
					}
			$txt3 = $_POST['txt3'];
			
					if ($txt3 == "on")
					{
						$txt3 = 1;	
					}
				else
					{
						$txt3 = 0;
					}
			$txt4 = $_POST['txt4'];
			
				if ($txt4 == "on")
					{
						$txt4 = 1;	
					}
				else
					{
						$txt4 = 0;
					}
					
			$txt5 = $_POST['txt5'];
				
					if ($txt5 == "on")
					{
						$txt5 = 1;	
					}
				else
					{
						$txt5 = 0;
					}
					
			$txt6 = $_POST['txt6'];
			
					if ($txt6 == "on")
					{
						$txt6 = 1;	
					}
				else
					{
						$txt6 = 0;
					}
					
			$txt7 = $_POST['txt7'];
			
					if ($txt7 == "on")
					{
						$txt7 = 1;	
					}
				else
					{
						$txt7 = 0;
					}
				
			$txt8 = $_POST['txt8'];
			
				
					if ($txt8 == "on")
					{
						$txt8 = 1;	
					}
				else
					{
						$txt8 = 0;
					}
					
			$txt9 = $_POST['txt9'];
				
					if ($txt9 == "on")
					{
						$txt9 = 1;	
					}
				else
					{
						$txt9 = 0;
					}
			$txt10 = $_POST['txt10'];
					
					if ($txt10 == "on")
					{
						$txt10 = 1;	
					}
				else
					{
						$txt10 = 0;
					}
					
				
			$txt11 = $_POST['txt11'];
					
					if ($txt11 == "on")
					{
						$txt11 = 1;	
					}
				else
					{
						$txt11 = 0;
					}
					
			$txt12 = $_POST['txt12'];
			
					if ($txt12 == "on")
					{
						$txt12 = 1;	
					}
				else
					{
						$txt12 = 0;
					}
					
			$txt13 = $_POST['txt13'];
			
					if ($txt13 == "on")
					{
						$txt13 = 1;	
					}
				else
					{
						$txt13 = 0;
					}						
					
		
			$txtsname =$_POST['sname'];
			$txtoname =$_POST['oname'];
			$txtusername =$_POST['username'];
			$txtpassword = md5($_POST['password']);
			$txtemail = $_POST['email'];
			$xdate = date("Y/m/d");
			$image = $_FILES['image']['name'];
			
			$sql= "insert into systemusers(userName, password, email, xdate, surname, fname, expenses, users, set_items, re_order_level, stock_entry, sale_item, report, customers, backup, company, invoice, sms, shelf) values('$txtusername', '$txtpassword', '$txtemail', '$xdate', '$txtsname', '$txtoname', '$txt1', '$txt2', '$txt3', '$txt4', '$txt5', '$txt6', '$txt7', '$txt8', '$txt9', '$txt10', '$txt11', '$txt12', '$txt13')";
			$result=mysqli_query($db, $sql) or die(mysqli_error($db));
			$sql = "Operation was Successful";
			echo "
				<script language='javascript'>
					location.href='userlist.php?sql=$sql'
				</script>
				";
			}
?>



<?php

	if ($pg == 5)
		{	
			$id = $_POST['id'];
			$txt1 = $_POST['txt1'];
				if ($txt1 == "on")
					{
						$txt1 = 1;	
					}
				else
					{
						$txt1 = 0;
					}

			$txt2 = $_POST['txt2'];
			
				if ($txt2 == "on")
					{
						$txt2 = 1;	
					}
				else
					{
						$txt2 = 0;
					}
			$txt3 = $_POST['txt3'];
			
					if ($txt3 == "on")
					{
						$txt3 = 1;	
					}
				else
					{
						$txt3 = 0;
					}
			$txt4 = $_POST['txt4'];
			
				if ($txt4 == "on")
					{
						$txt4 = 1;	
					}
				else
					{
						$txt4 = 0;
					}
					
			$txt5 = $_POST['txt5'];
				
					if ($txt5 == "on")
					{
						$txt5 = 1;	
					}
				else
					{
						$txt5 = 0;
					}
					
			$txt6 = $_POST['txt6'];
			
					if ($txt6 == "on")
					{
						$txt6 = 1;	
					}
				else
					{
						$txt6 = 0;
					}
					
			$txt7 = $_POST['txt7'];
			
					if ($txt7 == "on")
					{
						$txt7 = 1;	
					}
				else
					{
						$txt7 = 0;
					}
				
			$txt8 = $_POST['txt8'];
			
				
					if ($txt8 == "on")
					{
						$txt8 = 1;	
					}
				else
					{
						$txt8 = 0;
					}
					
			$txt9 = $_POST['txt9'];
				
					if ($txt9 == "on")
					{
						$txt9 = 1;	
					}
				else
					{
						$txt9 = 0;
					}
			$txt10 = $_POST['txt10'];
					
					if ($txt10 == "on")
					{
						$txt10 = 1;	
					}
				else
					{
						$txt10 = 0;
					}
				
					
			$txt11 = $_POST['txt11'];
					
					if ($txt11 == "on")
					{
						$txt11 = 1;	
					}
				else
					{
						$txt11 = 0;
					}
					
			$txt12 = $_POST['txt12'];
			
					if ($txt12 == "on")
					{
						$txt12 = 1;	
					}
				else
					{
						$txt12 = 0;
					}
					
			$txt13 = $_POST['txt13'];
			
					if ($txt13 == "on")
					{
						$txt13 = 1;	
					}
				else
					{
						$txt13 = 0;
					}					
					
					
				mysqli_query($db, "UPDATE systemusers Set  expenses='$txt1', users='$txt2', set_items='$txt3', re_order_level='$txt4', stock_entry='$txt5', sale_item='$txt6', report='$txt7', customers='$txt8', backup='$txt9', company='$txt10', invoice='$txt11', sms='$txt12', shelf='$txt13' WHERE id = '$id'") or die(mysqli_error($db).'  Error');

					$sql= "<b>Operation was Successful: Changes made<b>";
					echo "
						<script language='javascript'>
						  location.href='userlist.php?sql=$sql'
						</script>
					";
				}
?>

<?php	
	include("header.php");
?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>User's Information</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                            	 <a href="dashboard" class="btn btn-sm btn-success"><i class="fa fa-home"></i>Dashboard</a>
                                 
                                 <a href="userlist?pg=1" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> New User</a>
                                 <a href="userlist" class="btn btn-sm btn-warning"><i class="fa fa-search"></i> View Users</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" >
                              <?php
				if ($pg == 1)
					{
			?> 			 <form action="userlist?pg=2" name="frmReg" method="post" enctype="multipart/form-data" onSubmit="return loginCheck(this);" ID="Form1">
						<table style="width:100%">
							 
							 <tr>
								<td ><b>Surname</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="sname" class="form-control" style="width:200px;"/>
								</td>
								<td ><b>Othernames</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="oname" class="form-control" style="width:200px;"/>
								</td>
							</tr>
							
							<tr>
								<td ><b>UserName</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="username" class="form-control" style="width:200px;"/>
								</td>
								<td ><b>Password</b></td>
								<td  valign="top" colspan="3">
									<input type="password" name="password" class="form-control" style="width:200px;"/>
								</td>
							</tr>
							<tr>
								<td ><b>Email Address</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="email" class="form-control" style="width:200px;"/>
								</td>
								
							</tr>
                            
                            <tr>
					<td height="5" colspan="6" style="padding-top:10px;">&nbsp;</td>
				</tr>
                
                <tr>
					<td colspan="6">
                    	<font face="verdana" style="font-size: 12px;">
                        <b> Assign User Roles / Access</b>
                     </td>
				</tr>
                
                <tr>
					<td height="5" colspan="6" style="border-top:1px solid #F00"></td>
				</tr>
                <tr>
					<td colspan="6">
							<table border="0" style="width:100%">
								<tr>
									<td valign="middle">
                                    	<input type="checkbox" name="txt1" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff"> Expenses
                                     </td>
									<td valign="middle">
                                    	<input type="checkbox" name="txt2" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff"> Manage System Users
                                     </td>
									<td valign="middle">
                                    	<input type="checkbox" name="txt3" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff"> Setup Items
                                    </td>
                                    <td valign="middle">
                                    	<input type="checkbox" name="txt4" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff"> Re-order level
                                    </td>
								</tr>
								<tr>
									<td height="6" colspan="3"></td>
								</tr>
								<tr >
									<td colspan="4"><b>&nbsp;</b></td>
								</tr>
								<tr>
									<td valign="middle"><input type="checkbox"  name="txt5" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" ID="Checkbox4">
                                    	Stock Entry
                                    </td>
									<td valign="middle"><input type="checkbox" name="txt6" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" ID="Checkbox5">
                                    	Sale Items
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt7" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" ID="Checkbox5">
                                    	View Report
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt8" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" ID="Checkbox5">
                                    	Manage Customers
                                    </td>
								</tr>
								<tr >
									<td colspan="3"><b>&nbsp;</b></td>
								</tr>
								<tr>
									<td valign="middle"><input type="checkbox" name="txt9" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff">
                                    	Database Backup
                                    </td>
									<td valign="middle"><input type="checkbox" name="txt10" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff">
                                    	Company Information
                                    </td>
                                     <td valign="middle"><input type="checkbox" name="txt11" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff">
                                    	Invoice
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt12" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff">
                                    	SMS
                                    </td>
                                   
								</tr>

                              
                                <tr>
                                    <td height="5" colspan="6">&nbsp;</td>
                                </tr>
                                
								<tr>
									
                                    <td valign="middle" colspan="6"><input type="checkbox" name="txt13" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff">
                                    	Shelf
                                    </td>
                                   
								</tr>
                                                                
								<tr>
									<td align="right" colspan="3"><input type="button" value="Select All" name="btnsubmit" onClick="fnAll(this.form)" style="border:1px solid black">&nbsp;&nbsp;<input type="button" value="DeSelect All" name="btnsubmit" onClick="fnNotAll(this.form)" style="border:1px solid black">
                                    </td>
								</tr>
                               </table>
					</td>
				</tr>
                <tr>
                    <td height="5" colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="6">						
                            <input type="submit" value="Submit" class="btn btn-primary">
                    </td>
                </tr>
            </table>	
					</form>
			<?php	
					}
				
			?>
            
 <?php
	if ($pg == 3)
		{
			
			}
?>

           
            
            <div class="block">
			<?php
				if ($pg == 3)
					{
					$TXTid = $_GET['id'];
//exit;
			$select_content1=("select * from systemusers WHERE id='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			?> 			 <form action="userlist?pg=5" name="frmReg" method="post" enctype="multipart/form-data" onSubmit="return loginCheck(this);" ID="Form1">
						<table style="width:100%">
							 
							 <tr>
								<td ><b>Surname</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="sname" class="form-control" style="width:200px;" value="<?php echo $content1['surname']; ?>" disabled="disabled"/>
								</td>
								<td ><b>Othernames</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="oname" class="form-control" style="width:200px;"  value="<?php echo $content1['fname']; ?>" disabled="disabled"/>
								</td>
							</tr>
							
							<tr>
								<td ><b>UserName</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="username" class="form-control" style="width:200px;" value="<?php echo $content1['username']; ?>" disabled="disabled"/>
								</td>
								<td ><b>Password</b></td>
								<td  valign="top" colspan="3">
									<input type="password" name="password" class="form-control" style="width:200px;" value="<?php echo $content1['password']; ?>" disabled="disabled"/>
								</td>
							</tr>
							<tr>
								<td ><b>Email Address</b></td>
								<td  valign="top" colspan="3">
									<input type="text" name="email" class="form-control" style="width:200px;" value="<?php echo $content1['email']; ?>" disabled="disabled"/>
								</td>
								<td></td>
                                <td></td>
								</td>
							</tr>
                            
                            <tr>
					<td height="5" colspan="6" style="padding-top:10px;">&nbsp;</td>
				</tr>
                
                <tr>
					<td colspan="6">
                    	<font face="verdana" style="font-size: 12px;">
                            	<b> Edit User Roles / Access</b>
                         
                     </td>
				</tr>
                
                <tr>
					<td height="5" colspan="6" style="border-top:1px solid #F00"></td>
				</tr>
                <tr>
					<td colspan="6">
							<table border="0" style="width:100%">
								
								<tr>
									<td valign="middle">
                                    	<input type="hidden" name="id" value="<?php echo $TXTid;?>" />
                                    	<input type="checkbox" name="txt1" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['expenses']  == 1){?> checked="checked" <?php } ?>> Expenses
                                     </td>
									<td valign="middle">
                                    	<input type="checkbox" name="txt2" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['users']  == 1){?> checked="checked" <?php } ?>> Manage System Users
                                     </td>
									<td valign="middle">
                                    	<input type="checkbox" name="txt3" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['set_items']  == 1){?> checked="checked" <?php } ?>> Setup Items
                                    </td>
                                    <td valign="middle">
                                    	<input type="checkbox" name="txt4" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['re_order_level']  == 1){?> checked="checked" <?php } ?>> Re-order Level
                                    </td>
								</tr>
								
								<tr >
									<td colspan="4"><b>&nbsp;</b></td>
								</tr>
								<tr>
									<td valign="middle"><input type="checkbox" name="txt5" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['stock_entry']  == 1){?> checked="checked" <?php } ?>>
                                    	Stock Entry
                                    </td>
									<td valign="middle"><input type="checkbox" name="txt6" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['sale_item']  == 1){?> checked="checked" <?php } ?>>
                                    	Sales
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt7" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['report']  == 1){?> checked="checked" <?php } ?>>
                                    	Report
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt8" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['customers']  == 1){?> checked="checked" <?php } ?>>
                                    	Manage Customers
                                    </td>
								</tr>
								
								<tr >
									<td colspan="3"><b>&nbsp;</b></td>
								</tr>
								<tr>
									<td valign="middle"><input type="checkbox" name="txt9" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['backup']  == 1){?> checked="checked" <?php } ?>>
                                    	Database Backup
                                    </td>
									<td valign="middle"><input type="checkbox" name="txt10" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['company']  == 1){?> checked="checked" <?php } ?>>
                                    	Company Information
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt11" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['invoice']  == 1){?> checked="checked" <?php } ?>>
                                    	Invoice
                                    </td>
                                    <td valign="middle"><input type="checkbox" name="txt12" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['sms']  == 1){?> checked="checked" <?php } ?>>
                                    	SMS
                                    </td>
                              
								</tr>
								
                                <tr>
                                    <td height="5" colspan="6">&nbsp;</td>
                                </tr>
                                
								<tr>
									
                                    <td valign="middle" colspan="6"><input type="checkbox" name="txt13" style="border-left-color: #ffffff; border-bottom-color: #ffffff; border-top-color: #ffffff; border-right-color: #ffffff" <?php if ($content1['shelf']  == 1){?> checked="checked" <?php } ?>>
                                    	Shelf
                                    </td>
                                   
								</tr>
                                                                
								<tr>
									<td align="right" colspan="3"><input type="button" value="Select All" name="btnsubmit" onClick="fnAll(this.form)" style="border:1px solid black">&nbsp;&nbsp;<input type="button" value="DeSelect All" name="btnsubmit" onClick="fnNotAll(this.form)" style="border:1px solid black">
                                    </td>
								</tr>
                               </table>
					</td>
				</tr>
							<tr>
								<td height="5" colspan="6">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="6">						
										<input type="submit" value="Update" class="btn btn-primary">
								</td>
							</tr>
						</table>	
					</form>
			<?php	
					}
				
			?>
            
            
			
			<?php
			
				if ($pg == "")
				
						{
			
			?>
							<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
							<table class="table table-striped responsive-utilities jambo_table" id="dataTables-example">
								<thead>
								<tr>
									<th>S/N</th>
									<th>User Name</th>
									<th>Date Created</th>
                                    <th>Access/Role</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
								</thead>
								<tbody>
			
			
			<?php
						$select_content=("select * from systemusers order by id desc");
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0
			?>
			<?php
			if ($num_chk == 0)
				{
			?>
								<tr height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';" bgcolor="#EFEFEF">
									<td colspan="5"  align="center">No Record Found</td>
								</tr>	
			<?php
			}
				else
			{
			?>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
								
						$k = $k + 1;
						?>
								<tr>
									<td><?php echo $k  ?></td>
									<td><?php  echo ucfirst($content['username'])?></td>
									<td><?php  echo ucfirst($content ['xdate'])?></td>
                                    <td>
                                    	<a style="color:#FF0000" href="userlist.php?id=<?php  echo ($content ['id'])?>&pg=3">
                                        	Edit user role
                                         </a>
                                     </td>
									<td>
										<?php if ($content['status'] == 1)
												{
					
										?>
											<a style="color:#FF0000" href="userlist.php?id=<?php  echo ($content ['id'])?>&v=0&pg=7" target="_parent">Activate</a>
										<?php 
												}
												
											else
												{
										?>
												<a style="color:#FF0000" href="userlist.php?id=<?php  echo ($content ['id'])?>&v=1&pg=7" target="_parent">De-Activate</a>
										<?php
												
												}
										?>
									</td>
									<td>
											<a style="color:#FF0000" href="userlist.php?id=<?php  echo ($content['id'])?>&pg=8&m=<?php  echo ($content ['email'])?>" target="_parent">
													Reset Password
											</a>
									</td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			<?php
			}
			?>
			</tbody>
			</table>
                            </div>
                        </div>
                    </div>
                </div>
                
                
              
                
 <!-- footer content -->
               <?php include("includes/footer.php")?>

<script LANGUAGE="JavaScript">
	
function fnAll(obj)
		{
			for(var i = 0; i < obj.elements.length; i++){
				if(obj.elements[i].type == "checkbox")
				{
					obj.elements[i].checked=true;
				}
			}
		}
		
		function fnNotAll(obj)
		{
			for(var i = 0; i < obj.elements.length; i++){
				if(obj.elements[i].type == "checkbox" && obj.elements[i].name != "password")
				{
					obj.elements[i].checked=false;
				}
			}
		}
</script>	


<script language="javascript">
function loginCheck() {

if(document.frmReg.sname.value == "") {
alert ("Please enter SurName")
document.frmReg.sname.focus();
return false
}
if(document.frmReg.oname.value == "") {
alert ("Please enter OtherNames")
document.frmReg.oname.focus();
return false
}
if(document.frmReg.username.value == "") {
alert ("Please enter UserName")
document.frmReg.username.focus();
return false
}
if(document.frmReg.password.value == "") {
alert ("Please enter Password")
document.frmReg.password.focus();
return false
}

if(document.frmReg.email.value == "") {
alert ("Please enter Email Address")
document.frmReg.email.focus();
return false
}

if(document.frmReg.cat.value == "") {
alert ("Please select User's Category")
document.frmReg.cat.focus();
return false
}
else {
return true
}

}
</script>
<script language="JavaScript" type="text/javascript">

function confirmDel(){ // to confirm delete action before url is sent
	//confirm("Do you want to delete this item?");
	if (confirm("Do you want to delete this?")) {
       return true;
    }	
	return false;
}
</script>

<?php
}
else
	{
		$sql= "<b>Warning: You do not have access to the module you clicked on.... Contact System administrator<b>";
		
		echo "
			<script language='javascript'>
				location.href='../dashboard?logout=1&sql=$sql'
			</script>
		";
		exit();
			
}
?>
