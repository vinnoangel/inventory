<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	
?>


<?php
if ($pg == 2)
{	
	$sid = $_POST['sid'];
	$cid = $_POST['cid'];
	$stats = $_POST['stats'];
	$deliverdate = $_POST['deliverdate'];
	$xdate = date("Y/m/d");
	
	$select_content1=("select * from messages_templates where id='2'");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	
	$select_content=("select * from customers WHERE cid='$cid'");
	$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
	$content = mysqli_fetch_assoc($content_result);
	$num_chk = mysqli_num_rows ($content_result);
	$phone = trim($content['phone']);
	$name = $content['name'];
	
	$sms = smsContent($content1['message'],$name,$regno, $amount,$deliverdate);
	//$response = $messageObj->sendMessage('nobleogyify@yahoo.com', 'noble100', 'G-TRAC', $phone, html_entity_decode($sms), 0);
	mysqli_query($db, "UPDATE ordertable SET deliverdate='$deliverdate', status='$stats', xdate='$xdate', user='$xID' where sale_id='$sid' ") or die(mysqli_error($db));
	
	$sql = "<b>Order Updated Successful<b>";
	echo "
		<script language='javascript'>
			location.href='pending-order?sql=$sql'
		</script>
	";
}

	if ($pg == 3)
		{
		
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from usercat WHERE iid='$TXTid'");
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
		$xdate = date("Y-m-d");
?>

<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pending Order</h3>
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
                	<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span> 
                   <?php
					if ($pg == 1)
						{
							$id = $_GET['id'];
							$select_content=("select * from ordertable where sale_id='$id'");
							$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
							$content = mysqli_fetch_assoc($content_result);
				?> 			 <form method="post" action="pending-order?pg=2" name="frmReg" onsubmit="return loginCheck()" >
						<table class="table" style="border:#FFF">
							<tr>
								<td ><b>Status</b></td>
								<td >
									  <select name="stats" id="stats" class="form-control" onChange="return getNumbers()">
										<option value="">--Select</option>
										<option value="1" <?php if($content['status'] == 1){?> selected="selected" <?php ; } ?>>Ongoing</option>
										<option value="2" <?php if($content['status'] == 2){?> selected="selected" <?php ; } ?>>Completed</option>
                                        <option value="5" <?php if($content['status'] == 5){?> selected="selected" <?php ; } ?>>Cancel</option>
									  </select>
										 
									   <input type="hidden" value="<?php echo $content['sale_id']?>" name="sid" id="sid"/>
                                       <input type="hidden" value="<?php echo $content['customer_id']?>" name="cid" id="cid"/>
								</td>
								
							</tr>
							 <tr>
								<td>
									<label>Delivering Date</label>
								</td>
								<td>
									<input type="text" name="deliverdate" id="birthday" class="date-picker form-control" value="<?php echo $content['deliverdate']?>">
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
					<table class="table table-striped responsive-utilities jambo_table" >
						<?php
						$select_content=("select * from ordertable where status = '0' or status = '1' order by xdate desc");
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0;
						$yr = date("Y"); // Current year
					?>
					<?php
                    if ($num_chk == 0)
                        {
                    ?>
								<tr height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';" bgcolor="#EFEFEF">
									<td colspan="5"  align="center">No Sales Yet</td>
								</tr>	
					<?php
                    }
                        else
                    {
                    ?>
            					<thead>
								<tr>
									<th>S/N</th>
                                    <th>Transaction ID</th>
                                    <th>Item Name</th>
									<th>Quantity</th>
                                    <th>Amount</th>
                                    <td>Status</td>
                                    <th>Delivering Date</th>
                                    <th>Update</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						 $yr2 = substr($content["xdate"],0,4) ;
														
							if($yr == $yr2){
								$k = $k + 1;
								
						?>
								<tr>
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['transID']?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo $content['quantity']?></td>
                                    <td><?php  echo formatMoney($content['soldprice'],true)?></td>
                                    <td><?php if($content['status'] == 1){ echo "Ongoing";} else { echo "No update";}?></td>
                                    <td><?php  echo $content['deliverdate']?></td>
                                    <td> <a href="pending-order?id=<?php echo ($content ['sale_id'])?>&pg=1" target="_parent"  class="btn btn-dark"><i class="fa fa-upload"></i></a></td>
								</tr>
						 <?php
							}
						  } while ($content = mysqli_fetch_assoc($content_result)); ?>
                          
                        </tbody>
				</table>
			<?php 
					}
			   }
				?>
			   

	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

