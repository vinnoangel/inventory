<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	$dd = isset($_POST["d"]) ? $_POST["d"]:'';
	$mm = isset($_POST["m"]) ? $_POST["m"]:'';
	$yy = isset($_POST["y"]) ? $_POST["y"] : '';
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
                 	<?php include("menu.php");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >          
					 <div class="x_title">
            <form method="post" action="?pg=5" name="frmReg" onsubmit="return searchRecord();">
                <table style="width:100%">
                  <tr>
                  <td style="width:200px"><b>Sales Margin:</b> </td>
                  	<td>Day: </td>
                      <td style="padding-right:40px"> 
                     		<select name="d" id="d" style="width:205px;" class="form-control">
								<option value="">--Select Day</option>
								  <?php
                                      $d = 1;
                                   		do { 	?>
                                      <option value="<?php echo  $d?>" <?php if($d == $d2){?> selected="selected"<?php }?>><?php echo  $d?></option>
                                  <?php 
								  $d += 1;
								  } while ($d <= 31); ?>
                             </select>
                      </td>
                      
                       <td style="padding-right:40px"> 
                     		<select name="m" id="m" style="width:205px;" class="form-control">
								<option value="">--Select Month</option>
								  <?php
                                      $m = 1;
                                   		do { 	?>
                                      <option value="<?php echo  $m?>" <?php if($m == $m2){?> selected="selected"<?php }?>><?php echo  $m?></option>
                                  <?php 
								  $m += 1;
								  } while ($m <= 12); ?>
                             </select>
                      </td>
                      <td style="padding-right:40px"> 
                     		<select name="y" id="y" style="width:205px;" class="form-control">
								<option value="">--Select Year</option>
								  <?php
                                      $y = date("Y");
                                   		do { 	?>
                                      <option value="<?php echo  $y?>" <?php if($y == $y2){?> selected="selected"<?php }?>><?php echo  $y?></option>
                                  <?php 
								  $y -= 1;
								  } while ($y >= 2014); ?>
                             </select>
                      </td>
                      <td > <input  type="submit" class="btn btn-dark" value="Search" /></td>
                  </tr>
              </table>
             </form>
            </div>
            <div class="x_content">         
        	 <table class="table table-striped responsive-utilities jambo_table" id="example">
			<?php
				if($dd !="" and $mm !="" and $yy !=""){
					 $val = $yy."-".$mm."-".$dd;
					$select_content=("select * from sales where xdate like '%$val%' order by xdate desc");
				}
				else if($mm !="" and $yy !=""){
					 $val = $yy."-".$mm ;
					$select_content=("select * from sales where xdate like '%$val%' order by xdate desc");
				}
				else if($yy !=""){
					 $val = $yy ;
					$select_content=("select * from sales where xdate like '%$val%' order by xdate desc");
				}
				else{
					$select_content=("select * from sales order by xdate desc");
				}
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
				$cost=0;
				$sales =0;
			{
			?>
            					<thead>
								<tr>
									<th>S/N</th>
                                    <th>Transaction ID</th>
                                    <th>Item Name</th>
									<th>Quantity</th>
                                    <th>Cost Price</th>
                                    <th>Sold Price</th>
                                    <th>Sale Margin</th>
                                    <th>Date</th>
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
									<td><?php  echo $content['transID']?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo $content['quantity']?></td>
                                    <td><?php  echo $content['price']. " = ". $cprice = $content['price']*$content['quantity']?></td>
                                    <td><?php  echo $content['soldprice']. " = ". $sprice = $content['soldprice'] * $content['quantity']?></td>
                                    <td><?php  echo $sprice - $cprice ?></td>
                                    <td><?php  echo $content['xdate']?></td>
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
                    	TSM: <?php echo $sales - $cost ?>
                    </td>
                    <td width="15%">&nbsp;
                    	
                    </td>
                </tr>
            </table>
             </div>
   		</div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>


<script language="javascript">
	function searchRecord(){
		 
		if(document.frmReg.d.value != "") {
			if(document.frmReg.m.value == "") {
				alert ("Please select Month to search")
				document.frmReg.m.focus();
				return false
			}			
		}
		else if(document.frmReg.m.value != "") {
			if(document.frmReg.y.value == "") {
				alert ("Please select Year to search")
				document.frmReg.y.focus();
				return false
			}			
		}
		else if(document.frmReg.y.value == "") {
				alert ("Please select criteria to search")
				document.frmReg.y.focus();
				return false
		}
		else{
			document.frmReg.action="sales-margine?pg=1"
			document.frmReg.method = "post";
			document.frmReg.submit()
		}
	}
</script>