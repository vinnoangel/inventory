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
                <h3>My Today's Sales</h3>
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
                    
					<table class="table table-striped responsive-utilities jambo_table" >
			<?php
						$select_content=("select * from sales where xdate = '$xdate' order by xdate desc");
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
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Date</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						 $yr2 = substr($content["xdate"],0,4) ;
						
							// if($x%2 == 0)
							// 	{
							// 		$color = "#ffffff";
							// 	}
														
							if($yr == $yr2){
								$k = $k + 1;
								
						?>
								<tr>
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['transID']?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo $content['quantity']?></td>
                                    <td><?php  echo $content['price']?></td>
                                    <td><?php  echo formatMoney($content['soldprice'],true)?></td>
                                    <td><?php  echo $content['xdate']?></td>
								</tr>
						 <?php
							}
						  } while ($content = mysqli_fetch_assoc($content_result)); ?>
                          
                        </tbody>
				</table>
			<?php 
							$user = $_SESSION["ustcode"];
							$select_content5=("select * from paymenthistory where xdate = '$xdate' and user='$user' order by xdate desc");
							$content_result5= mysqli_query($db, $select_content5) or die (mysqli_error($db));
							$content5 = mysqli_fetch_assoc($content_result5);
							
							$total_amount =0;
							$total_cash = 0;
							$total_dcash = 0;
							$total_pos = 0;
							$total_dpos = 0;
							$total_debt = 0;
							$total_redeem = 0;
							
							do{
								$total_amount += $content5['amt'];
								if($content5['payment_status'] == 'debt'){
									$debt = $content5['amt'] - $content5['paid'];
									$total_cash += $content5['paid'];
									$total_debt += $debt;
								}
								elseif($content5['payment_status'] == 'pos'){
									$total_pos += $content5['paid'];
								}
								elseif($content5['payment_status'] == 'cash'){
									$total_cash += $content5['paid'];
								}
								
								
							}while ($content5 = mysqli_fetch_assoc($content_result5));
							
							$select_content6=("select * from paid_debt where xdate = '$xdate' and user='$user' order by xdate desc");
							$content_result6= mysqli_query($db, $select_content6) or die (mysqli_error($db));
							$content6 = mysqli_fetch_assoc($content_result6);
							do{
								$total_redeem += $content6['paid'];
								if($content6['payment_mode'] == 'pos'){
									$total_dpos += $content6['paid'];
								}
								elseif($content6['payment_mode'] == 'cash'){
									$total_dcash += $content6['paid'];
								}
							}while ($content6 = mysqli_fetch_assoc($content_result6));
							
						$select_content53=("select * from systemusers where id = '$user'");
						$content_result53= mysqli_query($db, $select_content53) or die (mysqli_error($db));
						$content53 = mysqli_fetch_assoc($content_result53);
					?>
				
				
				<table class="table table-striped responsive-utilities jambo_table" style="padding-bottom:30px; font-family:Verdana, Geneva, sans-serif; font-weight:bold; font-size:14px;">
                <tr><td colspan="3" style="font-weight:bolder; font-size:18px; color:#09F">Sales By <?php echo $content53['surname'].' '.$content53['fname']; ?> (<?php echo $xdate ?>)</td></tr>
				<tr>
				<td >Total Cash At Hand = NGN <?php echo formatMoney(($total_cash + $total_redeem),true) ?></td>
				<td >Total Amount On POS = NGN <?php echo formatMoney($total_pos,true) ?></td>
                <td style="color:#f00">Total Debt Amount = NGN <?php echo formatMoney($total_debt, true) ?></td>
                </tr>
                <tr>
				
				<td>Total Debt Recovered = NGN <?php echo formatMoney($total_redeem,true) ?></td>
				<td>Debt Recieved Through Cash = NGN <?php echo formatMoney($total_dcash,true) ?></td>
				<td>Debt Recieved Through POS = NGN <?php echo formatMoney($total_dpos,true) ?></td>
                </tr>
                <tr>
                <td colspan="3"> Total Amount Realized = NGN <?php echo formatMoney($total_amount,true) ?></td>
				</tr>
				</table>

                               
                <?php
				
			   }
				?>
			   

	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

