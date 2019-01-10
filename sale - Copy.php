<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];
if($_GET['pg'] == ""){
	$var1 = mt_rand(1,10);
	$var2 = mt_rand(1,10);
	$var3 = mt_rand(1,10);
	$var4 = mt_rand(1,10); 
	$_SESSION["transID"] = $var3.time().$var1.$var4;
	$_SESSION["id"] = $_POST['customer'];
}
?>

<?php
	$pg = $_GET['pg'];
	$pv = $_GET['pv'];
	$sql = $_GET['sql'];
?>

<?php
	if ($pg == 2)
			{
			$_SESSION["id"] = $_POST['customer'];
			if($_GET['id'] != ""){
				$txtID =$_GET['id']; 
				$select_content1=("select * from items WHERE iid ='$txtID'");
			}
			else {
			 	$txtID =$_POST['search'];	//exit;
				$customer =$_POST['customer']; 
				$select_content1=("select * from items WHERE iid ='$txtID'");
			}
			
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			if ($num_chk1 == 0)
				{
					$sql= "<b>Item not found: Invalid item search<b>";
				}
			else
				{
			$item2 = $content1['item'];
			$quantity2 = $content1['quantity'];
			$price2 = $content1['price'];
			$saleprice2 = $content1['saleprice'];
			$item_status = $content1['item_status'];
			$pic = "uploads/shopitem/".$content1['image'];
			$_SESSION["idno"] = $content1['iid'];
			}
		}
?>

