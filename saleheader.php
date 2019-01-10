<?php require_once("includes/session.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Inventory System</title>
	<link rel="shortcuticon icon" type="image/x-icon" href="images/icon.png">
   
    <!--Jquery UI CSS-->
  
    
    
    
    
    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="img/logo.png" alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo $_SESSION["username"] ?></li>
                            <li><a href="changepass">Change Password</a></li>
                            <li><a href="logout">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Last Login: 3 hours ago</span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="dashboard"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href="javascript:"><span>Control Panel</span></a>
                    <ul>
                    	<li><a href="userCat.php" >User's Category</a> </li>
						<li><a href="userlist.php" >System User</a> </li>
                       <li><a href="company" >Company Information</a></li>
                        <li><a href="title" >Titles</a></li>            
                        <li><a href="categories" >Item Categories</a></li>
                        <li><a href="items" >Add Items</a></li>
                        <li><a href="remove_items" >Remove/Delete Items</a></li>
                        <li><a href="low-stock-value" >Re-Order Level</a></li>
                    </ul>
                </li>
                <li class="ic-grid-tables"><a href="javascript:"><span>Stock Entry</span></a>
                	<ul>
                        <li><a href="items_update">New Stock Entry</a> </li>
                        <li><a href="batches">Batches</a>  </li>
                    </ul>
                </li>
                <li class="ic-gallery dd"><a href="sale"><span>Sale Items</span></a> </li>
				<li class="ic-notifications"><a href="javascript:"><span>Report</span></a>
                	<ul>
                        <li><a href="low-stock">Low Stocks</a> </li>
                        <li><a href="counting">Counting</a>  </li>
                         <li><a href="batchedItems">Batched Items</a>  </li>
                        <li><a href="sales">Sales</a> </li>
                        <li><a href="sales-margine">Sales Margin</a> </li>
                        <li><a href="best-sellers">Best Sellers</a>  </li>
                        <li><a href="best-sellers">Best Buyers</a>  </li>
                        <li><a href="entries">Entries</a>  </li>
                        <li><a href="categories">Categories</a>  </li>
                    </ul>
                </li>
                 <li class="ic-grid-tables"><a href="customers"><span>Customers</span></a> </li>
                <li class="ic-form-style"><a href="backupDatabase"><span>Database Backup</span></a></li>
            </ul>
        </div>