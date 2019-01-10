<?php 
	require_once("includes/session.php");
	confirm_logged_in(); 
	include("header.php");
	
	$userID = $_SESSION["ustcode"];
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$select_content2=("select * from systemusers WHERE id='$userID'");
	$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
	$content2 = mysqli_fetch_assoc($content_result2);
	$num_chk2 = mysqli_num_rows ($content_result2);	
	
	if($pg == 8){
		$transid = $_POST["tid"]; 
		$select_content21=("select * from paymenthistory WHERE transID='$transid'");
		$content_result21= mysqli_query($db, $select_content21) or die (mysqli_error($db));
		$content21 = mysqli_fetch_assoc($content_result21);
		$num_chk21 = mysqli_num_rows ($content_result21);
		if($num_chk21 > 0){
			$cid = $content21['custID'];
		
			echo "
				<script language='javascript'>
					location.href='return-item?pgs=$transid&bid=$cid'
				</script>
			";
		}
		else{
			echo "
				<script language='javascript'>
					alert('No Record Found')
					location.href='dashboard'
				</script>
			";
		}
	}
?>
            <div class="right_col" role="main">

                <br />
                <div class="">

                    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-users"></i>
                                </div>
                                <div class="count">
								<?php
									$select_content=("select * from customers");
									$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
									$content = mysqli_fetch_assoc($content_result);
									echo $num_chk = mysqli_num_rows ($content_result);
								?>
								</div>

                                <h3>Customers</h3>
                                <p>No of Customers.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-comments-o"></i>
                                </div>
                                <div class="count">
                                	<?php
										$select_content=("select * from customers order by cid desc limit 1");
										$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
										$content = mysqli_fetch_assoc($content_result);
										echo $num_chk = mysqli_num_rows ($content_result);
										/*$today = date("Y-m-d");
										//$date = strtotime(date("Y-m-d", strtotime($today)) . " +1 month");
										echo '<br>'.$today;*/
									?>
                                </div>

                                <h3>Recent Customer</h3>
                                <p>New  Customer.</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                                </div>
                                <div class="count">
                                	<?php
										$select_content1=("select * from lowstock");
										$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
										$content1 = mysqli_fetch_assoc($content_result1);
										$num_chk1 = mysqli_num_rows ($content_result1);
										$lowstock = $content1['lowstock'];
										
										$select_content=("select * from items where quantity <= '$lowstock' order by item asc");
										$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
										$content = mysqli_fetch_assoc($content_result);
										echo $num_chk = mysqli_num_rows ($content_result);
									?>
                                </div>

                                <h3>Low Stock</h3>
                                <p>No of Low Stock</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats" style="color:#F30">
                                <div class="icon"><i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="count" style="font-size:12px">
                                	<?php
									// List the files
                                    $k = 0;
									$dir = opendir ("./DB_backup"); 
									while (false !== ($file = readdir($dir))) { 
									
										// Print the filenames that have .sql extension
										if (strpos($file,'.sql',1)) { 
									
										// Remove the sql extension part in the filename
										$filenameboth = str_replace('.sql', '', $file);
												$k = $k + 1;			
										// Print the cells
									?>
											
												<?php 
												$filenameboth = str_replace('db-backup-', '', $filenameboth);
												$filenameboth = str_replace('-inventory', '', $filenameboth);
												echo  $filenameboth;
												break;
												 ?>
									<?php		
										} 
									} 
									?>
                                </div>

                                <h3>Backup</h3>
                                <p>Last Backup Date</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	 <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content">
                                	<div class="bs-glyphicons">
                                  		 <ul class="bs-glyphicons-list">
                                         <?php
                                         if ($content2['company']== 1){ ?>
                                         	<li>
                                                <a href="company" style="text-decoration:none; color:#000"> 
                                                    <img src="images/business-profile.png" /> <br />
                                                    Company Info
                                                </a>
                                            </li>
                                          <?php } ?>
                                          
                                          <?php
                                         if ($content2['users']== 1){ ?>
                                         	<li>
                                            	<a href="userlist" style="text-decoration:none; color:#000"> 
                                                    <img src="images/users.png" /> <br />
                                                    System Users
                                                </a>
                                            </li>
                                          <?php } ?>
                                          <li>
                                                <a href="staff" style="text-decoration:none; color:#000"> 
                                                    <img src="images/staff.png" /> <br />
                                                    Staff
                                                </a>
                                            </li>
                                          <?php
                                             if ($content2['stock_entry']== 1){ ?>

                                            <li>
                                                <a href="services" style="text-decoration:none; color:#000"> 
                                                    <img src="images/products.png" /> <br />
                                                    Services
                                                </a>
                                            </li>
										 <?php } ?>
                                          <?php
                                         if ($content2['shelf']== 1){ ?>
                                            <li>
                                            	<a href="categories" style="text-decoration:none; color:#000"> 
                                                    <img src="images/category.png" /> <br />
                                                    Item Category
                                                </a>
                                            </li>
                                        <?php } ?>
                                         
                                        <?php
                                         if ($content2['set_items']== 1){ ?>
                                            
                                            <li>
                                                <a href="items" style="text-decoration:none; color:#000"> 
                                                    <img src="images/item.png" /> <br />
                                                    Item Setup
                                                </a>
                                            </li>
                                             <?php } ?>
                                            
                                            <?php
                                         if ($content2['stock_entry']== 1){ ?>

                                            <li>
                                                <a href="items_update" style="text-decoration:none; color:#000"> 
                                                    <img src="images/stock.png" /> <br />
                                                    Stock
                                                </a>
                                            </li>
                                             <?php } ?>
                                             
                                             
                                            
                                            <?php
                                         if ($content2['stock_entry']== 1){ ?>

                                            <li>
                                                <a href="batches" style="text-decoration:none; color:#000"> 
                                                    <img src="images/move-stock.png" /> <br />
                                                    Batched Stock
                                                </a>
                                            </li>
                                             <?php } ?>
                                            
                                            <?php
                                         if ($content2['customers']== 1){ ?>
                                            
                                             <li>
                                               <a href="customers" style="text-decoration:none; color:#000"> 
                                               	<img src="images/clients.png" /> <br />
                                                Clients
                                               </a>
                                            </li>
                                             <?php } ?>
                                            
                                            <?php
                                         if ($content2['sale_item']== 1){ ?>
                                            
                                            <li>
                                                <a href="sale" style="text-decoration:none; color:#000"> 
                                                    <img src="images/sale.png" /> <br />
                                                    Make Sale
                                                </a>
                                            </li>
                                            <li>
                                                <a href="return-item" style="text-decoration:none; color:#000" onclick="return loadForm()"> 
                                                    <img src="images/return.png" /> <br />
                                                    Return Item
                                                </a>
                                            </li>
                                            <li>
                                                <a href="my-sales" style="text-decoration:none; color:#000"> 
                                                    <img src="images/sale.png" src="" /> <br />
                                                    My Sales
                                                </a>
                                            </li>
                                            <li>
                                                <a href="my-sales" style="text-decoration:none; color:#000"> 
                                                    <img src="images/debtors.png" src="" /> <br />
                                                    Debtors
                                                </a>
                                            </li>
                                             <?php
                                             if ($content2['stock_entry']== 1){ ?>

                                            <li>
                                                <a href="orders" style="text-decoration:none; color:#000"> 
                                                    <img src="images/order.png" /> <br />
                                                    Order
                                                </a>
                                            </li>
                                             <?php } ?> 
                                             
                                            
                                            
                                             <?php } ?>
                                             
                                            <?php
                                         if ($content2['expenses']== 1){ ?>

                                             <li>
                                                <a href="expenses" style="text-decoration:none; color:#000"> 
                                                    <img src="images/expenses.png"/> <br />
                                                    Expenses
                                                </a>
                                            </li>
                                            
                                             <?php } ?>
                                             
                                            
                                            <?php
                                         	if ($content2['sms']== 1){ ?>
                                            <li>
                                                <a href="messages_templates" style="text-decoration:none; color:#000"> 
                                                    <img src="images/template.png" /> <br />
                                                    SMS Template
                                                </a>
                                            </li>
                                            <?php } ?>
                                            
                                            <?php
                                         	if ($content2['sms']== 1){ ?>
                                            <li>
                                                <a href="contact-customer" style="text-decoration:none; color:#000"> 
                                                    <img src="images/sms.png" /> <br />
                                                    SMS Customer
                                                </a>
                                            </li>
                                            <?php } ?>
                                            
                                             <?php
                                         	if ($content2['sms']== 1){ ?>
                                            <li>
                                                <a href="Messaging" style="text-decoration:none; color:#000"> 
                                                    <img src="images/sms.png" /> <br />
                                                    Bulk SMS
                                                </a>
                                            </li>
                                            <?php } ?>
                                            
                                            <?php
                                         if ($content2['report']== 1){ ?>

                                            <li>
                                                <a href="sales-margine" style="text-decoration:none; color:#000"> 
                                                    <img src="images/best-buyer.png" /> <br />
                                                    Best Selling
                                                </a>
                                            </li>
                                            <li>
                                                <a href="sales-margine" style="text-decoration:none; color:#000"> 
                                                    <img src="images/report.png" /> <br />
                                                    Report
                                                </a>
                                            </li>
                                             <?php } ?>
										</ul>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
<!--  modals midterm-->
				<div class="modal fade bs-example-modal-sm" id="transID" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
								</button>
							<h4 class="modal-title" id="myModalLabel2">Enter Transaction ID</h4>
							</div>
								<form action="?pg=8" name="frmReg2" method="post" ID="Form1">
								<div class="modal-body" >
									<table id="getCard">
										
                                       
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<input  type="submit" class="btn btn-primary" value="  Submit  " />
								</div>
							</form>
						</div>
					</div>
				</div>
			<!-- /modals -->

                </div>

                <!-- footer content -->
               <?php include("includes/footer.php")?>
			   <script src="js/jquery.blockUI.js"></script>
               
               <script language="javascript" type="text/javascript">
			   //////////////////////////////////////////////////////////////////
function loadForm(){
		//alert(idvalue)
		$.blockUI({ overlayCSS: { backgroundColor: '#00f' } });
		mypath='mode=trid';
			$.ajax({
				type:'POST',
				url:'loaddata.php',
				data:mypath,
				cache:false,
				success:function(resps){
				$('#getCard').empty();
				$('#getCard').html(resps);
				$('#transID').modal('show');
				$.unblockUI();
				return false;
			}
		});
	
	return false;
}

/////////////////////////////////////////////////

</script>