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
	if ($pg == 8)
		{
			$shh  = $_POST['shh'];
			$ehh  = $_POST['ehh'];
			$discount  = $_POST['discount'];
			$xdate = date("Y-m-d");
		
			mysqli_query($db, "insert into happyhour SET shh='$shh', ehh='$ehh', discount='$discount', xdate='$xdate', user='$xID' ") or die(mysqli_error($db));
			$sql= "<b>Operation was Successful: Record Inserted<b>";

	echo "
			<script language='javascript'>
				location.href='happy-hour?sql=$sql'
			</script>
		";			
		}
?>

<?php
	if ($pg == 2)
	
		{
			$TXTid = $_POST['id'];
			$shh  = $_POST['shh'];
			$ehh  = $_POST['ehh'];
			$discount  = $_POST['discount'];
			$xdate = date("Y-m-d");
			
			mysqli_query($db, "UPDATE happyhour SET shh='$shh', ehh='$ehh', discount='$discount', xdate='$xdate', user='$xID' WHERE hid = '$TXTid'");
			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='happy-hour?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			
			$xdate = date("Y-m-d");
			$select_content=("select * from happyhour where hid = '$TXTid'");
			$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
			$content = mysqli_fetch_assoc($content_result);
			$description= "id=".$content['hid'].", "."shh Name=".$content["shh"].", User=".$xID.", Date=".$xdate;
			
			mysqli_query($db, "delete from happyhour where hid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			logs("Delete",'happyhour Table',$description,$xID,$xdate);
			header ("location:happy-hour?sql=$sql");
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from happyhour WHERE hid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
	$select_content10=("select * from systemusers WHERE id='$xID'");
	$content_result10= mysqli_query($db, $select_content10) or die (mysqli_error($db));
	$content10 = mysqli_fetch_assoc($content_result10);
	$num_chk10 = mysqli_num_rows ($content_result10);
?>


<?php include("header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Happy Hour</h3>
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
<!--                <div class="x_title">
                    <a href="happy-hour?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Happy Hour</a>
                    <a href="happy-hour" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> View Happy Hour</a>
                    <div class="clearfix"></div>
                </div>
-->                <div class="x_content">
			<?php
				if ($pg == 1)
					{
			?> 			 <form method="post" action="?pg=8" name="frmReg" onsubmit="return loginCheck()" >
                    <table class="form">
                        
                         <tr>
                            <td>
                                <label>Start Happy Hour</label>
                            </td>
                            <td>
                                <input type="text" class="form-control some_class" name="shh" id="some_class_1"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label>End Happy Hour</label>
                             </td>
                            <td>
                                <input type="text" name="ehh" class="form-control some_class" id="some_class_2">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Discount in %</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="discount" maxlength="2" onBlur="return amountCalc()" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                            </td>
                        </tr>
                         <tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-primary" value="  Submit  " />
                            </td>
                        </tr>
                    </table>
                    </form>
			<?php	
					}
				
			?>
            
            <?php
				if ($pg == 7)
					{
				$TXTid = $_GET['id'];
				$select_content1=("select * from happyhour WHERE hid='$TXTid'");
				$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
				$content1 = mysqli_fetch_assoc($content_result1);
				$num_chk1 = mysqli_num_rows ($content_result1);
			?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" >
                    <table class="form">
                    	
                         <tr>
                            <td>
                                <label>Start Happy Hour</label>
                            </td>
                            <td>
                                <input type="text" class="form-control some_class" name="shh" id="some_class_1" value="<?php echo $content1["shh"] ?>"/>
                                <input type="hidden" class="form-control some_class" name="id" value="<?php echo $content1["hid"] ?>"/>
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>End Happy Hour</label>
                            </td>
                            <td>
                                <input type="text" class="form-control some_class" name="ehh" id="some_class_2" value="<?php echo $content1["ehh"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Discount in %</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="discount"  value="<?php echo $content1["discount"] ?>" type="number"  id="quantity" onBlur="return amountCalc()" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                              
                            </td>
                            <td>
                                <input  type="submit" class="btn btn-primary" value="  Update  " />
                            </td>
                        </tr>
                    </table>
                    </form>
			<?php	
					}
				
			?>
			
			
			<?php
			
				if ($pg == "")
				
						{
			
			?>
                <span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                <table class="table table-striped responsive-utilities jambo_table" id="example">
								
			
			
			<?php
						$select_content=("select * from happyhour c INNER JOIN systemusers s ON c.user=s.id order by shh asc");
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
                            <th>Start Happy Hour</th>
                            <th>End Happy Hour</th>
                            <th>Discount</th>
                            <th>Created/Edited</th>
                            <th>Date Created</th>
                            <th>Edit</th>
<!--                            <th>Delete</th>
-->                        </tr>
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
                                    <td><?php  echo $content['shh']?></td>
                                    <td><?php  echo $content['ehh']?></td>
                                    <td><?php  echo $content['discount']?></td>
                                    <td><?php  echo $content['username']?></td>
									<td><?php  echo ucfirst($content ['xdate'])?></td>
									
									<td width="5%"  style="font-weight:normal"><a href="happy-hour?id=<?php echo ($content ['hid'])?>&pg=7" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
<!--                                    <td width="8%" align="center"><a href="happy-hour?id=<?php  echo ($content ['hid'])?>&pg=6" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
-->								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			<?php
			}
			?>
			</tbody>
			</table>
            </div>
   		</div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>
<script src="js/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

</script>	


<script language="javascript">
function loginCheck() {

if(document.frmReg.shh.value == "") {
alert ("Please Enter Starting Date/Time of Happy Hour")
document.frmReg.shh.focus();
return false
}
if(document.frmReg.ehh.value == "") {
alert ("Please Enter Ending Date/Time of Happy Hour")
document.frmReg.ehh.focus();
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