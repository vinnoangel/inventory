<?php require_once("includes/session.php"); 
$xID = $_SESSION["ustcode"];
$xdate = date("Y-m-d");
?>

<?php
if($_POST["mode"]=="addToCart"){
?>
	 <tr class="del<?php echo $_POST["item_id"] ?>">
          <td > <input name="citem[]"  type="text" value="<?php  echo $_POST["item"] ?>" readonly style="border:0px"/>  </td>
          <td ><input name="cquantity[]"  type="text" value="<?php echo $_POST["quantity"] ?>" readonly style="border:0px"/></td>
          <td ><input name="cprice[]"  type="text" value="<?php if($_POST['item_status']  == 1){ echo $_POST["saleprice"]; }else echo "Not Fixed"; ?>" readonly style="border:0px"/></td>
          <td ><input name="ctotalAmt[]"  type="text" value="<?php echo $_POST['totalamount'] ?>" readonly style="border:0px"/></td>
         <td><a class="btn btn-danger" onClick="return deleteAction(<?php echo $_POST["item_id"]; ?>)">Remove</a></td>
         <input name="citem_id[]"  type="hidden" value="<?php echo $_POST["item_id"] ?>" />
         <input name="citem_status[]"  type="hidden" value="<?php echo $_POST["item_status"] ?>" />
      </tr>
<?php 
}

if($_POST["mode"]=="addServiceToCart"){
?>
	 <tr class="del<?php echo $_POST["item_id"] ?>">
          <td > <input name="citem[]"  type="text" value="<?php  echo $_POST["item"] ?>" readonly style="border:0px"/>  </td>
          <td ><input name="cquantity[]"  type="text" value="<?php echo $_POST["quantity"] ?>" readonly style="border:0px"/></td>
          <td ><input name="ctotalAmt[]"  type="text" value="<?php echo $_POST['totalamount'] ?>" readonly style="border:0px"/></td>
         <td><a class="btn btn-danger" onClick="return deleteAction(<?php echo $_POST["item_id"]; ?>)">Remove</a></td>
         <input name="citem_id[]"  type="hidden" value="<?php echo $_POST["item_id"] ?>" />
         <input name="citem_status[]"  type="hidden" value="<?php echo $_POST["item_status"] ?>" />
      </tr>
<?php 
}
if($_POST["mode"]=="getHistroy"){
	$customerid = $_POST["customerid"];
	$select_content=("select * from customers WHERE cid='$customerid'");
	$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
	$content = mysqli_fetch_assoc($content_result);
	$num_chk = mysqli_num_rows ($content_result);
	$name = $content['name'];
?>

	<h3><?php echo $name?>'s Transaction</h3>
    <table class="table table-striped responsive-utilities jambo_table" id="example">
        <?php
        $select_content=("select * from paymenthistory where custID = '$customerid' order by xdate desc");
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
                    <td colspan="5"  align="center">No Transaction Yet</td>
                </tr>	
    <?php
    }
        else
    {
    ?>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction ID</th>
                    <th>Transaction</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Debt</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
    <?php do { 
                $k = $k + 1;
                
        ?>
                <tr>
                    <td><?php  echo $content['xdate']?></td>
                    <td><?php  echo $content['transID']?></td>
                    <td><?php  echo $content['transactions']?></td>
                    <td><?php if($content['transtype'] == 1){ echo "Sales";} else {echo "Order";}?></td>
                    <td><?php  echo formatMoney($content['amt'],true)?></td>
                    <td><?php  
						$transID = $content['transID'];
						$select_content2=("select * from debtors WHERE transID='$transID'");
						$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
						$content2 = mysqli_fetch_assoc($content_result2);
						if($content2["bal"] > 0){ echo formatMoney($content2['bal'],true); } else{ echo "NO";}?>
                    </td>
                    <td> <a href="transaction?id=<?php echo ($content ['sale_id'])?>&pg=1" target="_parent"  class="btn btn-dark"><i class="fa fa-search"></i></a></td>
                </tr>
         <?php
          } while ($content = mysqli_fetch_assoc($content_result)); 
          
    }
          ?>
          
        </tbody>
    </table>
    
    
<?php 
}
?>