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
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from items WHERE iid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			$pcode = $_GET['pcode'];
			if($pcode != ""){
				$file = "uploads/$pcode";
				unlink($file);
			}
			mysqli_query($db, "delete from items where iid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:items.php?sql=$sql");
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
                <h3>Best Seller</h3>
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
						$select_content=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by item asc");
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0;
						$total = 0;
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
									<th>Items Name</th>
                                    <th>Quantity</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						$TXTid = $content['iid'];
						$select_content1=("select * from batcheditem WHERE item_id='$TXTid'");
						$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
						$content1 = mysqli_fetch_assoc($content_result1);
						$num_chk1 = mysqli_num_rows ($content_result1);
						$k = $k + 1;
						?>
                            <tr>
                                <td><?php echo $k  ?></td>
                                <td><?php  echo $content['category']?></td>
                                <td><?php  echo $content['item']?></td>
                                <td><?php  echo $content['quantity']+ $content1["newq"]?></td>
                            </tr>
						 <?php 
						 $total += $content['quantity'];
						 } while ($content = mysqli_fetch_assoc($content_result)); ?>
                         
                        <tr style="font-weight:bold">
                            <td>Total:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                 <?php echo $total ?>
                            </td>
                        </tr>
            	</tbody>
			</table>
			<?php
			}
			?>
			
	 </div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>