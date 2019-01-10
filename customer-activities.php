<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';

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
		$xdate = date("Y-m-d");
?>

<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer Activities</h3>
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
                 	 <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="customer" id="customer" class="select2_group form-control"  tabindex="-1" onChange="return loadHistroy()">
                            <option value="">--Select Customer</option>
                            <?php
                                $id = $_SESSION["id"];
                                $query = mysqli_query($db, "select * from customers") or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($query)) {
                               // $id = $row['cid'];
                              ?>
                            <option value="<?php echo $row['cid'] ?>" <?php if($row['cid'] == $id){?> selected="selected" <?php ; } ?>><?php echo $row['name']." (". $row['idno'] .")"?></option>
                             <?php } ?>
                        </select>
                    </div>
					<div class="clearfix"></div>
           		 </div>
                 
                 <div class="x_content" id="loadactivities">
				</div>	   
                <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='images/demo_wait.gif' width="64" height="64" /><br>Loading..</div>

	 	</div>
   	</div>
 </div>
<?php include("includes/footer.php") ?>

<script language="javascript">
function loadHistroy(){	
	var customerid=$('#customer').val();
	$('#loadactivities').html("");
	//alert(item_id)
	//checks if the variable is empty
	if(customerid=="")
	{
		$('#loadactivities').html("<strong>selecte Customer to search");
		return false;
	}
	$("#wait").css("display", "block"); // Show loader
	mypath='mode=getHistroy&customerid='+customerid;
	$.ajax({
		type:'POST',
		url:'addtocart.php',
		data:mypath,
		//dataType: "json",
		//cache:false,
		success:function(respons){
			//returns the reponse
			$('#loadactivities').html(respons);
			$("#wait").css("display", "none"); // Show loader
			return false;
		}
	});
	return false;
}
</script>