<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PL-TRANSFORM | Inventory System</title>

    <!-- Bootstrap core CSS -->
	<link rel="shortcuticon icon" type="image/x-icon" href="images/pl-transform-logo.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    
    <!-- Datatable  -->
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    
    <!-- Web camp -->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    
    <link href="css/select/select2.min.css" rel="stylesheet">
    
    <link href="css/calendar/fullcalendar.css" rel="stylesheet">
    <link href="css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">


    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="dashboard" class="site_title"><img src="images/pl-transform-logo.png" alt="Logo" width="100px" height="50px" /> </a>
                        
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/pl-transform-logo.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info" style="font-weight: bold; color: #000">
                            <span>Welcome,</span>
                            <h2 style="font-weight: bold; color: #000"><?php echo $_SESSION["username"] ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="dashboard"><i class="fa fa-home"></i> Home </a>
                                   
                                </li>
                                <li><a><i class="fa fa-cogs"></i> Control Panel <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    	<li><a href="company">Company Information</a> </li>
                                        <li><a href="userlist">System users</a> </li>
                                       <!-- <li><a href="title">Title</a> </li>
                                        <li><a href="categories">Shelf</a> </li>
                                        <li><a href="items">Item</a> </li>
                                        <li><a href="services">Service</a> </li>-->
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-list"></i> Stock <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="items_update">Update Stock</a>
                                        </li>
                                        <li><a href="batches">Batched Stock</a> </li>
                                        <li><a href="price-adjustment">Price Adjustment</a> </li>
                                        
                                    </ul>
                                </li>
                                
                                 <li><a><i class="fa fa-users"></i> Customers <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="customers">Add Customer</a></li>
                                        <li><a href="customers">View Customers</a> </li>
                                        <li><a href="contact-customer">Contact Customer</a> </li>
                                        <li><a href="customer-activities">Customer Activities</a> </li>
                                    </ul>
                                </li>
                                
                                <li><a href="sale"><i class="fa fa-money"></i> sale</a> </li>
                                
                                <li><a><i class="fa fa-bar-chart"></i> Order <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="orders">New Order</a> </li>
                                        <li><a href="pending-order">Pending Order</a> </li>
                                        <li><a href="completed-order">Completed Order</a> </li>
                                        <li><a href="canceled-order">Canceled Order</a> </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-money"></i> Expenses Mgt. <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="expensestype">Type of Expenses</a></li>
                                        <li><a href="dailyexpenses">Daily Expenses</a></li>
                                        <li><a href="payees">Payees</a></li>
                                        <li><a href="payment-voucher">Payment Voucher</a>   </li>
                                    </ul>
                                </li>
                               
                                <li><a><i class="fa fa-envelope"></i> Messaging <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="Messaging?pg=1">Compose SMS</a></li>
                                        <li><a href="Messaging">Sent SMS</a> </li>
                                    </ul>
                                </li>
                                
                                 <li><a href="calender"><i class="fa fa-money"></i> Calender</a> </li>
                                 
                                <li><a><i class="fa fa-list"></i> Happy Hour <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="happy-hour">Setup Happy Hour</a>
                                        </li>
                                        <li><a href="happy-hour-items">Happy Hour Items</a> </li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-table"></i> Report <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="low-stock">Low Stocks</a> </li>
                                        <li><a href="counting">Counting</a>  </li>
                                        <li><a href="batchedItems">Batched Items</a>  </li>
                                        <li><a href="sales">Sales</a> </li>
                                        <li><a href="sales-margine">Sales Margin</a> </li>
                                        <li><a href="best-sellers">Best Sellers</a>  </li>
                                        <li><a href="best-sellers">Best Buyers</a>  </li>
                                        <li><a href="entries">Stock Entries</a>  </li>
                                        <li><a href="categories-report">Categories</a>  </li>
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-envelope"></i> Staff <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="staff?pg=1">New Staff</a></li>
                                        <li><a href="staff">View Staff</a> </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a href="changepass" data-toggle="tooltip" data-placement="top" title="Change password">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a href="changepass" data-toggle="tooltip" data-placement="top" title="Change password">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="logout" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/pl-transform-logo.png" alt=""><?php echo $_SESSION["username"] ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;"> <i class="fa fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="changepass">
                                            <span><i class="fa fa-lock"></i> Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-book"></i> Help</a>
                                    </li>
                                    <li><a href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            
                            
							<li style="padding-top:20px; color:#CCC"><?php if (isset($_SESSION["loginLast"])){ echo " Last Login:  ".$_SESSION["loginLast"]; }?></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->