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
                <h3>Stock Entries </h3>
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
						$select_content=("select * from items_update order by udate desc");
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
									<th>Quantity (Q)</th>
                                    <th>Cost Price (CP) = CP * Q</th>
                                    <th>Selling Price (SP) = SP * Q</th>
                                    <th>Margin</th>
                                    <th>Date</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						//  $yr2 = substr($content["udate"],0,4) ;
						// //echo $yr;
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
														
							if($yr == $yr2){
								$k = $k + 1;
						?>
								<tr>
									<td><?php echo $k  ?></td>
                                    <td><?php  
									$items_id =  $content["item_id"];
									$select_content2=("select * from items where iid='$items_id'");
									$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
									$content2 = mysqli_fetch_assoc($content_result2);
									echo $content2['item']?></td>
                                    <td><?php  echo $content['newq']?></td>
                                    <td><?php  echo $content['cost']. " = " . $cprice = $content['newq'] * $content['cost']?></td>
                                    <td><?php  echo $content['saleprice']. " = ". $sprice = $content['saleprice'] * $content['newq'] ?></td>
                                    <td><?php  echo $sprice - $cprice ?></td>
                                    <td><?php  echo $content['udate']?></td>
								</tr>
						 <?php
						 	$cost += $cprice;
							$sales += $sprice;
						 
							}
						  } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			
			</tbody>
			</table>
            
            <table style="font-size:18px" width="100%">
            	<tr>
                	<td width="40%">
                    Total
                    </td>
                    <td width="15%">
                   		TCP: <?php echo $cost ?> 
                    </td>
                    <td width="15%">
                    	TSP: <?php echo $sales ?>
                    </td>
                    <td width="15%">
                    	TM: <?php echo $sales - $cost ?>
                    </td>
                    <td width="15%">&nbsp;
                    	
                    </td>
                </tr>
            </table>
          </div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

