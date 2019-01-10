<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	
	if ($pg == 9){	
		$xdate = date("Y-m-d");
		if(isset($_POST["upload"])){
			$fp = fopen($_FILES['image']['tmp_name'], "r");
			$no = 0;
			while($line = fgets($fp))
			{
				if($no != 0){
					list($sn, $on, $oc, $phone, $email, $employdate, $username) = split("\t", $line, 7);
					$passkey = md5("password");
					$username = strtolower($username);
					mysqli_query($db,  "insert into staff SET class='1', surname='$sn', othername='$on', employdate='$employdate', Position='$oc',  phone='$phone', xdate='$xdate', password = '$passkey',  username='$username', email='$email', user='$xID' ") or die(mysqli_error($db));
				}
				$no++;
			}
		$pg = "";
		$sql= "<b>Operation was Successful: Record Inserted<b>";
		}
	}
?>

<?php
	if ($pg == 8)
	
		{
			$sn = $_POST['sn'];
			$on = $_POST['on'];
			$ra = $_POST['ra'];
			$oc = $_POST['oc'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$class = $_POST['class'];
			$nname = $_POST['nname'];
			$naddress = $_POST['naddress'];
			$nemail = $_POST['nemail'];
			$nphone = $_POST['nphone'];
			$sex = $_POST['sex'];
			$employdate = $_POST['employdate'];
			$webcampPic = $_POST['webcampPic'];
			
			$xdate = date("Y-m-d");
			
		  $var1 = mt_rand(1,19);
		  $var2 = mt_rand(1,15);
		  $var3 = mt_rand(1,10);
			  
		  $rand = $var1."".$var2."".$var3."".$var4;
			  
		  $fVariable = time();
		  //$pass = substr($fVariable,2, 5)."".$rand;
		  if($pass == '') $pass = "password";
		  $passkey = md5($pass);
			  
		 if($_FILES['image']['name']){
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
				move_uploaded_file($file_tmp,"uploads/studentpassport/".$file_name);
				//echo "Success ". $file_name;
			}else{
				print_r($errors);
			}
			$webcampPic = $_FILES['image']['name'];
		}
			
		mysqli_query($db,  "insert into staff SET class='$class', surname='$sn', othername='$on', sex='$sex', Position='$oc',  residential='$ra', email='$email', phone='$phone', xdate='$xdate', passport='$file_name',  employdate='$employdate', nname='$nname', naddress='$naddress', nemail='$nemail', nphone='$nphone', user='$xID' ") or die(mysqli_error($db));
			
			$sql= "<b>Operation was Successful: Record Inserted<b> Your Password is: ".$pass ;

	echo "
			<script language='javascript'>
				location.href='staff?sql=$sql'
			</script>
		";			
		}
?>


<?php
	if ($pg == 2)
	
		{
			$sn = $_POST['sn'];
			$on = $_POST['on'];
			$ra = $_POST['ra'];
			$oc = $_POST['oc'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$class = $_POST['class'];
			$nname = $_POST['nname'];
			$naddress = $_POST['naddress'];
			$nemail = $_POST['nemail'];
			$nphone = $_POST['nphone'];
			$sex = $_POST['sex'];
			$employdate = $_POST['employdate'];
			$xdate = date("Y-m-d");
			$webcampPic = $_POST['webcampPic'];
			 $TXTid = $_POST['id'];
			
			if($_FILES['image']['name']){
				// Delete Old Image first
				$file = "uploads/studentpassport/$pcode";
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
					move_uploaded_file($file_tmp,"uploads/studentpassport/".$file_name);
					//echo "Success ". $file_name;
				}else{

					print_r($errors);
				}
				$webcampPic = $_FILES['image']['name'];
			}
				mysqli_query($db,  "UPDATE staff SET class='$class', surname='$sn', othername='$on', sex='$sex', Position='$oc',  residential='$ra', email='$email', phone='$phone', xdate='$xdate',  employdate='$employdate', passport='$webcampPic', nname='$nname', naddress='$naddress', nemail='$nemail', nphone='$nphone', user='$xID' WHERE gid = '$TXTid'") or die(mysqli_error($db));
			
			$sql= "<b>Operation was Successful: Changes made<b>";
			$p = $_GET["p"]; 
			if($p == 1){
			echo "
				<script language='javascript'>
					location.href='staff?sql=$sql'
				</script>
			";	
			}
			else{
				echo "
				<script language='javascript'>
					location.href='staff-information?sql=$sql&p=2&id=$TXTid'
				</script>
			";	
			}
		}
