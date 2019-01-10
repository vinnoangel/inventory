<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

require_once ('connection.php');
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
?>

<?php
	if ($pg == 8)
	
		{
			$name = $_POST['name'];
			$slogan = $_POST['slogan'];
			$regno = $_POST['regno'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$user = $_POST['user'];
			$address = $_POST['address'];

			//$pass = $_POST['passport'];
			
			$xdate = date("Y-m-d");
			
			 $var1 = mt_rand(1,10);
			  $var2 = mt_rand(1,10);
			  $var3 = mt_rand(1,10);
			  $var4 = mt_rand(1,10);
			  
			  $rand = $var1."".$var2."".$var3."".$var4;
			  $fVariable = "NDS".date();
			  $pass = $fVariable."".$rand;
			  
			  if(isset($_FILES['image'])){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));		
				$expensions= array("jpeg","jpg","png","gif"); 		
				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"logos/".$file_name);
					//echo "Success ". $file_name;
				}else{
					print_r($errors);
				}
			}
			
			mysqli_query($db, "insert into company SET sname='$name', regnof = '$regno', slogan='$slogan', email='$email', phone='$phone', username='$user', address='$address', logo='$file_name', xdate='$xdate', password = '$pass',  user='$xID' ") or die(mysqli_error($db));
			$sql= "<b>Operation was Successful: Record Inserted<b>";

	echo "
			<script language='javascript'>
				location.href='company?sql=$sql'
			</script>
		";			
		}
?>


<?php
	if ($pg == 2)
	
		{
			$name = $_POST['name'];
			$slogan = $_POST['slogan'];
			$regno = $_POST['regno'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$user = $_POST['user'];
			$address = $_POST['address'];

			//$pass = $_POST['passport'];
			
			$xdate = date("Y-m-d");
			
			 $TXTid = $_POST['id'];
			
			if($_FILES['image']['name']){
				// Delete Old Image first
				$file = "uploads/$pcode";
				unlink($file);
				
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));		
				$expensions= array("jpeg","jpg","png","gif"); 		
				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"logos/".$file_name);
					//echo "Success ". $file_name;
				}else{
					print_r($errors);
				}
				mysqli_query($db, "UPDATE company SET sname='$name', regnof = '$regno', slogan='$slogan', email='$email', phone='$phone', username='$user', address='$address', logo='$file_name', xdate='$xdate', user='$xID' WHERE id = '$TXTid'") or die(mysqli_error($db));
			}
			else{
				mysqli_query($db, "UPDATE company SET sname='$name', regnof = '$regno', slogan='$slogan', email='$email', phone='$phone', username='$user', address='$address', xdate='$xdate', user='$xID' WHERE id = '$TXTid'") or die(mysqli_error($db));
			}

			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='company?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from company WHERE id='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			$pcode = $_GET['pcode'];
			$file = "logos/$pcode";
			unlink($file);
			mysqli_query($db, "delete from company where id = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:company?sql=$sql");
		}
?>

<?php
	if ($pg == 3)
		{
		
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from usercat WHERE id='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			$role1 = $content1['role1'];
			$role2 = $content1['role2'];
			$role3 = $content1['role3'];
			$role4 = $content1['role4'];
			$role5 = $content1['role5'];
			$role6 = $content1['role6'];
			$role7 = $content1['role7'];
			$role8 = $content1['role8'];
			$role9 = $content1['role9'];
			$role10 = $content1['role10'];
			$role11 = $content1['role11'];
			$role12 = $content1['role12'];
		
		}
?>


