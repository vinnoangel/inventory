<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
require_once ('connection.php');
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = $_GET['pg'];
	$pv = $_GET['pv'];
	$sql = $_GET['sql'];
?>



<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			mysqli_query($db, "delete from categories where cid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:categories?sql=$sql");
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from categories WHERE cid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
	$select_content10=("select * from systemusers WHERE id='$xID'");
	$content_result10= mysqli_query($db, $select_content10) or die (mysqli_error($db));
	$content10 = mysqli_fetch_assoc($content_result10);
	$num_chk10 = mysqli_num_rows ($content_result10);
?>


<?php include("header.php"); ?>
	<div class="clear">
	</div>
	
	<div class="grid_12">
		<div class="box round first">
			<h2> 
                Categories <a href="categories?pg=1" style="text-decoration:none" title="Add New category"> 
                <br/> <img src="images/add.gif" /></a>  <?php if($sql != "") echo $sql ?>
            </h2>
			<div class="block">
		
			
			<?php
			
				if ($pg == "")
				
						{
			
			?>
							<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
							<table class="data display datatable" id="example">
								
			
			
			<?php
						$select_content=("select * from categories  order by category asc");
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
                            <th>Category</th>
                            <th>Created/Edited</th>
                            <th>Date Created</th>
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
								<tr bgcolor="<?php echo $color ?>" height="23" onMouseOver="this.style.backgroundColor='#FFCC66';" onMouseOut="this.style.backgroundColor='';">
									<td><?php echo $k  ?></td>
                                    <td><?php  echo $content['category']?></td>
                                    <td><?php  echo $content10['userName']?></td>
									<td><?php  echo ucfirst($content ['xdate'])?></td>
									
									
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			<?php
			}
			?>
			</tbody>
			</table>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

