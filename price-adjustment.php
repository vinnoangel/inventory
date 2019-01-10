<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	
	if($pg == ""){
		$date = date("Y-m-d");
		$_SESSION["txts"] = "";
	}
	elseif($pg == 1 or $pg == 5){
		$_SESSION["txts"] = $_POST['txtsearch'];
	}
	$txts = $_SESSION["txts"] ;
?>
<?php
	if ($pg == 5)
		{
			$oqn = $_POST["oqua"];
			$nqn = $_POST["nqua"];
			$bid = $_POST["bid"];
			$old_saleamt = $_POST["old_saleamt"];
			$saleprice = $_POST["saleamt"];
			$bno = count($oqn);
			$xdate = date("Y/m/d");
			$cost = $_POST["cost"];
			for($i=0; $i < $bno; $i++){
				$nq = (int)$nqn[$i];
				$costvalue = (int)$cost[$i];
				$oldsalevalue = (int)$old_saleamt[$i];
				$salevalue = str_replace(",", "", $saleprice[$i]); 
				if($salevalue > 0 and $salevalue != $oldsalevalue){
					$oq = (int)$oqn[$i];
					$bkid = (int)$bid[$i];
					$nquantity = $oq + $nq;
					
					mysqli_query($db, "UPDATE items SET  saleprice='$salevalue' WHERE iid = '$bkid'") or die(mysqli_error($db));
					$sql= "insert into items_update SET item_id='$bkid', oldq='$nq', newq='$nq', cost='$costvalue', oldsellingprice='$oldsalevalue', saleprice='$salevalue', status='price_Adjustment', user='$xID', udate= '$xdate'";
					$result=mysqli_query($db, $sql) or die(mysqli_error($db));
					$sql= "<b>Operation was Successful: Items Updated<b>";
					echo "
					<script language='javascript'>
						location.href='price-adjustment?sql=$sql&pg=2'
					</script>
					";	
				}
			}
			
		}
?>


<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Price Adjustment</h3>
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
                <form method="post" action="?pg=5" name="frmReg" onsubmit="return markStudents()">
                <div class="x_title">
        	
                  <table >
                      <tr>
                        <td>Category: </td>
                          <td style="padding-right:40px"> 
                                <select name="txtsearch" id="txtsearch" class="form-control" style="width:305px;">
                                    <option value="">--Select Category</option>
                                      <?php
                                          $select_content2=("select * from categories order by category asc");
                                          $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                          $content2 = mysqli_fetch_assoc($content_result2);
                                          $num_chk2 = mysqli_num_rows ($content_result2);
                                          $k = 0
                                      ?>
                                      <?php do { 	?>
                                          <option value="<?php echo  $content2['cid']?>" <?php if($content2['cid'] == $txts){?> selected="selected"<?php }?>><?php echo  $content2['category']?></option>
                                                                                      
                                      <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                 </select>
                          </td>
                          
                          <td > <input  type="button" class="btn btn-primary" value="Load Items" onclick="return laodstudents();" /></td>
                      </tr>
                  </table>
            	<div class="clearfix"></div>
            </div>
            <div class="x_content">
            <?php
				if ($pg != "")
				
						{
			?>
          		 <table class="table table-striped responsive-utilities jambo_table">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>New Selling Price</th>
                    </tr>
                    </thead>
                    <tbody>
			
			
							<?php
								$select_content=("select * from items where cat_id = '$txts' and item_status='1' order by item desc");
								$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
								$content = mysqli_fetch_assoc($content_result);
								$num_chk = mysqli_num_rows ($content_result);
								$k = 0;
						?>
						<?php
						if ($num_chk == 0)
							{
						?>
								<tr height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';" bgcolor="#EFEFEF">
									<td colspan="4"  align="center">No Record Found</td>
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
                        <input name="bid[]"  type="hidden" class="form-control" value="<?php echo $content['iid'] ?>" />
								<tr>
                                	<td><?php  echo $k?></td>
									<td><?php  echo $content['item']?></td>
									<td><input name="oqua[]" id="oqua[]" class="form-control" type="text" readonly value="<?php  echo ucfirst($content['quantity'])?>" size="5" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" /></td>                                
                                    <td> <input name="cost[]" type="text" value="<?php echo $content['price'] ?>" size="5" readonly class="form-control" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" /> </td>  
                                    <td> <input name="old_saleamt[]" size="5" readonly type="text" value="<?php echo $content['saleprice'] ?>" class="form-control" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" /> </td>  
                                    <td> <input name="saleamt[]" type="text" value="" class="form-control number" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" /> </td>                                                  
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
                        
                        

			<?php 
				}
			?>
			</tbody>
			</table>
            <table>
            	<tr>
                	<td colspan="4" > <input  type="submit" class="btn btn-dark" value="Update Stock" /> </td>
                </tr>
            </table>
            
	 
     	<?php
			}
			?>
     </form>
     	</div>
     </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

<script language="javascript">
	function laodstudents(){
		if(document.frmReg.txtsearch.value == "") {
			alert ("Please select Category to update")
			document.frmReg.txtsearch.focus();
			return false
		}
		else{
			document.frmReg.action="price-adjustment?pg=1"
			document.frmReg.method = "post";
			document.frmReg.submit() 
		}
	}
</script>

