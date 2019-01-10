<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
require_once ('connection.php');
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
	$opt = $_POST['opt'];
?>
<?php
	if ($pg == 5)
		{
			 $oqn = $_POST["oqua"];
			echo  $nqn = $_POST["nqua"];
			 $bid = $_POST["bid"];
			 echo $bno = count($oqn);
			 echo $_POST['txtsearch'];
			$xdate = date("Y/m/d");
			//exit;
			for($i=0; $i < $bno; $i++){
				
				$nq = (int)$nqn[$i];
				if($nq > 0){
					$oq = (int)$oqn[$i];
					$bkid = (int)$bid[$i];
					$nquantity = $oq + $nq;
					mysqli_query($db, "UPDATE items SET quantity='$nquantity' WHERE iid = '$bkid'") or die(mysqli_error($db));
					$sql= "insert into items_update SET item_id='$bkid', oldq='$oq', newq='$nq', user='$xID', xdate= '$xdate'";
					$result=mysqli_query($db, $sql) or die(mysqli_error($db));
						$sql= "<b>Operation was Successful: Changes made<b>";
						echo "
						<script language='javascript'>
							location.href='items_update?sql=$sql&pg=2'
						</script>
						";	
				}
			}
			
		}
?>


<?php include("header.php"); ?>
	<div class="clear">
	</div>
	
	<div class="grid_12">
		<div class="box round first">
        	<h2>
            	<form method="post" action="?pg=5" name="frmReg" onsubmit="return markStudents()">
                	Select Catgory 
                    <select name="txtsearch" id="txtsearch" >
                      <option value="">--Select Category</option>
                      <?php
                            $select_content2=("select * from categories  order by category asc");
                            $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                            $content2 = mysqli_fetch_assoc($content_result2);
                            $num_chk2 = mysqli_num_rows ($content_result2);
                            $k = 0
                        ?>
                       <?php do { 	?>
                      <option value="<?php echo  $content2['cid']?>" <?php if($content2['cid'] == $txts){?> selected="selected" <?php } ?> ><?php echo  $content2['category']?></option>
                      <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                    </select>
                    
                    Select Operation 
                    <select name="opt" >
                      <option value="" >--Select Operation</option>
                      <option value="-" <?php if($opt == "-"){?> selected="selected" <?php } ?> > Minus (-)</option>
                      <option value="+" <?php if($opt == "+"){?> selected="selected" <?php } ?> > Minus (+)</option>
                    </select>
                    
                    <input  type="button" class="btn btn-blue" value="Load Item" onclick="return laodstudents();" />
                    
                </h2>
            <?php
				if ($pg != "")
				
				//		{
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
						$color = "#f5f5f5";
						$x < $num_chk;
						$x=$x+1;
						
							if($x%2 == 0)
								{
									$color = "#ffffff";
								}
								
						$k = $k + 1;
						?>
								<tr bgcolor="<?php echo $color ?>" height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';">
                                	<td><?php  echo $k?></td>
									<td><?php  echo $content['item']?></td>
									<td><input name="oqua[]"  type="text" readonly value="<?php  echo $content['quantity']?>" size="20" /></td>                                
                                    <td> <input name="nqua[]" type="text" />
                                    <input name="bid[]"  type="hidden" value="<?php echo $content['iid'] ?>" />
                                    </td>                                                   
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
                        
                        

			<?php 
				//}
			?>
			</tbody>
			</table>
            <table>
            	<tr>
                	<td colspan="4" > <input  type="submit" class="btn btn-blue" value="Update Book" /> </td>
                </tr>
            </table>
            
	 </div>
     	<?php
			}
			?>
     </form>
   </div>
 </div>
<?php include("includes/footer.php") ?>

<script language="javascript">
	function laodstudents(){
		if(document.frmReg.txtsearch.value == "") {
			alert ("Please select Item shelf/category to update")
			document.frmReg.txtsearch.focus();
			return false
		}
		else if(document.frmReg.opt.value == "") {
			alert ("Please operation to perform")
			document.frmReg.opt.focus();
			return false
		}
		else{
			document.frmReg.action="items_update?pg=1"
			document.frmReg.method = "post";
			document.frmReg.submit() 
		}
	}
</script>

