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
			$bno = count($oqn);
			$xdate = date("Y/m/d");
			
			for($i=0; $i < $bno; $i++){
				$nq = (int)$nqn[$i];
				if($nq > 0){
					$oq = (int)$oqn[$i];
					$bkid = (int)$bid[$i];
					if($oq >= $nq){
						$nquantity = $oq - $nq;
						mysqli_query($db, "UPDATE items SET quantity='$nquantity' WHERE iid = '$bkid'") or die(mysqli_error($db));
						$sql= "insert into items_update SET item_id='$bkid', oldq='$oq', newq='$nq', user='$xID', status='Removed', xdate= '$xdate'";
						$result=mysqli_query($db, $sql) or die(mysqli_error($db));
						$description = "item_id=".$bkid. ", Quantity Removed ".$nq;
						logs("Item Removed",'items Table',$description,$xID,$xdate);
							$sql= "<b>Operation was Successful: Items Updated<b>";
							echo "
							<script language='javascript'>
								location.href='remove_items?sql=$sql&pg=2'
							</script>
							";
					}
					else{
						$select_content1=("select * from items WHERE iid='$bkid'");
						$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
						$content1 = mysqli_fetch_assoc($content_result1);
						$num_chk1 = mysqli_num_rows ($content_result1);
						$item = ($content1["item"]);
						echo "
							<script language='javascript'>
								alert('$item could not be Remove!  The quantity Remove is greater then what that is in the store')
							</script>
							";
					}
				}
			}
			
		}
?>


<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Remove/Delete Items</h3>
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
           
            
			<div class="block">       
			
							<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                   
							<table class="data display datatable" id="example">
								<thead>
								<tr>
                                	<th>S/N</th>
									<th>Item</th>
									<th>Old Quantity</th>
                                    <th>New Quantity</th>
                                     <!--<th>&nbsp;</th>-->
								</tr>
								</thead>
								<tbody>
			
			
							<?php
								$select_content=("select * from items where cat_id = '$txts' order by item desc");
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
								<tr bgcolor="<?php echo $color ?>" height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';">
                                	<td><?php  echo $k?></td>
									<td><?php  echo $content['item']?></td>
									<td><input name="oqua[]" id="oqua[]" type="text" readonly value="<?php  echo ucfirst($content['quantity'])?>" size="20" /></td>                                
                                    <td> <input name="nqua[]" type="text" />
                                    <input name="bid[]"  type="hidden" value="<?php echo $content['iid'] ?>" />
                                    </td>  
                                    <!--<!--<td width="8%" align="center"><a href="items?id=<?php  echo ($content ['iid'])?>&pg=6&pg=6&pcode=<?php  //echo ($content ['image'])?>" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>-->-->
								</tr>                                                 
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
                        
                        

			<?php 
				}
			?>
			</tbody>
			</table>
            <table>
            	<tr>
                	<td colspan="4" style="padding-top:20px"> <input  type="submit" class="btn btn-primary" value="Remove Stock" /> </td>
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
			document.frmReg.action="remove_items?pg=1"
			document.frmReg.method = "post";
			document.frmReg.submit() 
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

