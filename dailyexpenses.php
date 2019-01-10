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
	if ($pg == 6)
		{
			$TXTid = $_GET['id'];
			
			mysqli_query($db, "delete from dailyexpenses where did = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "<b>Operation was Successful: 1 Item deleted<b>";
			echo "
			<script language='javascript'>
				location.href='dailyexpenses?sql=$sql'
			</script>
			";
		}
?>


<?php

	if ($pg == 2)
		{	
			$typeid = $_POST['typeid'];
			$amount  = str_replace(",", "", $_POST['amount']);
			$xdate = date("Y/m/d");
			
			$sql= "insert into dailyexpenses(typeid, amount, termid, sessionid, user, xdate) values('$typeid', '$amount', '$tid', '$yr', '$xID', '$xdate')";
			$result=mysqli_query($db, $sql);
			$sql = "<b>Operation was Successful<b>";
			echo "
			<script language='javascript'>
				location.href='dailyexpenses.php?sql=$sql'
			</script>
			";
		}
		
		
		if ($pg == 3)
		{	
			$name = $_POST['name'];
			$xdate = date("Y/m/d");

			
			$sql= "insert into expensestype(name, user, xdate) values('$name', '$xID', '$xdate')";
			$result=mysqli_query($db, $sql) or die(mysqli_error($db));
			$sql = "<b>Operation was Successful<b>";
			echo "
			<script language='javascript'>
				location.href='dailyexpenses.php?sql=$sql&pg=1'
			</script>
			";
		}
?>


<?php
	
	if ($pg == 4)
	
		{
			$id = $_POST['id'];
			$typeid = $_POST['typeid'];
			$amount  = str_replace(",", "", $_POST['amount']);
			$xdate = date("Y/m/d");
			
			
			mysqli_query($db, "UPDATE dailyexpenses SET typeid= '$typeid', amount='$amount' WHERE did = '$id'");
			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
			<script language='javascript'>
				location.href='dailyexpenses.php?sql=$sql'
			</script>
			";
		}
	
?>
<?php
	if ($pg == 3)
		{
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from dailyexpenses WHERE did='$TXTid'");
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
                <h3>Type of Expenses</h3>
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
                    <a href="dailyexpenses?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Expenses</a>
                    <a href="dailyexpenses" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> View Expenses</a>
                    <div class="clearfix"></div>
                </div>
					<?php
                        if ($pg == 1)
                            {
                    ?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" >
                            <table class="form">
                            	<tr>
                                    <td>Expenses type: </td>
                                    <td > 
                                      <select name="typeid" id="typeid" class="form-control" style="width:220px">
                                        <option value="">--Select Expenses</option>
                                        <?php
                                              $select_content2=("select * from expensestype  order by name asc");
                                              $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                              $content2 = mysqli_fetch_assoc($content_result2);
                                              $num_chk2 = mysqli_num_rows ($content_result2);
                                              $k = 0
                                          ?>
                                        <?php do { 	?>
                                        <option value="<?php echo  $content2['eid']?>" <?php if($content2['eid'] == $typeid){?> selected="selected" <?php } ?>><?php echo  $content2['name']?></option>
                                        <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                      </select>
                                    </td>
                                    <td>  
                                      
                                        <!-- Small modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add New Expenses</button>
                                    </td>
                      			</tr>
                                <tr>
                                    <td>
                                        <label>Amount</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control number" name="amount" required/>
                                    </td>
                                    <td>  
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td>
                                      
                                    </td>
                                    <td>
                                        <input  type="submit" class="btn btn-primary number" value="  Submit  " />
                                    </td>
                                    <td>  
                                    </td>
                                </tr>
                            </table>
                            </form>
                            
                            <!--  modals -->
                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2">Adding Expenses type</h4>
                                        </div>
                                         <form method="post" action="?pg=3" name="frmReg4">
                                            <div class="modal-body">
                                                <label for="name">Expenses Name * :</label>
                                                <input type="text" id="name" class="form-control" width="100%" name="name" required/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <input  type="submit" class="btn btn-primary" value="  Submit  " />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /modals -->
                    <?php	
                            }
                        
                    ?>
                    
                    <?php
                        if ($pg == 3)
                            {
                    ?> 			 <form method="post" action="?pg=4" name="frmReg" onsubmit="return loginCheck()" >
                            <table class="form">
                            	<tr>
                                    <td>Expenses type: </td>
                                      <td > 
                                      <select name="typeid" id="typeid" class="form-control" style="width:220px">
                                        <option value="">--Select Expenses</option>
                                        <?php
                                              $select_content2=("select * from expensestype  order by name asc");
                                              $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                              $content2 = mysqli_fetch_assoc($content_result2);
                                              $num_chk2 = mysqli_num_rows ($content_result2);
                                              $k = 0
                                          ?>
                                        <?php do { 	?>
                                        <option value="<?php echo  $content2['eid']?>" <?php if($content2['eid'] == $content1['typeid']){?> selected="selected" <?php } ?>><?php echo  $content2['name']?></option>
                                        <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                      </select>
                                      </td>
                      			</tr>
                                 <tr>
                                    <td>
                                        <label>Amount</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control number" name="amount" value="<?php echo ucfirst($content1['amount'])?>"  required="required"  />
                                        <input type="hidden" name="id" value="<?php  echo ucfirst($content1['did'])?>"> 
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
                    
                        if ($pg == "")
                        
                                {
                    
                    ?>
                        <span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                         <table class="table table-striped responsive-utilities jambo_table" id="dataTables-example">
                    <?php
                                $select_content=("select * from dailyexpenses d INNER JOIN expensestype e ON d.typeid=e.eid order by d.xdate desc");
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
                                            <th>Expenses</th>
                                            <th>Amount</th>
                                            <th>Date Created</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    <?php do { 
                                // $color = "#f5f5f5";
                                // $x < $num_chk;
                                // $x=$x+1;
                                
                                //     if($x%2 == 0)
                                //         {
                                //             $color = "#ffffff";
                                //         }
                                        
                                $k = $k + 1;
                                ?>
                                        <tr>
                                            <td><?php echo $k  ?></td>
                                            <td><?php  echo $content['name']?></td>
                                            <td><?php  echo  formatMoney($content['amount']) ?></td>
                                            <td><?php  echo ucfirst($content ['xdate'])?></td>
                                            
                                            <td width="5%"  style="font-weight:normal"><a href="dailyexpenses?id=<?php echo ($content ['did'])?>&pg=3" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   <td width="8%" align="center"><a href="dailyexpenses?id=<?php  echo ($content ['did'])?>&pg=6" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-close"></i></a> </td>
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
<?php include("includes/footer.php")?>

<script language="javascript">
function loginCheck() {
if(document.frmReg.typeid.value == "") {
alert ("Please select Expenses")
document.frmReg.typeid.focus();
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