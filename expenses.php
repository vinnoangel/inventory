<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in();
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
	include("header.php");
?>
	<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Expenses</h3>
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
			<?php
			
				if ($pg == "")
				{
			
			?>
							<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
							<table class="table table-striped responsive-utilities jambo_table" id="example">
			<?php
						$select_content=("select * from paymentvoucher  order by xdate desc");
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
									<th>Payee Name</th>
                                    <th>Payee ID</th>
                                    <th>Bank</th>
									<th>Amount (N)</th>
									<th>Date</th>
								</tr>
								</thead>
								<tbody>
			<?php do { 
						// $color = "#f5f5f5";
						// $x < $num_chk;
						// $amount += str_replace(",", "", $content['amout'])  ;
						// $x=$x+1;
						
						// 	if($x%2 == 0)
						// 		{
						// 			$color = "#ffffff";
						// 		}
								
						$k = $k + 1;
						?>
								<tr>
									<td><?php echo $k  ?></td>
									<td><?php  echo $content['payeename']?></td>
                                    <td><?php  echo $content['refno']?></td>
                                    <td><?php  echo $content["bank"] ;?> </td>
									<td><?php  echo $content ['amout']?></td>                                                   
                                    <td><?php  echo $content ['xdate']?></td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			<?php
			}
			?>
			</tbody>
			</table>
            <table width="100%" style="color:#33C; font-size:18px; font-weight:bold">
            	<tr>
                <td width="60%">TOTAL</td>
                <td><?php echo $amount ?></td></tr>
            </table>
				</div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>


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

if(document.frmReg.name.value == "") {
	alert ("Please enter name")
	document.frmReg.name.focus();
	return false
}
if(document.frmReg.amount.value == "") {
	alert ("Please enter amount")
	document.frmReg.amount.focus();
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