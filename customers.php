<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); 
	require_once 'class/bsgateway.php';
	$config = array('appid'=>'271488','callback'=>1);
	$messageObj = new BSGateway($config);
?>
<?php
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
		$sn = $_POST['sn'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$username = $_POST['user'];
		$class = $_POST['class'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$xdate = date("Y-m-d");
		if (substr($phone, 0, 1) == '0') {
			$phone = preg_replace('/^0/', '234', $phone);
		}
		$var1 = mt_rand(1,19);
		$var2 = mt_rand(1,15);
		$var3 = mt_rand(1,10);
		  
	   $rand = $var1."".$var2."".$var3."".$var4;
	  
	   $fVariable = time();
	   $pass = substr($fVariable,2, 5)."".$rand;
	   $passkey = $pass;
		  
		
		mysqli_query($db, "insert into customers SET tid='$class', name='$sn', address='$address', email='$email', phone='$phone', birthday='$bday', xdate='$xdate', idno = '$passkey', user='$xID' ") or die(mysqli_error($db));
		
		$select_content1=("select * from messages_templates where id='1'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$phone = trim($phone);
		$sender = $content1['sender'];
		$sms = smsContent($content1['message'], $sn);
		$response = $messageObj->sendMessage($_SESSION['account_username'], $_SESSION['account_password'], $sender, $phone, html_entity_decode($sms), 0);
		$sql= "<b>Operation was Successful: Record Inserted<b> Your ID Number is: ".$pass ;

echo "
		<script language='javascript'>
			location.href='customers?sql=$sql'
		</script>
	";			
	}
?>


<?php
	if ($pg == 2)
	
		{
			$sn = $_POST['sn'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $_POST['user'];
			$class = $_POST['class'];
			$bday = $_POST['bday'];
			$xdate = date("Y-m-d");
			
			$TXTid = $_POST['id'];
			
			
			mysqli_query($db, "UPDATE customers SET tid='$class', name='$sn',email='$email', address='$address', phone='$phone', birthday='$bday', xdate='$xdate', user='$xID' WHERE cid = '$TXTid'") or die(mysqli_error($db));

			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='customers?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 9)
	
		{
			$TXTid = $_GET['id'];
			$xdate = date("Y-m-d");
			$pass = "12345";
			mysqli_query($db, "UPDATE customers SET  idno = '$pass', user='$xID' WHERE cid = '$TXTid'") or die(mysqli_error($db));

			$sql= "<b>Operation was Successful: ID Number Reset to 12345. Login and change it<b>";
			echo "
				<script language='javascript'>
					location.href='customers?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 7)
	{
		$TXTid = $_GET['id'];
		$select_content1=("select * from customers WHERE cid='$TXTid'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$num_chk1 = mysqli_num_rows ($content_result1);
		
	}
?>

<?php
	if ($pg == 6)
	{
	
		$TXTid = $_GET['id'];
		mysqli_query($db, "delete from customers where cid = '$TXTid' ") or die(mysqli_error($db)) ;
		$sql = "Operation was Successful: 1 Item deleted";
		header ("location:customers?sql=$sql");
	}
	
	if ($pg == 10)
	{	
		//if(isset($_POST["upload"])){
			$fp = fopen($_FILES['image']['tmp_name'], "r");
			$no = 0;
			while($line = fgets($fp))
			{
				
				if($no != 0){
					
					list($name, $phone, $bday, $email) = split("\t", $line, 4);
					if($name != ''){
						//echo $name." ".  $phone." ". $bday." ".  $email;
						$bday = date("Y-m-d", strtotime($bday));
						mysqli_query($db, "INSERT into customers SET name='$name',email='$email', phone='$phone', birthday='$bday', xdate='$xdate', user='$xID'") or die(mysqli_error($db));
						
					}
				}
				$no++;
				
			}
			
			$pg= "";
			$sql= "<b>Operation was Successful: Record Inserted<b>";
		//}	
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
                <h3>Customer</h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                 	<?php include("menu.php");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >
                <div class="x_title">
                    <a href="customers?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Customer</a>
                    <a href="customers" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> View Customers</a>
                     <a href="customers?pg=11" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Batch Upload</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
                            	 <select name="class" class="form-control">
                                      <option value="">--Select Title</option>
                                      <?php
											$select_content2=("select * from title  order by class asc");
											$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
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
                                <label>Full Name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sn"/>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="address" value="<?php echo $content1["address"] ?>"/>
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
                                <input type="text" class="form-control" name="phone" value="" placeholder ="234803xxxxxxx" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Birthday (yyyy-mm-dd)</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="bday" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-blue" value="  Submit  " />
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
				$TXTid = $_GET['id'];
				$select_content1=("select * from customers WHERE cid='$TXTid'");
				$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
				$content1 = mysqli_fetch_assoc($content_result1);
				$num_chk1 = mysqli_num_rows ($content_result1);
			?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	<tr>
                            <td>
                                <label>Title </label>
                            </td>
                            <td>
                           	 	<input type="hidden"  name="id" class="form-control" value="<?php echo $content1["cid"] ?>"/>
                            	 <select name="class" >
                                      <option value="">--Select Title</option>
                                      <?php
											$select_content2=("select * from title  order by class asc");
											$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
											$content2 = mysqli_fetch_assoc($content_result2);
											$num_chk2 = mysqli_num_rows ($content_result2);
											$k = 0
										?>
                                      <?php do { 	?>
                                      <option value="<?php echo  $content2['id']?>" <?php if($content2['id'] == $content1['tid']){?> selected="selected" <?php } ?>><?php echo  $content2['class']?></option>
                                      <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                    </select>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Full Name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sn" value="<?php echo $content1["name"] ?>"/>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="address" value="<?php echo $content1["address"] ?>"/>
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
                                <input type="text" class="form-control" name="phone" value="<?php echo $content1["phone"] ?>" placeholder ="234803xxxxxxx" />
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <label>Birthday (yyyy-mm-dd)</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="bday" value="<?php echo $content1["birthday"] ?>"/>
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
				if ($pg == 11)
					{
			?> 			 <form method="post" action="?pg=10" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	<tr>
                            <td>
                                <label>File To Upload </label>
                            </td>
                            <td>
                           	 	<input type="file" name="image" required/>
                            	 
                            </td>
                        </tr>
                                                                
						<tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-primary" value="  Uplaod  " />
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
						$select_content=("select cid, class, name, address, email, phone, birthday, idno, c.xdate, c.user from customers c left join title t on c.tid=t.id  order by name desc");
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
                        <th>Title</th>
                        <th>Name</th>
                         <th>Address</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Birthday</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
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
								<tr>
									<td><?php echo $k  ?></td>
                                    <td><?php  echo ucfirst($content ['class'])?></td>
									<td><?php  echo $content['name']?></td>
                                    <td><?php  echo $content['address']?></td>
                                    <td><?php  echo ($content ['email'])?></td>
                                    <td><?php  echo ($content ['phone'])?></td>
                                    <td><?php  echo ($content ['birthday'])?></td>
                                    <td>
										<a style="color:#FF0000" href="customers?id=<?php  echo ($content['cid'])?>&pg=9&m=<?php  echo ($content ['email'])?>" target="_parent">	Reset Password	</a>
									</td>
                                    <td width="5%"  style="font-weight:normal"><a href="customers?id=<?php echo ($content ['cid'])?>&pg=7" target="_parent"  class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
                                    <td width="8%" align="center"><a href="customers?id=<?php  echo ($content ['cid'])?>&pg=6&pg=6&pcode=<?php  echo ($content ['passport'])?>" target="_parent" onClick="return confirmDel();"  class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
            	</tbody>
			</table>
			<?php
			}
			?>
			</div>
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

	if(document.frmReg.sn.value == "") {
		alert ("Please enter SurName")
		document.frmReg.sn.focus();
		return false
	}

	if(document.frmReg.phone.value == "") {
		alert ("Please enter Contact Phone Number")
		document.frmReg.phone.focus();
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