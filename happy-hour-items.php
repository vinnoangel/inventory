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
	if ($pg == 2)
	{
		$recsno = $_GET["recsno"]; 
		$data=trim($recsno); 
		$ex=explode(" ",$data); 
		$size=sizeof($ex); 
		for($i=0;$i<$size;$i++) { 
			$id=trim($ex[$i]); 
			if($id > 0){
				mysqli_query($db, "UPDATE items SET happyhour='1' WHERE iid = '$id'") or die(mysqli_error($db));
				$total++;
			}
		} 
		if($total > 0) $sql= "<b>Operation was Successful: Attendance Marked<b>";
		else $sql= "<b>Operation was Not Successful: Attendance Not Marked<b>";
			
		$pg ="";
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
               
                <div class="x_content">
			<?php
				if ($pg == "")
						{
			?>
            		<form method="post" action="?pg=8&refno=<?php echo $gid ?>" name="frmReg" onsubmit="return markHappyHour()">
                    <span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                    <table class="table table-striped responsive-utilities jambo_table" >
			<?php
						$select_content=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by category asc");
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
                        <th><input name="topcheckbox" id="topcheckbox" type="checkbox" value=""  onClick="selectall();"/>  Select All</th>
                        <th>Category</th>
                        <th>Items Name</th>
                    </tr>
                    </thead>
                    <tbody>
			<?php do { 
						$catname = $content['category'];
						if($content['category'] != $catname){
							
						?>
							 <tr><td colspan="3" style="background:#FFC; font-weight:bold"><?php echo strtoupper($catname)?></td></tr>
						<?php }
						?>
                       
                        
                    <tr>
                        <td><input name="<?php  echo ($content ['iid'])?>" type="checkbox" value="<?php  echo ($content['iid'])?>" <?php if ($content['happyhour'] == "1" ){?> checked=checked <?php }?>/></td>
                        <td><?php  echo $content['category']?></td>
                        <td><?php  echo $content['item']?></td>
                    </tr>
             <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
                
            </tbody>
			</table>
            <tr>
                <td colspan="4" > <input  type="submit" class="btn btn-primary btn-mini" value=" Update Item " /> </td>
            </tr>
            </form>
			<?php
			}
			?>
			
	 </div>
	 </div>
   </div>
 </div>
<?php include("includes/footer.php") ?>

<script language="javascript">

function selectall() 
	{ 
  //        var formname=document.getElementById(formname); 
  
		var recslen = document.forms[0].length; 
		  
	 if(document.forms[0].topcheckbox.checked==true) 
	 { 
		for(i=1;i<recslen;i++) { 
			document.forms[0].elements[i].checked=true; 
		} 
	  } 
	  else 
	  { 
		  for(i=1;i<recslen;i++) 
		  document.forms[0].elements[i].checked=false; 
	  } 
	}
	
	
	function markHappyHour() 
	{ 
		var recslen =  document.forms[0].length; 
		var checkboxes="" 
		
		for(i=1;i<recslen;i++) 
		{ 
			if(document.forms[0].elements[i].checked==true) 
			checkboxes+= " " + document.forms[0].elements[i].name 
		} 
		
		
		if(checkboxes.length>0) 
		{ 
			var con=confirm("Are you sure you want to give discount on the selected Items"); 
			if(con) 
			{ 
				document.frmReg.action="happy-hour-items?pg=2&recsno="+checkboxes
				document.frmReg.method = "post";
				document.frmReg.submit() 
			} 
			else return false
		} 
		else 
		{ 
			alert("No record is selected.") 
			return false
		} 
	} 
</script>