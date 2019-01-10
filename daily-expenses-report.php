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
			
			$select_content1=("select * from payablefees WHERE pid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
		}
?>

<?php
	if ($pg == 2)
		{
		
			$sesion = $_POST['sesion'];
			$term = $_POST['term'];
		}
?>



<?php include("header.php"); ?>
	<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Daily Expenses Report <?php if($sql != "") echo $sql ?></h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                 <?php include("menu.php"); ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                    <form method="post" action="?pg=2" name="frmReg">
                    	<div class="col-md-5 col-sm-5 col-xs-12">
                        <select name="sesion" id="sesion" class="select2_group form-control"  tabindex="-1" >
                            <option value="">--Select Session</option>
                            <?php
                                  $select_content1=("select * from schsession order by sid desc");
                                  $content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
                                  $content1 = mysqli_fetch_assoc($content_result1);
                                  $num_chk1 = mysqli_num_rows ($content_result1);
                              ?>
                            <?php do { 	?>
                            <option value="<?php echo  $content1['sid']?>" <?php if($content1['sid'] == $sesion){?> selected="selected" <?php } ?>><?php echo  $content1['sesion']?></option>
                            <?php } while ($content1 = mysqli_fetch_assoc($content_result1)); ?>
                      </select>
                      </div>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                      <select name="term" id="term" class=" form-control">
                            <option value="">--Select Term</option>
                            <?php
                              $select_content2=("select * from terms order by term asc");
                              $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                              $content2 = mysqli_fetch_assoc($content_result2);
                              $num_chk2 = mysqli_num_rows ($content_result2);
                              $k = 0
                          ?>
                        <?php do { 	?>
                        <option value="<?php echo  $content2['tid']?>" <?php if($content2['tid'] == $term){?> selected="selected" <?php } ?>><?php echo  $content2['term']?></option>
                        <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                      </select>
                      </div>
                        <input  type="submit" class="btn btn-primary" value="Search" onClick="return laodstudents();" />
                      </form>
                    <div class="clearfix"></div>
                </div>
			
							<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
							<table class="table table-striped responsive-utilities jambo_table" id="example">
			<?php
					if ($pg == 2)
					{
						$select_content=("select * from dailyexpenses d INNER JOIN expensestype e ON d.typeid=e.eid  where termid='$term' and sessionid='$sesion' order by d.xdate desc");
					}
					else {
						$select_content=("select * from dailyexpenses d INNER JOIN expensestype e ON d.typeid=e.eid order by d.xdate desc");	
					}
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0;
						$amount = 0;
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
                                    <th>Expenses</th>
                                    <th>Date Created</th>
                                    <th>Amount</th>
								</tr>
                            </thead>
                            <tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $amount += str_replace(",", "", $content['amount'])  ;
						// $x=$x+1;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
								
						$k = $k + 1;
						?>
								<tr>
									<td><?php echo $k  ?></td>
                                    <td><?php  echo $content['name']?></td>
                                    <td><?php  echo ucfirst($content ['xdate'])?></td>
                                    <td><?php  echo  formatMoney($content['amount']) ?></td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
                         
                     <tr style="font-weight:bold">
                        <td>TOTAL</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo "N". formatMoney($amount) ?></td>
                    </tr>
			<?php 
				}
			?>
			</tbody>
			</table>
           
            </div>
		 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

