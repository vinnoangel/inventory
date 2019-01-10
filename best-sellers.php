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
	$select_content=("select * from items");
	$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
	$content = mysqli_fetch_assoc($content_result);
	$num_chk = mysqli_num_rows ($content_result);
	if ($num_chk != 0)
	{
		$yr = date("Y"); // Current year
		
		do{
			$iit = $content["iid"] ;
			$select_content1=("select * from sales where item_id = '$iit'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			$sumTotal =0 ;
			do{
				$yr2 = substr($content1["xdate"],0,4) ;
				if($yr == $yr2){
					$sumTotal += $content1['quantity'];
				}
				
			} while ($content1 = mysqli_fetch_assoc($content_result1)); 
			
			mysqli_query($db, "UPDATE items SET bestSeller='$sumTotal' WHERE iid = '$iit'") or die(mysqli_error($db));
		} while ($content = mysqli_fetch_assoc($content_result));
		
	}
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
                <h3>Best Seller</h3>
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
						$select_content=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by bestSeller desc");
						$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
						$content = mysqli_fetch_assoc($content_result);
						$num_chk = mysqli_num_rows ($content_result);
						$k = 0
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
                                    <th>Category</th>
									<th>Items Name</th>
                                    <th>Quantity</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $x=$x+1;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
								
						$k = $k + 1;
						?>
								<tr >
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['category']?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo ucfirst($content['bestSeller'])?></td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			
			</tbody>
			</table>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

<script LANGUAGE="JavaScript">
	
function fnAll(obj)
		{
			for(var i = 0; i < obj.elements.length; i++){
				if(obj.elements[i].type == "checkbox")
				{
					obj.elements[i].checked=true;
				}
			}
		}
		
		function fnNotAll(obj)
		{
			for(var i = 0; i < obj.elements.length; i++){
				if(obj.elements[i].type == "checkbox" && obj.elements[i].name != "password")
				{
					obj.elements[i].checked=false;
				}
			}
		}
</script>	


<script language="javascript">
function loginCheck() {
if(document.frmReg.item.value == "") {
alert ("Please enter Schhol item")
document.frmReg.item.focus();
return false
}
if(document.frmReg.price.value == "") {
alert ("Please enter items price")
document.frmReg.price.focus();
return false
}
if(document.frmReg.regno.value == "") {
alert ("Please enter items Registration Number format")
document.frmReg.regno.focus();
return false
}
if(document.frmReg.quantity.value == "") {
alert ("Please select items contact quantity address")
document.frmReg.quantity.focus();
return false
}
if(document.frmReg.descript.value == "") {
alert ("Please enter items contact descript number")
document.frmReg.descript.focus();
return false
}
if(document.frmReg.user.value == "") {
alert ("Please enter items login useritem")
document.frmReg.user.focus();
return false
}
if(document.frmReg.address.value == "") {
alert ("Please enter items Address")
document.frmReg.address.focus();
return false
}
else {
return true
}

}
</script>
<script language="JavaScript" type="text/javascript">

function confirmDel(){ // to confirm delete action before url is sent
	//confirm("Do you want to delete this item?");
	if (confirm("Do you want to delete this?")) {
       return true;
    }	
	return false;
}
</script>