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
	if ($pg == 6)
		{
			$TXTid = $_GET['id'];
			
			mysqli_query($db, "delete from messages where mid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "<b>Operation was Successful: 1 Item deleted<b>";
			echo "
			<script language='javascript'>
				location.href='Messaging.php?sql=$sql'
			</script>
			";
		}
?>


<?php

	if ($pg == 2)
		{	
			$category = $_POST['category'];
			$cat = $_POST['cat'];
			$des = $_POST['des'];
			$phones = $_POST['phones'];
			$xdate = date("Y/m/d");
			
			$sql= "insert into messages set towhom='$cat', Sender='$category', Content='$des', phones='$phones', user='$xID', xdate='$xdate' ";
			
			$result=mysqli_query($db, $sql) or die(mysqli_error($db));
			
			$sql = "<b>Operation was Successful<b>";
			echo "
				<script language='javascript'>
					location.href='Messaging?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 3)
		{
		
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from messages WHERE mid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
		}
?>

<?php
if ($pg == 4)
{
	$TXTid = $_GET['id'];
	$select_content1=("select * from messages WHERE mid='$TXTid'");
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
                            <h3>Log Report</h3>
                        </div>

                       
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" >
                               <?php
								if ($pg == 1)
									{
							?> 			 <form method="post" action="Messaging?pg=2" name="frmReg" onsubmit="return loginCheck()" >
									<table class="table" style="border:#FFF">
										<tr>
											<td ><b>Sending To</b></td>
											<td >
												  <select name="cat" id="cat" class="form-control" onChange="return getNumbers()">
                                                    <option value="">--Sending</option>
                                                    <option value="99999999999">All</option>
                                                     <?php
														$query = mysqli_query($db, "select * from customers") or die(mysqli_error($db));
														while ($row = mysqli_fetch_array($query)) {
														$id = $row['cid'];
													  ?>
													<option value="<?php echo $row['cid'] ?>" <?php if($row['cid'] == $id){?> selected="selected" <?php ; } ?>><?php echo $row['name']." (". $row['phone'] .")"?></option>
													 <?php } ?>
												  </select>
											</td>
											<td rowspan="3">
											   <textarea name="phones" id="phones" class="form-control" rows="13" readonly>    </textarea>  
											</td>
										</tr>
										 <tr>
											<td>
												<label>Sender Name</label>
											</td>
											<td>
												<input type="text" class="form-control" name="category"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Message Content</label>
											</td>
											<td>
											   <textarea name="des"  class="form-control" rows="7" >    </textarea>  
											</td>
										</tr>
										 <tr>
											<td>
											  
											</td>
											<td>
												<input  type="submit" class="btn btn-primary" value="  Send  " />
											</td>
										</tr>
									</table>
									</form>
							<?php	
									}
								
							?>
							
							<?php
								if ($pg == 3)
									{
							?> 			 
									<table  class="table table-bordered">
										 <tr>
											<td style="width:100px">
												<label>Sent To</label>
											</td>
											<td style="width:100px">
												<?php  if($content1['towhom'] == 1){ echo "Guardian/Parents" ;} else if($content1['towhom'] == 2){ echo "Tearcher"; } else if($content1['towhom'] == 3){ echo "Non Teacher"; }?>
											</td>
											<td rowspan="3">
											   <?php echo ucfirst($content1['phones'])?>  
											</td>
										</tr>
										<tr>
											<td>
												<label>Sender Name</label>
											</td>
											<td>
												<?php echo ucfirst($content1['Sender'])?>
											</td>
										</tr>
										<tr>
											<td>
												<label>SMS Content</label>
											</td>
											<td>
												<?php  echo ucfirst($content1['Content'])?>     
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">
												<a href="Messages?pg=4" class="btn btn-primary">Resend</a>
											</td>
										</tr>
									</table>
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
										$select_content=("select * from clocking order by xdate desc");
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
                                                    <th>Date</th>
													<th>Visitor name</th>
													<th>ClockIn</th>
													<th>ClockOut</th>
                                                    <th>Time Spent</th>
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
												<tr>
													<td><?php echo $k  ?></td>
                                                    <td><?php  echo $content ['xdate']?></td>
													<td><?php  echo $content['name']?></td>
													<td><?php    echo $content['clockin'] ?></td>
													<td><?php  echo $content['clockout']?></td>
                                                    <td><?php  
													$minutes = (strtotime($content['clockout']) - strtotime($content['clockin']))/ 60;
 
													$day = floor ($minutes / 1440);
													$hour = floor (($minutes - $d * 1440) / 60);
													$min = $minutes - ($d * 1440) - ($h * 60);
													 
													//echo "{$minutes}minutes equals: {$day}days {$hour}hours {$min}minutes";
													
													$minutes = (strtotime($content['clockout']) - strtotime($content['clockin']))/ 60;
//
// Assuming that your minutes value is $minutes
//
$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);
//
// Then you can output it like so...
//
echo   $h."hour(s), ".sprintf('%.0f', $m). "Minutes(s)" ;
													 ?>
                                               </td>
													
													
													
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
                            </div>
                        </div>
                    </div>
                </div>
                
                
              
                
 <!-- footer content -->
               <?php include("includes/footer.php")?>
<script LANGUAGE="JavaScript">

	function getNumbers(){
		//declaare a variable that collects the value in the select button
		var facultyfield=$('#cat').val();
		//checks if the variable is empty
		if( facultyfield=="")
		{
			$('#container').html("<strong> No value selected for the search record");
			return false;
		}
		
		mypath='mode=sms&sender='+facultyfield;
				$.ajax({
				type:'POST',
				url:'loaddata.php',
				data:mypath,
				cache:false,
				success:function(resps){
				$('#phones').html(resps);
				return false;
			}
		});
		return false;
	}
	
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
		if(document.frmReg.category.value == "") {
		alert ("Please enter category")
		document.frmReg.category.focus();
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