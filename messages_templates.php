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
		
		mysqli_query($db, "delete from messages_templates where id = '$TXTid' ") or die(mysqli_error($db)) ;
		$sql = "<b>Operation was Successful: 1 Item deleted<b>";
		echo "
		<script language='javascript'>
			location.href='messages_templates?sql=$sql'
		</script>
		";
	}
?>


<?php

	if ($pg == 2)
	{	
		$title = $_POST['title'];
		$des = $_POST['des'];
		$sender = $_POST["sender"];
		$xdate = date("Y/m/d");
		
		$sql= "insert into messages_templates set title='$title', sender='$sender', message='$des', user='$xID', xdate='$xdate' ";
		
		$result=mysqli_query($db, $sql) or die(mysqli_error($db));
		
		$sql = "<b>Operation was Successful<b>";
		echo "
			<script language='javascript'>
				location.href='messages_templates?sql=$sql'
			</script>
		";
	}
?>

<?php
	if ($pg == 3)
	{
		$TXTid = $_GET['id'];
		$select_content1=("select * from messages_templates WHERE id='$TXTid'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$num_chk1 = mysqli_num_rows ($content_result1);
	}
?>

<?php
if ($pg == 4)
{
	$title = $_POST['title'];
	$sender = $_POST["sender"];
	$id = $_POST['id'];
	$des = $_POST['des'];
	$xdate = date("Y/m/d");
	
	$sql= "update messages_templates set title='$title', sender='$sender', message='$des', user='$xID', xdate='$xdate' WHERE id='$id'";
	
	$result=mysqli_query($db, $sql) or die(mysqli_error($db));
	
	$sql = "<b>Operation was Successful<b>";
	echo "
		<script language='javascript'>
			location.href='messages_templates?sql=$sql'
		</script>
	";
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
                            <h3>Message Template</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
                            	 <a href="dashboard" class="btn btn-sm btn-success">Dashboard</a>
                                <a href="messages_templates?pg=1" class="btn btn-sm btn-dark">Compose</a>
                                  <a href="messages_templates" class="btn btn-sm btn-warning">View SMS</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        
                            <div class="x_panel" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
							   <?php
                                if ($pg == 1)
                                    {
                                ?> 		
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                	<form method="post" action="messages_templates?pg=2" name="frmReg" onsubmit="return loginCheck()" >
                                        <table style="width:100%">
                                             <tr>
                                                <td>
                                                    <label>Message Title</label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="title"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Sender Name(Eg. JESTOP)</label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="sender" maxlength="11" />
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
                                                    <input  type="submit" class="btn btn-primary" value="  Save  " />
                                                </td>
                                            </tr>
                                        </table>
                                        </form>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Value</th>
                                            <th>Short Code</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Name
                                                </td>
                                                <td>
                                                    {$name}
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
							<?php	
									}
								
							?>
							
							<?php
								if ($pg == 3)
									{
							?> 		
                            <div class="col-md-8 col-sm-8 col-xs-8">	 
                               	<form method="post" action="messages_templates?pg=4" name="frmReg" onsubmit="return loginCheck()" >
									<table  style="width:100%">
										 <tr>
											<td>
												<label>Message Title</label>
											</td>
											<td>
												<input type="text" class="form-control" name="title" value="<?php echo ucfirst($content1['title'])?>"/>
                                                <input type="hidden" class="form-control" name="id" value="<?php echo ucfirst($content1['id'])?>"/>
											</td>
										</tr>
                                        <tr>
											<td>
												<label>Sender Name(Eg. JESTOP)</label>
											</td>
											<td>
												<input type="text" class="form-control" name="sender" maxlength="11" value="<?php echo ucfirst($content1['sender'])?>"/>
											</td>
										</tr>
										<tr>
											<td>
												<label>Message Content</label>
											</td>
											<td>
											   <textarea name="des"  class="form-control" rows="7" >  <?php echo ucfirst($content1['message'])?>  </textarea>  
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
							 </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Value</th>
                                            <th>Short Code</th>
                                        </thead>
                                        <tbody>
                                        	<tr>
                                                <td>
                                                    Name
                                                </td>
                                                <td>
                                                    {$name}
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>		
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
										$select_content=("select * from messages_templates order by xdate desc");
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
													<th>title name</th>
                                                    <th>Sender</th>
													<th>Content</th>
													<th>Date Created</th>
													<th>View</th>
													<th>Delete</th>
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
													<td><?php  echo $content['title']?></td>
                                                    <td><?php  echo $content['sender']?></td>
													<td><?php  echo $content['message']?></td>
													<td><?php  echo ucfirst($content ['xdate'])?></td>
													
													<td width="5%"  style="font-weight:normal"><a href="messages_templates?id=<?php echo ($content ['id'])?>&pg=3" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   <td width="8%" align="center"><a href="messages_templates?id=<?php  echo ($content ['id'])?>&pg=6" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-close"></i></a> </td>
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
		if(document.frmReg.title.value == "") {
		alert ("Please enter title")
		document.frmReg.title.focus();
		return false
		}
		if(document.frmReg.des.value == "") {
		alert ("Please enter message")
		document.frmReg.des.focus();
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