<?php include("header.php"); ?>
<div class="right_col" role="main">
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Company Information</h3>
        </div>

        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                 <a href="dashboard" class="btn btn-sm btn-success"><i class="fa fa-home"></i>Dashboard</a>
                  <a href="company" class="btn btn-sm btn-primary"><i class="fa fa-search"></i>Company Info</a>
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
			?> 			 <form method="post" action="?pg=8" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	
                         <tr>
                            <td>
                                <label>Company Name</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="name"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Company Slogan</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="slogan"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Students RegNo Format <label>
                            </td>
                            <td>
                            	<input type="text" class="mini" name="regno"/>
                               
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <label>Company Email</label>
                            </td>
                            <td>
                                <input type="email" class="mini" name="email"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Company Phone Nos</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="phone"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Login Username:</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="user" />
                            </td>
                        </tr>
                                              
                        <tr>
                            <td>
                                <label>
                                    Company Logo</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Company Address</label>
                            </td>
                            <td>
                                 <textarea class="tinymce" name="address"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-primary" value="  Submit  " />
                            </td>
                        </tr>
                    </table>
                    </form>
			<?php	
					}
				
			?>
			
            <?php
				if ($pg == 7)
					{
			?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	
                         <tr>
                            <td>
                                <label>Company Name:</label>
                            </td>
                            <td>
                            	<input type="hidden"  name="id" value="<?php echo $content1["id"] ?>"/>
                                <input type="text" class="mini" name="name" value="<?php echo $content1["sname"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Company Slogan:</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="slogan" value="<?php echo $content1["slogan"] ?>" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Students' RegNo format:</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="regno" value="<?php echo $content1["regnof"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="email" class="mini" name="email" value="<?php echo $content1["email"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Company Phone Number:</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="phone" value="<?php echo $content1["phone"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username:</label>
                            </td>
                            <td>
                                <input type="text" class="mini" name="user" value="<?php echo $content1["username"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Company Address:</label>
                            </td>
                            <td>
                            	<textarea class="tinymce" name="address"> <?php echo $content1["address"] ?></textarea>
                            </td>
                        </tr>
                                              
                        <tr>
                            <td>
                                <label>
                                    Company Logo</label>
                            </td>
                            <td valign="middle">
                                <input type="file" name="image"/>
                                <img src="logos/<?php echo $content1["logo"] ?>" height="100" width="100" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-primary" value="  Update  " />
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
							<table class="table table-striped responsive-utilities jambo_table" >
			<?php
						$select_content=("select * from company order by sname asc");
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
            					<thead>
								<tr>
									<th>S/N</th>
									<th>Company Name</th>
									<th>Slogan</th>
                                    <th>Email</th>
                                    <th>Phone</th>
									<th>&nbsp;</th>
                                   <!-- <th>&nbsp;</th>
                                    <th>&nbsp;</th>-->
								</tr>
								</thead>
								<tbody>
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
								<tr bgcolor="<?php echo $color ?>" height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';">
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['sname']?></td>
									<td><?php  echo ucfirst($content ['slogan'])?></td>
                                    <td><?php  echo ucfirst($content ['email'])?></td>
                                    <td><?php  echo ucfirst($content ['phone'])?></td>
									<!--<td>
										<a style="color:#FF0000" href="company.php?id=<?php  echo ($content['id'])?>&pg=8&m=<?php  echo ($content ['email'])?>" target="_parent">	Reset Password	</a>
									</td>-->
                                    <td width="5%"  style="font-weight:normal"><a href="company?id=<?php echo ($content ['id'])?>&pg=7" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
                                    <!--<td width="8%" align="center"><a href="company?id=<?php  echo ($content ['id'])?>&pg=6&pg=6&pcode=<?php  echo ($content ['logo'])?>" target="_parent" onClick="return confirmDel();"><img src="images/deletes.gif" width="20" height="19" border="0" /></a> </td>-->
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
<?php include("includes/footer.php") ?>

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
if(document.frmReg.name.value == "") {
alert ("Please enter Schhol Name")
document.frmReg.name.focus();
return false
}
if(document.frmReg.slogan.value == "") {
alert ("Please enter company slogan")
document.frmReg.slogan.focus();
return false
}
if(document.frmReg.regno.value == "") {
alert ("Please enter company Registration Number format")
document.frmReg.regno.focus();
return false
}
if(document.frmReg.email.value == "") {
alert ("Please select company contact email address")
document.frmReg.email.focus();
return false
}
if(document.frmReg.phone.value == "") {
alert ("Please enter company contact phone number")
document.frmReg.phone.focus();
return false
}
if(document.frmReg.user.value == "") {
alert ("Please enter company login username")
document.frmReg.user.focus();
return false
}
if(document.frmReg.address.value == "") {
alert ("Please enter company Address")
document.frmReg.address.focus();
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