?>

<?php
	if ($pg == 9)
	
		{
			$TXTid = $_GET['id'];
			$xdate = date("Y-m-d");
			$pass = md5("password");
			mysqli_query($db,  "UPDATE staff SET  password = '$pass', user='$xID' WHERE gid = '$TXTid'") or die(mysqli_error($db));

			$sql= "<b>Operation was Successful: Password Reset to password. Login and change it<b>";
			echo "
				<script language='javascript'>
					location.href='staff?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from staff WHERE gid='$TXTid'");
			$content_result1= mysqli_query($db,  $select_content1) or die(mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
/*	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			$pcode = $_GET['pcode'];
			if($pcode != ""){
				$file = "uploads/studentpassport/$pcode";
				unlink($file);
			}
			mysqli_query($db,  "delete from staff where gid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:staff?sql=$sql");
		}*/
	
	include("header.php");
?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Staff Record</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
                            	 <a href="dashboard" class="btn btn-sm btn-success">Dashboard</a>
                                 <a href="staff?pg=1" class="btn btn-sm btn-dark">New Staff</a>
                                 <a href="staff?pg=4" class="btn btn-sm btn-dark">Batch Upload</a>
                                 <a href="staff" class="btn btn-sm btn-warning">View Staff</a>
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
												<label>Title </label>
											</td>
											<td>
												 <select name="class" class="form-control" >
													  <option value="">--Select Title</option>
													  <?php
															$select_content2=("select * from title  order by class asc");
															$content_result2= mysqli_query($db,  $select_content2) or die(mysqli_error($db));
															$content2 = mysqli_fetch_assoc($content_result2);
															$num_chk2 = mysqli_num_rows ($content_result2);
															$k = 0
														?>
													  <?php do { 	?>
													  <option value="<?php echo  $content2['id']?>"><?php echo  $content2['class']?></option>
													  <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
													</select>
											</td>
										</tr>
										
										 <tr>
											<td>
												<label>Surname</label>
											</td>
											<td>
												<input type="text" class="form-control" name="sn"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Othername</label>
											</td>
											<td>
												<input type="text" class="form-control" name="on"/>
											</td>
										</tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Gender</label>
                                            </td>
                                            <td>
                                                <select id="select" name="sex" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                               
                                            </td>
                                        </tr>
										<tr>
											<td>
												<label>
													Qualification</label>
											</td>
											<td>
												<input type="text" class="form-control" name="oc"/>
											   
											</td>
										</tr>
										<tr>
											<td>
												<label>
													Employment Date</label>
											</td>
											<td>
												<input type="date"  name="employdate" value="<?php echo $content1["employdate"] ?>" class="form-control" />
											</td>
										</tr>
										 <tr>
											<td>
												<label>Contact  Address</label>
											</td>
											<td>
												<input type="text" class="form-control" name="ra" />
											</td>
										</tr>
										<tr>
											<td>
												<label>Contact Email</label>
											</td>
											<td>
												<input type="email" class="form-control" name="email" />
											</td>
										</tr>
										<tr>
											<td>
												<label>Contact Phone No</label>
											</td>
											<td>
												<input type="text" class="form-control" name="phone" onkeydown="return digistOnly()" />
											</td>
										</tr>
										<tr>
											<td>
												<label>
													Passport Photograph</label>
											</td>
											<td valign="middle">
												<input type="file" name="image"/>
                                                <input type="hidden" name="webcampPic"  />
                                                <div id="photos"></div>
											</td>
										</tr>
                                         <tr><td colspan="2"> <h5 style="color:#039; font-weight:bold">NEXT OF KIN INFORMATION</h5><hr /></td></tr>
                                       <tr>
											<td>
											   <label> Name</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nname" />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Address</label>
											</td>
											<td>
												<input type="text" class="form-control" name="naddress" />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Phone Number</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nphone"  />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Email</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nemail" />
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
                                    <div id="camera">
                                            <span class="camTop"></span>
                                            <div id="screen"></div>
                                            <div id="buttons">
                                                <a id="shootButton" href="" class="blueButton">Snap!</a>
                                                <a id="cancelButton" href="" class="blueButton">Cancel</a> <a id="uploadButton" href="" class="greenButton">Upload!</a>
                                            </div>
                                            
                                            <span class="settings"></span>
                                         </div>
							<?php	
									}
								
							?>
							
							<?php
								if ($pg == 7)
									{
							?> 			 <form method="post" action="?pg=2&p=1" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
									<table class="form">
										<tr>
											<td>
												<label>Title </label>
											</td>
											<td>
												<input type="hidden"  name="id" value="<?php echo $content1["gid"] ?>"/>
												<input type="hidden"  name="pcode" value="<?php echo $content1["passport"] ?>"/>
												 <select name="class" class="form-control" >
													  <option value="">--Select Title</option>
													  <?php
															$select_content2=("select * from title  order by class asc");
															$content_result2= mysqli_query($db, $select_content2) or die(mysqli_error($db));
															$content2 = mysqli_fetch_assoc($content_result2);
															$num_chk2 = mysqli_num_rows ($content_result2);
															$k = 0
														?>
													  <?php do { 	?>
													  <option value="<?php echo  $content2['id']?>" <?php if($content2['id'] == $content1['class']){?> selected="selected" <?php } ?>><?php echo  $content2['class']?></option>
													  <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
													</select>
											</td>
										</tr>
										
										 <tr>
											<td>
												<label>Surname</label>
											</td>
											<td>
												<input type="text" class="form-control" name="sn" value="<?php echo $content1["surname"] ?>"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Othername</label>
											</td>
											<td>
												<input type="text" class="form-control" name="on" value="<?php echo $content1["othername"] ?>" />
											</td>
										</tr>
										<tr>
                                            <td>
                                                <label>
                                                    Gender</label>
                                            </td>
                                            <td>
                                                <select id="select" name="sex" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Male" <?php if("Male" == $content1['sex']){?> selected="selected" <?php } ?>>Male</option>
                                                    <option value="Female" <?php if("Female" == $content1['sex']){?> selected="selected" <?php } ?>>Female</option>
                                                </select>
                                               
                                            </td>
                                        </tr>
										 <tr>
											<td>
												<label>
													Qualification</label>
											</td>
											<td>
												<input type="text"  name="oc" value="<?php echo $content1["Position"] ?>" class="form-control" />
											</td>
										</tr>
										<tr>
											<td>
												<label>
													Employment Date</label>
											</td>
											<td>
												<input type="date"  name="employdate" value="<?php echo $content1["employdate"] ?>" class="form-control" />
											</td>
										</tr>
										 <tr>
											<td>
												<label>Contact  Address</label>
											</td>
											<td>
												<input type="text" class="form-control" name="ra" value="<?php echo $content1["residential"] ?>"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Eamil</label>
											</td>
											<td>
												<input type="email" class="form-control" name="email" value="<?php echo $content1["email"] ?>"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Phone</label>
											</td>
											<td>
												<input type="text" class="form-control" name="phone" value="<?php echo $content1["phone"] ?>"/>
											</td>
										</tr>                                             
										<tr>
											<td>
												<label>
													Passport Photograph</label>
											</td>
											<td valign="middle">
												<input type="file" name="image"/>
                                                <input type="hidden" name="webcampPic" value="<?php echo $content1["passport"] ?>" />
												 <?php if($content1["passport"] ==""){ ?>
                                                      <div id="photos"> <img src="images/user.png" height="40px" width="70px" style="border-radius:7px; box-shadow:2px 1px 2px 2px #CCCCCC;"/> </div>
                                                <?php
                                                }else{
                                                ?>
                                                    <div id="photos"> <img src="uploads/studentpassport/<?php echo $content1["passport"] ?>" height="70px" width="70px" style="border-radius:7px; box-shadow:2px 1px 2px 2px #CCCCCC;"/> </div>
                                                <?php
                                                }
                                                ?>
											</td>
										</tr>
                                       <tr><td colspan="2"> <h5 style="color:#039; font-weight:bold">NEXT OF KIN INFORMATION</h5><hr /></td></tr>
                                       <tr>
											<td>
											   <label> Name</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nname" value="<?php echo $content1["nname"] ?>" />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Address</label>
											</td>
											<td>
												<input type="text" class="form-control" name="naddress" value="<?php echo $content1["naddress"] ?>" />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Phone Number</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nphone" value="<?php echo $content1["nphone"] ?>" />
											</td>
										</tr>
                                        <tr>
											<td>
											   <label> Email</label>
											</td>
											<td>
												<input type="text" class="form-control" name="nemail" value="<?php echo $content1["nemail"] ?>" />
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
                                    <div id="camera">
                                        <span class="camTop"></span>
                                        <div id="screen"></div>
                                        <div id="buttons">
                                            <a id="shootButton" href="" class="blueButton">Snap!</a>
                                            <a id="cancelButton" href="" class="blueButton">Cancel</a> <a id="uploadButton" href="" class="greenButton">Upload!</a>
                                        </div>
                                        
                                        <span class="settings"></span>
                                     </div>
							<?php	
									}
								
							?>
							
							<?php
								if ($pg == 4)
									{
							?> 			 <form method="post" action="?pg=9" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
											<table class="form">
												<tr>
													<td>
														<label>Text File</label>
													</td>
													<td valign="middle">
														<input type="file" name="image" required="required"/>
													</td>
												</tr>
												 
												<tr>
													<td>
													  
													</td>
													<td>
														<input name="upload"  type="submit" class="btn btn-primary" value="  Upload  " />
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
									<table class="table table-striped responsive-utilities jambo_table" id="example">
							<?php
									$select_content=("select * from staff s INNER JOIN title c ON s.class = c.id  order by surname asc");
									$content_result= mysqli_query($db,  $select_content) or die(mysqli_error($db));
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
										<th>Title</th>
										<th>Staff Name</th>
										<th>Type</th>
										<th>Position</th>
										<th>Email</th>
										<th>Phone No</th>
										<th>Edit</th>
										<!--<th>Delete</th>-->
                                        <th>View</th>
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
												<tr >
													<td><?php echo $k  ?></td>
													<td><?php  echo ucfirst($content ['class'])?></td>
													<td><?php  echo $content['surname']." ". $content['othername']?></td>
													<td><?php  echo ucfirst($content ['type'])?></td>
													<td><?php  echo ucfirst($content ['Position'])?></td>
													<td><?php  echo ($content ['email'])?></td>
													<td><?php  echo ($content ['phone'])?></td>
													<td width="5%"  style="font-weight:normal"><a href="staff?id=<?php echo ($content ['gid'])?>&pg=7" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
													<!--<td width="8%" align="center"><a href="staff?id=<?php  //echo ($content ['gid'])?>&pg=6&pg=6&pcode=<?php  //echo ($content ['passport'])?>" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-close"></i></a> </td>-->
                                                    <td width="8%" align="center"><a href="staff-information?id=<?php  echo ($content ['gid'])?>" class="btn btn-primary"><i class="fa fa-search"></i></a> </td>
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
if(document.frmReg.class.value == "") {
alert ("Please select Title")
document.frmReg.class.focus();
return false
}
if(document.frmReg.sn.value == "") {
alert ("Please enter SurName")
document.frmReg.sn.focus();
return false
}
if(document.frmReg.on.value == "") {
alert ("Please enter OtherNames")
document.frmReg.on.focus();
return false
}
if(document.frmReg.oc.value == "") {
alert ("Please enter your Qualification")
document.frmReg.oc.focus();
return false
}
if(document.frmReg.ra.value == "") {
alert ("Please enter Contact Address")
document.frmReg.ra.focus();
return false
}
if(document.frmReg.email.value == "") {
alert ("Please enter Contact Email Address")
document.frmReg.email.focus();
return false
}
if(document.frmReg.phone.value == "") {
alert ("Please enter Contact Phone Number")
document.frmReg.phone.focus();
return false
}
if(document.frmReg.user.value == "") {
alert ("Please enter Staff's default Username")
document.frmReg.user.focus();
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