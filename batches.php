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
if ($pg == 2)
{
	$item_id = $_GET["item_id"];
	$uid = $_GET["id"];
	$select_content1=("select * from items WHERE iid='$item_id'");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	if($content1["quantity"]!= 0){
		echo "
		<script language='javascript'>
			alert('Cannot Transfer! Old stock have not finish')
		</script>
		";	
	}
	else{
		
		$select_content=("select * from batcheditem WHERE uid='$uid'");
		$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
		$content = mysqli_fetch_assoc($content_result);
		 $bkid = $content["item_id"];
		$oq = $content["oldq"];
		$nq = $content["newq"];
		$costvalue = $content["cost"];
		$salevalue = $content["selingprice"];
		$xdate = date("Y/m/d");
		mysqli_query($db, "UPDATE items SET quantity='$nq', price='$costvalue', saleprice='$salevalue' WHERE iid = '$item_id'") or die(mysqli_error($db));
		$sql= "insert into items_update SET item_id='$bkid', oldq='$oq', newq='$nq', cost='$costvalue', saleprice='$salevalue', status='Added', user='$xID', udate= '$xdate'";
		 $result=mysqli_query($db, $sql) or die(mysqli_error($db));
		 
		mysqli_query($db, "delete from batcheditem WHERE uid='$uid'");
		
		$sql= "<b>Items transfer was Successful: Stock Updated<b>";
		echo "
		<script language='javascript'>
			location.href='batches?sql=$sql'
		</script>
		";	
	}
}

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
                <h3>Batched Stocks</h3>
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
						$select_content=("select * from batcheditem i INNER JOIN items t ON i.item_id = t.iid order by uid asc");
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
                                    <th>Item Name</th>
                                    <th>Cost Price</th>
                                    <th>Selling Price</th>
									<th>Quantity</th>                                
                                    <th>Money Value</th>
                                    <th>Date</th>
                                    <th>Transfer</th>
                                    
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						 $yr2 = substr($content["xdate"],0,4) ;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
														
							if($yr == $yr2){
								$k = $k + 1;
						?>
								<tr>
									<td><?php echo $k  ?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo $content['cost']?></td>
                                    <td><?php  echo $content['selingprice']?></td>
                                    <td><?php  echo $content['newq']?></td>
                                    <td><?php  echo $content['selingprice'] * $content['newq']?></td>
                                    <td><?php  echo $content['bdate']?></td>
                                    <td><a href="batches?pg=2&id=<?php  echo $content['uid']?>&item_id=<?php  echo $content['item_id']?>" class="btn btn-dark"> Transfer </a></td>
								</tr>
						 <?php
							}
						  } while ($content = mysqli_fetch_assoc($content_result)); ?>
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

