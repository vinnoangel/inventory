<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];
$var1 = mt_rand(1,10);
$var2 = mt_rand(1,10);
$var3 = mt_rand(1,10);
$var4 = mt_rand(1,10); 
$transID = $var3.time().$var1.$var4;

 	$transID = "O".$transID;
	$cash = str_replace(",", "", $_POST["cash"]);
	$custID = $_POST["customer"];
	$pmode = $_POST["mode"];
	$deliverdate =date("Y-m-d", strtotime($_POST["deliverdate"]) );
	
	$tid = $_POST["citem_id"];
	$citem = $_POST["citem"];
	$cprice = $_POST["cprice"];
	$cquantity = $_POST["cquantity"];
	$ctotalAmt = $_POST["ctotalAmt"];
	$citem_status = $_POST["citem_status"];
	$no = count($tid);

	$select_content2 =("select * from company");
	$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
	$content2 = mysqli_fetch_assoc($content_result2);
	$num_chk2 = mysqli_num_rows ($content_result2);

?>

<table style="border:0px solid;" cellspacing="0" cellpadding="3" width="100%">
     <tr height="25px">
        <td colspan="3" align="center" ><font face="verdana" style="font-size: 11px; color:#ffffff; text-align:center"  ><a href="javascript:print();" style="color:#000; text-decoration:none; ">
        	 <img src="logos/<?php echo $content2["logo"]; ?>" width="100px" height="70px"><br />
            <strong>
                 <?php echo $content2["sname"]; ?>
            </strong>
            </a>
        </font>
    </td>
    </tr>
    <tr>
        <td style="border-top:0px solid #336699;" valign="top" colspan="3">
            <font face="verdana" style="font-size: 9px; color:#000000; text-align:center">
                <?php echo $content2["address"]; ?>
            </font>
        </td>
    </tr>
    <tr>
        <td  style="padding-top:20px; padding-bottom:20px; font-size:10px; font-weight:bold;"> Transaction ID: &nbsp;&nbsp; <?php echo $transID ?> &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo date("d-m-Y h:m:s") ?></td>
    </tr>
 </table>
 
<table  cellspacing="0" cellpadding="3" width="100%" style="border:#000 solid 1px; font-size:11px;">
	
	<?php 
	$itemnames = "";
	$qtys = "";
	for($i=0; $i < $no; $i++){
		$item_id = (int)$tid[$i];
		$item = $citem[$i];
		$price = str_replace(",", "", $cprice[$i]);
		$soldprice = str_replace(",", "", $ctotalAmt[$i]) ;
		$quantity = (int)$cquantity[$i];
		if($item_id > 0){
			$user = $content1['user'];
			$status = (int)$citem_status[$i];
			
			$xdate = date("Y-m-d");
			
			$select_content2=("select * from services WHERE iid ='$item_id'");
			$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
			$content2 = mysqli_fetch_assoc($content_result2);
			$num_chk2 = mysqli_num_rows ($content_result2);
			if($num_chk2 > 0){
				//if($content2["quantity"] >= $quantity){
					$q = $content2["quantity"];
					$nq = $content2["quantity"] - $quantity;
					//mysqli_query($db, "UPDATE items SET `quantity` = '$nq' WHERE iid = '$item_id'");
					
					mysqli_query($db, "insert into ordertable SET customer_id='$custID', item='$item', item_id = '$item_id', price='$price', quantity='$quantity', soldprice='$soldprice', transID='$transID', deliverdate='$deliverdate', xdate='$xdate', user='$xID' ") or die(mysqli_error($db));
					if($quantity == 0 || $quantity == '') $quantity = 1;
					$qtyss .= $item.'='.$quantity.', ';
					$itemnames .= $item.', ';
				?>	
					 <tr>
						<td width="80%" valign="top"><?php echo $item." ".$quantity ?> </td>
						<td><?php echo $total = $soldprice ?> </td>
					</tr>             
				<?php
					$sumTotal += $total;
			}
		}
		
		else{
			$sql= "<b>Record Not inserted<b>";
		}
	?>
       
   <?php    }  ?>
</table>
<?php
	$bal = $cash - $sumTotal;
	$itemname = substr($itemnames,0,-2);
	$qtys = substr($qtyss,0,-2);
	mysqli_query($db, "insert into paymenthistory SET custID='$custID', transactions='$qtys', transtype='2', amt='$sumTotal', paid = '$cash', bal='$bal', transID='$transID', xdate='$xdate', user='$xID', payment_status ='$pmode' ") or die(mysqli_error($db));
	
	$balance = $sumTotal - $cash;
	if($balance > 0){
		mysqli_query($db, "insert into debtors SET customer_id ='$custID', total_amount='$sumTotal', paid = '$cash', bal='$balance', transID='$transID', xdate='$xdate', user='$xID', item_name='$itemname', qty='$qtys' ") or die(mysqli_error($db));
	}
	
?>
<table style="border:0px solid; font-size:12px; font-weight:bold" cellspacing="0" cellpadding="3" width="100%" >
	<tr>
        <td width="10%">&nbsp; </td>
        <td width="50%">  Total NGN </td>
        <td width="40%">  <?php echo formatMoney($sumTotal,true) ; ?> </td>
    </tr>
    <tr>
        <td width="10%">&nbsp; </td>
        <td width="50%" > CASH Paid NGN </td>
        <td width="40%">  <?php if($cash == '') echo '0'; else echo formatMoney($cash,true) ; ?> </td>
    </tr>
    <tr>
        <td width="10%">&nbsp; </td>
        <td width="50%">  Balance NGN</td>
        <td width="40%">  <?php echo formatMoney(($cash - $sumTotal),true); //if($cash == '' || ($sumTotal > $cash)) echo $cash - $sumTotal; else echo '0'; ?> </td>
    </tr>
    <tr>
       <td width="10%">&nbsp; </td>
        <td width="50%">  Payment Mode</td>
        <td width="40%">  <?php echo strtoupper($pmode); ?> </td>
    </tr>    
</table>

<table style="border:0px solid;" cellspacing="0" cellpadding="3" width="100%" >
    <tr >
        <td width="100%" style="padding-top:20px; font-size:12px; font-weight:bold; text-align:center"> Thanks for your continued patronage </td>
    </tr>
    <tr>
        <td width="100%"  style="font-size:12px; text-align:center"> <?php echo 'Staff on duty: '.$_SESSION["fullname"] ?></td>
    </tr>
</table>
<script language="javascript" type="text/javascript">	

    //this code handles the F5/Ctrl+F5/Ctrl+R
document.onkeydown = function(){
  switch (event.keyCode){
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
			alert("Ooops! F5 key is disabled");
            return false;
        case 82 : //R button
            if (event.ctrlKey){ 
                event.returnValue = false;
                event.keyCode = 0;
				alert("Ooops! Ctrl + R keys are disabled");
                return false;
            }
    }
}

document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}

/*function my_onkeydown_handler() {
    switch (event.keyCode) {
        case 116 : // 'F5'
            event.preventDefault();
            event.keyCode = 0;
            window.status = "F5 disabled";
			alert("Ooops! F5 key is disabled");
            break;
    }
}*/
document.addEventListener("keydown", my_onkeydown_handler);
</script>