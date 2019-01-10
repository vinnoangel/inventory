<?php require_once("../includes/session.php"); ?>
<?php confirm_logged_in();
$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
  $pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
  $sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
?>

<?php include("../header2.php"); ?>
	<!-- page content -->
    <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Net Marging (Income and Expenses)</h3>
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
                    </div>
                
					  <?php include("margin.php"); ?>
                 </div>
            </div>
        </div>
    </div>
   </div>

<?php include("../includes/footer2.php") ?>

	