<?php
	if($pg == "1"){
		$select_content1=("select * from items WHERE iid='$TXTid'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$num_chk1 = mysqli_num_rows ($content_result1);
	}
?>

<?php
	if ($pg == 7)
	{
		$_SESSION["id"] = $_POST['customer'];
		$item = $_POST['item'];
		$price = $_POST['price'];
		$item_id = $_POST['item_id'];
		$quantity = $_POST['quantity'];
		$quantityT = $_POST['quantity2'];
		$saleprice = $_POST['saleprice'];
		$user = $_POST['user'];
		$transID = $_SESSION["transID"];
		$customer =$_POST['customer']; 
		$xdate = date("Y-m-d");
		$sprice =$_POST['sprice']; 
		$item_status =$_POST['item_status'];
		
		if($item_status == 1){
			$select_content1=("select SUM(quantity) as totalQuantity from cart WHERE transID ='$transID' and item_id = '$item_id'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
				
			$total = $content1["totalQuantity"] + $quantity;
		}
		else{
			$total = $sprice;
		}
		
		if($item_status == 1){
			if($total <= $quantityT){
				mysqli_query($db, "insert into cart SET item='$item', item_id = '$item_id', price='$price', soldprice='$saleprice', quantity='$quantity', transID='$transID', xdate='$xdate', user='$xID', status ='$item_status' ") or die(mysqli_error($db));
			}
			else{
				$item2 = $_POST['item'];
				$quantity2 = $_POST['quantity2'];
				$price2 = $_POST['price'];
				$saleprice2 = $_POST['saleprice'];
				$pic = $_POST['img'];
				$_SESSION["idno"] = $_POST['item_id'];
				
				echo '
					<script language="javascript">
						alert("Out ouf stock! The entered quantity is out of the stock")
					</script>
					';	
			}
			
		}
		else{
			mysqli_query($db, "insert into cart SET item='$item', item_id = '$item_id', soldprice='$sprice', transID='$transID', xdate='$xdate',   user='$xID' ") or die(mysqli_error($db));
		}
			
	}
?>

<?php
	if ($pg == 6)
	
		{
			$TXTid = $_GET['id'];
			mysqli_query($db, "delete from cart where cart_id = '$TXTid' ") or die(mysqli_error($db)) ;
			$_SESSION["id"] = $_POST['customer'];
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
                <h3>Sales</h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                	<a href="dashboard" class="btn btn-sm btn-success" style="margin-top:6px"><i class="fa fa-home"></i> Dashboard</a>
                 	<?php //include("menu.php");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" > 
                <form method="post" action="?pg=2" name="frmSearch">
                 <div class="x_title">
                    <select name="customer" id="customer" class="select2_group form-control"  tabindex="-1">
                        <option value="">--Select Customer</option>
                        <?php
							$id = $_SESSION["id"];
                            $query = mysqli_query($db, "select * from customers") or die(mysqli_error($db));
                        	while ($row = mysqli_fetch_array($query)) {
                           // $id = $row['cid'];
                          ?>
                        <option value="<?php echo $row['cid'] ?>" <?php if($row['cid'] == $id){?> selected="selected" <?php ; } ?>><?php echo $row['name']." (". $row['idno'] .")"?></option>
                         <?php } ?>
                    </select>
			 	
				<div class="clearfix"></div>
            </div>
            <div class="x_content">
        	
              <table style="width:100%">
                  <tr>
                      <td style="padding-right:20px; font-weight:bold; font-size:18px">Search for Item:  </td>
                      <td style="padding-right:40px">
                      	<select name="search" id="search" class="select2_group form-control"  tabindex="-1">
                            <option value="">--Select Item</option>
                            <?php
                                 if($classv == ""){
                                     $select_content2=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by item asc");
                                 }else{
                                    $select_content2=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id where class='$classv' order by item asc");
                                 }
                                  $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                  $content2 = mysqli_fetch_assoc($content_result2);
                                  $num_chk2 = mysqli_num_rows ($content_result2);
                                  $k = 0
                              ?>
                            <?php do { 	?>
                            <option value="<?php echo  $content2['iid']?>" <?php if($content2['iid'] == $txtID){?> selected="selected" <?php } ?>><?php echo $content2['item']." (". $content2['category'] .")"?></option>
                            <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                          </select>
                      </td>
                      <td > <input  type="submit" class="btn btn-primary" value="Load items" onClick="return laoditems();" /></td>
                  </tr>
              </table>
            </form>
            <?php
				if ($pg != "")			
						{
			?>
				<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                    <table style="width:100%" >
                    <form method="post" action="?pg=7" name="frmReg" onSubmit="return checkmate()" >
                    <tr>
                     	<td style="border-bottom:1px solid" colspan="3"><font face="verdana" style="font-size: 12px; color:#000000"><strong><?php echo $item2 ?> Information</strong>  </font>
                            <input type="hidden" name="item_id" value="<?php echo $_SESSION["idno"] ?>"/>
                            <input type="hidden" name="item" value="<?php echo $item2 ?>" readonly style="border:0"/>
                        </td> 
                            
                    </tr>
                    
                    <tr>
                        <td valign="top"  style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699"><font face="verdana" style="font-size: 11px; color:#000000"><b>Price</b></font></td>
                        <td style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699; border-right:1px solid #336699; font-size:16px; height:30px; padding-left:10px" valign="top">
                        <?php if($item_status == 1){ ?>
                       <input type="hidden"  name="price" value="<?php echo $price2 ?>" readonly style="border:0; width:250px"/>
                       N <input type="text"  name="saleprice" value="<?php echo $saleprice2 ?>" readonly style="border:0px"/>
                       <?php } else{ ?>
                       There's No Fixed Price 
                       <?php } ?>
                        </td>
                        <td valign="middle" align="center" rowspan="3"  style="background:#E6F2FB; vertical-align:middle" width="15%">  
                            <img src="<?php echo $pic; ?>" width="100px" height="100px" />   
                            <input type="hidden"  name="img" value="<?php echo $pic ?>"/>
                         </td> 
                    </tr>
                    
                     <tr>
					 <?php if($item_status == 1){ ?>
                        <td valign="top"  style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699">
                        
                        <font face="verdana" style="font-size: 11px; color:#000000; height:40px"><b>Remaining Quantity</b></font></td>
                        <td style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699; border-right:1px solid #336699; height:30px; padding-left:10px" valign="top">
                            <input type="text" class="form-control" name="quantity2" value="<?php echo $quantity2 ?>" readonly style="border:0"/>
                        </td>
                        <?php } else{ ?>
                       <td valign="top"  style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699">
                        
                        <font face="verdana" style="font-size: 11px; color:#000000; height:40px"><b>Quantity</b></font></td>
                        <td style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699; border-right:1px solid #336699; height:30px; padding-left:10px; font-size:16px" valign="top">Quantity Not Stated
                        </td> 
                       <?php } ?>
                    </tr>
                    
                    <tr>
                    <input type="hidden" name="item_status" value="<?php echo $item_status; ?>" />
                    <?php if($item_status == 1){ ?>
                        <td  style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699"><font face="verdana" style="font-size: 11px; color:#000000"><b>Quantity</b></font></td>
                        <td style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699; height:40px; padding-left:10px; padding-top:5px">
                          <input type="text"  name="quantity" value="" autocomplete="off" autofocus type="number" style="height:30px; font-size:18px; font-weight:bold; width:250px" name="quantity" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" required="required"/>	<input  type="submit" class="btn btn-dark" value=" Add to Cart " />
                        </td>
                    <?php } else{ ?>
                    	<td  style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699"><font face="verdana" style="font-size: 11px; color:#000000"><b>Selling Price</b></font></td>
                        <td style="border-top:0px solid #336699; border-bottom:1px solid #336699; border-left:1px solid #336699; height:40px; padding-left:10px; padding-top:5px">
                          <input type="text" required name="sprice" value="" autocomplete="off" autofocus style="font-size:18px; width:120px; height:35px; padding-top:5px" onKeyDown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" />	<input  type="submit" class="btn btn-dark" value=" Add to Cart " />
                    <?php } ?>
                   </tr>
                   
                   </form>
                  <tr>
                      <td valign="top" colspan="3" style="color:#FF0000;font-family:Arial, Helvetica, sans-serif; padding-top:10px">
                          <table style="background:#CCCCCC; width:100%" >
                              <tr><td style="color:#000; font-weight:bold; padding-left:5px" width="30%">
                                CART HISTORY (Transaction ID: <?php echo $_SESSION["transID"] ?>)
                              </td>
                              <td style="color:#000; font-weight:bold; font-size:16px;font-weight:bold;"  align="right" width="70%">
                                   <form method="post" action="?pg=" name="frmReg3" onSubmit="return println2()" >
                                    <table style=" width:100%; margin:0px; padding:10px; color:#000" >
                                        <tr>
                                            <td width="20%" align="right"> Total: N <?php  
												$transID = $_SESSION["transID"];
												$select_content=("select * from cart where transID = '$transID'");
												$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
												$content = mysqli_fetch_assoc($content_result);
												$num_chk = mysqli_num_rows ($content_result);
												$sumTotal =0 ;
												do{
													if ($content['status'] == 1){
														$total = $content['soldprice'] * $content['quantity'];
														$sumTotal += $total;
													}
													else{
														$total = $content['soldprice'];
														$sumTotal += $total;
													}
												} while ($content = mysqli_fetch_assoc($content_result)); 
												echo $sumTotal ?>
                                            	<input type="hidden"  name="total" value="<?php echo $sumTotal ?>"/>
                                            </td>
                                            <td width="35%" align="right" style="padding:5px;"> CASH Paid: 
                                            <input type="text"  name="cash" value="" autocomplete="off" autofocus style="font-size:18px; width:120px; height:35px; padding-top:5px" onKeyDown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                                              </td >
                                              <td width="20%" valign="bottom">
                                                <select name="mode" id="mode" style="font-size:14px; width:125px; height:35px; padding-top:5px">
                                                <option value="">Payment Mode</option>
                                                <option value="cash">Cash</option>
                                                <option value="pos">POS</option>
                                                <option value="debt">Debt</option>
                                                </select>
                                               </td >
                                              <td width="10%" style="color:#000; font-weight:bold; padding:5px; padding-right:5px; margin-top:0"  align="right">
                                                   <input  type="submit" class="btn btn-primary" value=" Make Payment " /> 
                                              </td>
                                        </tr>
                                                 
                                    </table>     
                                    </form>  
                              </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  
                  </table>
                	
   				
					 <table class="table table-striped responsive-utilities jambo_table" >
					  <?php
					  	$transID = $_SESSION["transID"];
						$select_content=("select * from cart where transID = '$transID' order by cart_id desc");
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0;
						$sumTotal =0 ;
						?>
						<?php
						if ($num_chk == 0)
						{
						?>
								  <tr height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';" bgcolor="#EFEFEF">
									  <td colspan="4" class="smallxnormal" align="left">No Record Found</td>
								  </tr>	
						<?php
						}
												
						else
						{
							
						?>
                        
                        <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Item</th>
                              <th>Quantity</th>
                              <th>Amount</th>
                              <th>Total</th>
                              <th>Remove</th>
                          </tr>
                          </thead>
                          <tbody>
                        
						<?php do { 
						$color = "#f5f5f5";
						$x < $num_chk;
						$x=$x+1;
						
						if($x%2 == 0)
						{
						$color = "#ffffff";
						}
						
						$k = $k + 1;
						?>
                          <tr>
                             <td > <?php echo $k  ?> </td>
                              <td > <?php  echo ucfirst($content['item'])?>  </td>
                              <td ><?php  if($content['status'] == 1) echo ucfirst($content['quantity'])?>	 </td>
                              <td ><?php  echo ucfirst($content['soldprice'])?>	 </td>
                              <td ><?php  if($content['status']  == 1) echo $total = $content['soldprice'] * $content['quantity'];
							  				else echo $total = $content['soldprice'];?>	 </td>
                  			  <td align="center"><a href="sale?id=<?php  echo ($content ['cart_id'])?>&pg=6&pcode=<?php  echo ($content ['image'])?>" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
              </tr>
			<?php 
					$sumTotal += $total;
				} while ($content = mysqli_fetch_assoc($content_result)); ?>
            
            
			<?php 
				}
			?>
			</tbody>
			</table>
            <form method="post" action="?pg=" name="frmReg2" onSubmit="return println()" >
            <table style="font-size:20px; width:100%; font-weight:bold; margin-top:0px; padding-top:10px">
                <tr>
                    <td width="10%">Total</td>
                    <td width="10%" align="right"> N <?php  echo $sumTotal ?>
                    <input type="hidden"  name="total" value="<?php echo $sumTotal ?>"/>
                    <input id="custID"  name="custID" type="hidden">
                      </td>
                      <td width="50%" align="right"> CASH Paid: 
                    <input type="text"  name="cash" value="" class="form-control" autocomplete="off" autofocus style="font-size:18px; width:150px; height:35px" onKeyDown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                    </td>
                    <td width="20%" valign="middle">
                    <br>
                    <select name="mode" id="mode" class="form-control">
                    <option value="">Payment Mode</option>
                    <option value="cash">Cash</option>
                    <option value="pos">POS</option>
                    <option value="debt">Debt</option>
                    </select>
                      </td >
                      <td width="10%" style="color:#FFF; font-weight:bold; padding:5px "  align="right"><br>
                           <input  type="submit" class="btn btn-primary" value=" Make Payment " /> 
                      </td>
                </tr>
                <tr>               
            </table>     
            </form>   
            		
     	<?php
			}
			?>
   </div>
 </div>
 </div>
 </div>
<?php include("includes/footer.php") ?>

<script language='javascript'>
	function println() {
		if(eval(document.frmReg2.total.value  == 0)) {
			alert ("Cart Error! \n No Item in the Cart")
			return false
		}
		else if((document.frmReg2.mode.value  == 0)) {
			alert ("Cart Error! \n Payment Mode Not Specified")
			return false
		}
		else if((document.frmReg2.mode.value == 'debt') && (document.frmSearch.customer.value == '')){
			alert ("Select Customer")
			return false
		}		
		else{
			if((document.frmReg2.cash.value) < (document.frmReg2.total.value)) {
						
				if (confirm("Paying Cash is Less Than Purchasing Amount \n Do you wish to continue?")) {
						
					newWindow=window.open('receiptprint.php?pg=<?php echo $_SESSION["transID"]?>&cash='+document.frmReg2.cash.value+'&custID='+document.frmSearch.customer.value+'&pmode='+document.frmReg2.mode.value,'','width=300px,height=580px')
					newWindow.focus();
					return true
				}
				else{
					return false;	
				}
			}
			else{
				newWindow=window.open('receiptprint.php?pg=<?php echo $_SESSION["transID"]?>&cash='+document.frmReg2.cash.value+'&custID='+document.frmSearch.customer.value+'&pmode='+document.frmReg2.mode.value,'','width=300px,height=580px')
				newWindow.focus();				
			}
		}
	}
	
	function println2() {
		if(eval(document.frmReg3.total.value == 0) ) {
			alert ("Cart Error! \n No Item in the Cart")
			return false
		}
		else if((document.frmReg3.mode.value == 0)) {
			alert ("Cart Error! \n Payment Mode Not Specified")
			return false
		}
		else if((document.frmReg3.mode.value == 'debt') && (document.frmSearch.customer.value == '')){
			alert ("Select Customer")
			return false
		}
		 		
		else{
			
			if((document.frmReg3.cash.value) < (document.frmReg3.total.value)) {
						
				if (confirm("Paying Cash is Less Than Purchasing Amount \n Do you wish to continue?")) {
						
					newWindow=window.open('receiptprint.php?pg=<?php echo $_SESSION["transID"]?>&cash='+document.frmReg3.cash.value+'&custID='+document.frmSearch.customer.value+'&pmode='+document.frmReg3.mode.value,'','width=300px,height=580px')
					newWindow.focus();
					return true
				}
				else{
					return false;	
				}
			}
			else{
				newWindow=window.open('receiptprint.php?pg=<?php echo $_SESSION["transID"]?>&cash='+document.frmReg3.cash.value+'&custID='+document.frmSearch.customer.value+'&pmode='+document.frmReg3.mode.value,'','width=300px,height=580px')
				newWindow.focus();				
			}
		}
	}
</script>

<script language="javascript">
function checkmate() {
	if(document.frmReg.quantity2.value == ""){
		alert ("Select ITEM! \n Select an item to add")
		document.frmSearch.search.focus();
		return false
	}
/*	if(eval(document.frmReg.quantity.value) > eval(document.frmReg.quantity2.value)) {
		alert ("Insufficient Item! \n The Quantity is greater then stock in the shop")
		document.frmReg.quantity.focus();
		return false
	}*/
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

<script type="text/javascript">
	$(document).ready( function() {
		$('.btn-danger1').click( function() {
			var id = $(this).attr("id");
			document.frmReg3.custID.value =$(this).attr("id");
			document.frmReg2.custID.value =$(this).attr("id");
			mypath='id='+id;
			$.ajax({
				url:'getname.php',
				data:mypath,
				cache:false,
				success:function(resps){
					$('#showName').html(resps);
					return false;
				}
			});
			return false;
		});				
	});
</script>