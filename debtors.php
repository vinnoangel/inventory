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
	if($pg == 9){
		
		$amount = $_POST['amount'];
		$debt_id = $_POST['debt_id'];
		$mode = $_POST['mode'];

		$select_content4=("select * from debtors where id = '$debt_id'");
		$content_result4= mysqli_query($db, $select_content4) or die (mysqli_error($db));
		$content4 = mysqli_fetch_assoc($content_result4);
		
		if($amount <= $content4['bal']){
			$sumTotal = $content4['total_amount'];
			$paid = $content4['paid'] + $amount;
			$bal = $sumTotal - $paid;
			
			
			$custID = $content4['customer_id'];
			$transID = $content4['transID'];
			$qtys = $content4['qty'];
			$itemname = $content4['item_name'];
			$xdate = date("Y-m-d");
			
			mysqli_query($db, "update debtors SET paid = '$paid', bal='$bal' where id ='$debt_id'") or die(mysqli_error($db));
			
			$sumTotal = $content4['bal'];
			$balance = $sumTotal - $amount;
			
			mysqli_query($db, "insert into paid_debt SET customer_id ='$custID', total_amount='$sumTotal', paid = '$amount', bal='$balance', transID='$transID', xdate='$xdate', user='$xID', item_name='$itemname', qty='$qtys', payment_mode='$mode' ") or die(mysqli_error($db));
			
			echo '
				<script language="javascript">
					alert("Operation Was Successful")
				</script>
					';
			
		}
		else{
			echo '
				<script language="javascript">
					alert("Paying Amount Must Be Equal to Amount Owed or Less")
				</script>
					';
			
		}
		
	}

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
?>

<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Debtors</h3>
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
					<table class="table table-striped responsive-utilities jambo_table" id="example">
			<?php
						$select_content=("select * from customers c INNER JOIN  debtors d ON c.cid = d.customer_id where bal != '' or bal != 0 order by d.xdate desc");
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
                                    <th>Customer Name</th>
                                    <th>Transaction ID</th>
                                    <th>Item Name</th>
									<th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>Sold By</th>
                                    <th>Date</th>
                                    <th>Pay</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						//  $yr2 = substr($content["xdate"],0,4) ;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
														
							if($yr == $yr2){
								$k = $k + 1;
								$user = $content['user'];
								$select_content2=("select * from systemusers where id = '$user'");
								$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
								$content2 = mysqli_fetch_assoc($content_result2);
						?>
								<tr>
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['name']?></td>
                                   <td><?php  echo $content['transID']?></td>
                                    <td><?php  echo $content['item_name']?></td>
                                    <td><?php  echo $content['qty']?></td>
                                    <td><?php  echo $content['total_amount']?></td>
                                    <td><?php  echo $content['paid']?></td>
                                    <td><?php  echo $content['bal']?></td>
                                    <td><?php  echo $content2['surname'].' '.$content2['fname']?></td>
                                    <td><?php  echo $content['xdate']?></td>
                                    <td><!--<button type="button" class="btn btn-sm  btn-dark" value="<?php echo $content['id'] ?>" data-toggle="modal" data-target=".bs-example-modal-sm" title="<?php //echo $content['id'] ?>" onClick="retun assign()" name="bid[]">Pay Now</button-->
                                    <a class="btn btn-danger" onClick="return payDebt(<?php echo $content['id']; ?>)" data-toggle="modal" data-target=".bs-example-modal-sm" title="<?php echo $content['id']; ?>">Pay Now</a></td>
								</tr>
						 <?php
							}
						  } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			
			</tbody>
			</table>
                            <!--  modals -->
                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Redeem Debt</h4>
                                        </div>
                                         <form method="post" action="?pg=7" name="frmReg4" onSubmit="return makePayment()" >
                                            <div class="modal-body">
                                                <label for="name">Enter Amount * :</label>
                                                <input type="text" id="amount" class="form-control" width="100%" name="amount" required onKeyDown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                                                
                                                <input type="hidden" name="debt_id" required/>
                                                
                                                <!--<input type="text" name="n" required/>
                                                <input type="text" name="b" required/>-->
                                                <br>
                                            <label for="name">Select Payment Mode * :</label>
                                            <select name="mode" id="mode" class="form-control" width="100%">
                                                <option value="cash">Cash</option>
                                                <option value="pos">POS</option>
                                                </select>
                                             </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-darkt" data-dismiss="modal">Cancel</button>
                                                <input  type="submit" class="btn btn-primary" value="  Pay Now " />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /modals -->
            
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>
<script language="javascript">
	function payDebt(id){
		//$(".pay"+id).remove();// .fadeOut('slow'); 
		document.frmReg4.debt_id.value = id;

		//document.frmReg4.n.value = n;
	}
	
	function makePayment() {
		if(eval(document.frmReg4.amount.value == 0) ) {
			alert ("Cash Error! \n Amount Must Not Be Empty")
			return false
		}
		else if((document.frmReg4.debt_id.value == 0)) {
			alert ("Customer Error! \n No Customer Selected")
			return false
		}
		else {
			document.frmReg4.action="debtors?pg=9"
			document.frmReg4.method = "post";
			document.frmReg4.submit() 
		}
		 	
	}
</script>

