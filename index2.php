<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
    $pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
    $sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	$debtors = 0;
	$cleared = 0;
?>


<?php include("header.php"); ?>
	<!-- page content -->
    <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Book Shop</h3>
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
                <div class="x_panel" >
            	<?php include("statistics.php"); ?>
        		</div>
            </div>
        </div>
    </div>
 <?php include("includes/footer.php")?>


