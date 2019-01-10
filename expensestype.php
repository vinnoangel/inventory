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
			
			mysqli_query($db, "delete from expensestype where eid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "<b>Operation was Successful: 1 Item deleted<b>";
			echo "
			<script language='javascript'>
				location.href='expensestype?sql=$sql'
			</script>
			";
		}
?>


<?php

	if ($pg == 2)
		{	
			$name = $_POST['name'];
			$xdate = date("Y/m/d");
			
			$sql= "insert into expensestype(name, user, xdate) values('$name', '$xID', '$xdate')";
			$result=mysqli_query($db, $sql);
			$sql = "<b>Operation was Successful<b>";
			echo "
			<script language='javascript'>
				location.href='expensestype.php?sql=$sql'
			</script>
			";
		}
?>


<?php
	
	if ($pg == 4)
	
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$xdate = date("Y/m/d");
			
			
			mysqli_query($db, "UPDATE expensestype SET `name`= '$name' WHERE eid = '$id'");
			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
			<script language='javascript'>
				location.href='expensestype.php?sql=$sql'
			</script>
			";
		}
	
?>
<?php
	if ($pg == 3)
		{
		
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from expensestype WHERE eid='$TXTid'");
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
                    <a href="expensestype?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Expenses Type</a>
                    <a href="expensestype" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> View Expenses Type</a>
                    <div class="clearfix"></div>
                </div>
					<?php
                        if ($pg == 1)
                            {
                    ?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" >
                            <table class="form">
                                 <tr>
                                    <td>
                                        <label>Expenses Name</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="name" required/>
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
                        if ($pg == 3)
                            {
                    ?> 			 <form method="post" action="?pg=4" name="frmReg" onsubmit="return loginCheck()" >
                            <table class="form">
                                 <tr>
                                    <td>
                                        <label>Expenses Name</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="name" value="<?php echo ucfirst($content1['name'])?>"  required="required"  />
                                        <input type="hidden" name="id" value="<?php  echo ucfirst($content1['eid'])?>"> 
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
                                $select_content=("select * from expensestype order by name desc");
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
                                            <th>Expenses Name</th>
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
                                            <td><?php  echo ucfirst($content ['xdate'])?></td>
                                            
                                            <td width="5%"  style="font-weight:normal"><a href="expensestype?id=<?php echo ($content ['eid'])?>&pg=3" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   <td width="8%" align="center"><a href="expensestype?id=<?php  echo ($content ['eid'])?>&pg=6" target="_parent" onClick="return confirmDel();" class="btn btn-danger"><i class="fa fa-close"></i></a> </td>
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