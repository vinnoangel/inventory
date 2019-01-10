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
			$item = $_POST['itemname'];
			$category = $_POST['category'];
			$quantity = $_POST['quantity'];
			$descript = $_POST['descript'];
			$user = $_POST['user'];
			$status  = $_POST['status'];

			//$pass = $_POST['passport'];
			
			$xdate = date("Y-m-d");
						  
			  if($_FILES['image']['name']){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));		
				$expensions= array("jpeg","jpg","png","gif"); 		
				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"uploads/shopitem/".$file_name);
					//echo "Success ". $file_name;
				}else{
					print_r($errors);
				}
			}
			
			mysqli_query($db, "insert into items SET item='$item', cat_id = '$category',  descript='$descript',  image='$file_name', xdate='$xdate',   user='$xID', item_status='$status' ") or die(mysqli_error($db));
			$sql= "<b>Operation was Successful: Record Inserted<b>";

	echo "
			<script language='javascript'>
				location.href='items.php?sql=$sql'
			</script>
		";			
		}
?>


<?php
	if ($pg == 2)
	
		{
			$item = $_POST['itemname'];
			$price = $_POST['price'];
			$category = $_POST['category'];
			$quantity = $_POST['quantity'];
			$descript = $_POST['descript'];
			$user = $_POST['user'];
			$status  = $_POST['status'];

			//$pass = $_POST['passport'];
			
			$xdate = date("Y-m-d");
			
			 $TXTid = $_POST['id'];
			
			if($_FILES['image']['name']){
				// Delete Old Image first
				$file = "uploads/shopitem/$pcode";
				unlink($file);
				
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];   
				$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));		
				$expensions= array("jpeg","jpg","png","gif"); 		
				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
				$errors[]='File size must be excately 2 MB';
				}				
				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"uploads/shopitem/".$file_name);
					//echo "Success ". $file_name;
				}else{
					print_r($errors);
				}
				mysqli_query($db, "UPDATE items SET item='$item', cat_id = '$category', descript='$descript', image='$file_name', xdate='$xdate', user='$xID', item_status='$status' WHERE iid = '$TXTid'") or die(mysqli_error($db));
			}
			else{
				mysqli_query($db, "UPDATE items SET item='$item', cat_id = '$category',  descript='$descript',  xdate='$xdate', user='$xID', item_status='$status' WHERE iid = '$TXTid'") or die(mysqli_error($db));
			}

			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='items?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from items WHERE iid='$TXTid'");
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			}
?>

<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			$pcode = $_GET['pcode'];
			if($pcode != ""){
				$file = "uploads/shopitem/$pcode";
				unlink($file);
			}
			
			$xdate = date("Y-m-d");
			$select_content=("select * from items where iid = '$TXTid'");
			$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
			$content = mysqli_fetch_assoc($content_result);
			$description= "id=".$content['iid'].", Item Name=".$content["item"].", Quantity=".$content["quantity"].", User=".$xID.", Date=".$xdate;
			
			mysqli_query($db, "delete from items where iid = '$TXTid' ") or die(mysqli_error($db)) ;
			
			logs("Delete",'categories Table',$description,$xID,$xdate);
			
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:items.php?sql=$sql");
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
                <h3>Items</h3>
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
                    <a href="items?pg=1" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Add Item</a>
                    <a href="items" class="btn btn-sm btn-dark"><i class="fa fa-search"></i> View Items</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
			<?php
				if ($pg == 1)
					{
			?> 			 <form method="post" action="?pg=8" item="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	<tr>
                            <td>
                                <label>Item Category</label>
                            </td>
                            <td>
                            	 <select name="category" class="form-control">
                                      <option value="">--Select Category</option>
                                      <?php
											$select_content2=("select * from categories  order by category asc");
											$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
											$content2 = mysqli_fetch_assoc($content_result2);
											$num_chk2 = mysqli_num_rows ($content_result2);
											$k = 0
										?>
                                      <?php do { 	?>
                                      <option value="<?php echo  $content2['cid']?>"><?php echo  $content2['category']?></option>
                                      <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                    </select>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Item Name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="itemname"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Item Description</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="descript"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label style="color:#F00">Fixed Price?</label>
                            </td>
                            <td style="color:#F00">
                              <input type="checkbox" name="status" id="status"  value="1" />&nbsp;
                              Note: This is not applicable for fruits
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <label>
                                    Items Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
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
				$select_content1=("select * from items WHERE iid='$TXTid'");
				$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
				$content1 = mysqli_fetch_assoc($content_result1);
				$num_chk1 = mysqli_num_rows ($content_result1);
			?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" enctype="multipart/form-data">
                    <table class="form">
                    	 <tr>
                            <td>
                                <label>Item Category</label>
                            </td>
                            <td>
                            	 <select name="category" class="form-control">
                                      <option value="">--Select Category</option>
                                      <?php
											$select_content2=("select * from categories  order by category asc");
											$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
											$content2 = mysqli_fetch_assoc($content_result2);
											$num_chk2 = mysqli_num_rows ($content_result2);
											$k = 0
										?>
                                       <?php do { 	?>
                                      <option value="<?php echo  $content2['cid']?>" <?php if($content2['cid'] == $content1['cat_id']){?> selected="selected" <?php } ?> ><?php echo  $content2['category']?></option>
                                      <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                    </select>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Items Name:</label>
                            </td>
                            <td>
                            	<input type="hidden"  name="id" value="<?php echo $content1["iid"] ?>"/>
                                <input type="text" class="form-control" name="itemname" value="<?php echo $content1["item"] ?>"/>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>items Description:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="descript" value="<?php echo $content1["descript"] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label style="color:#F00">Fixed Price?</label>
                            </td>
                            <td style="color:#F00">
                              <input type="checkbox" name="status" id="status"  <?php if($content1["item_status"] == 1) {?> checked="checked" <?php }?>  value="1"/>&nbsp;
                              Note: This is not applicable for fruits
                            </td>
                        </tr>                         
                                                                      
                        <tr>
                            <td>
                                <label>
                                    items image</label>
                            </td>
                            <td valign="middle">
                                <input type="file" name="image"/>
                                <img src="uploads/shopitem/<?php echo $content1["image"] ?>" height="100" width="100" />
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
						$select_content=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by item asc");
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
                                    <th>Description</th>
									<th>&nbsp;</th>
                                    <th>&nbsp;</th>
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
									<td><?php  echo $content['category']?></td>
                                    <td><?php  echo $content['item']?></td>
                                    <td><?php  echo $content['descript']?></td>
                                    <td width="5%"  style="font-weight:normal"><a href="items?id=<?php echo ($content ['iid'])?>&pg=7" target="_parent"  class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
                                    <td width="8%" align="center"><a href="items?id=<?php  echo ($content ['iid'])?>&pg=6&pg=6&pcode=<?php  echo ($content ['image'])?>" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
            </tbody>
			</table>
			<?php
			}
			?>
			
	 </div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

<script language="javascript">

function loginCheck() {
	if(document.frmReg.descript.value == "") {
		alert ("Please enter items contact descript number")
		document.frmReg.descript.focus();
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