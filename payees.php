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
			$name  = $_POST['name'];
			$address  = $_POST['address'];
			$phone  = $_POST['phone'];
			$email  = $_POST['email'];
			$other  = $_POST['other'];
			$bank  = $_POST['bank'];
			$accno  = $_POST['accno'];
			$accname  = $_POST['accname'];
			$xdate = date("Y-m-d");
		
			mysqli_query($db, "insert into payees SET name = '$name', address = '$address', phone = '$phone', email = '$email', bank = '$bank', accno = '$accno', accname = '$accname', other = '$other', xdate='$xdate', user='$xID' ") or die(mysqli_error($db));
			$id = mysqli_insert_id();
			$payeeid = $_SESSION["regnof"].date("mh").$id ;
			mysqli_query($db, "UPDATE payees SET payeeid = '$payeeid' WHERE pid = '$id'");
			
			$sql= "<b>Operation was Successful: Record Inserted<b>";
	echo "
			<script language='javascript'>
				location.href='payees?sql=$sql'
			</script>
		";			
		}
?>

<?php
	if ($pg == 2)
	
		{
			$TXTid = $_POST['id'];
			$name  = $_POST['name'];
			$address  = $_POST['address'];
			$phone  = $_POST['phone'];
			$email  = $_POST['email'];
			$other  = $_POST['other'];
			$bank  = $_POST['bank'];
			$accno  = $_POST['accno'];
			$accname  = $_POST['accname'];
			$xdate = date("Y-m-d");
			mysqli_query($db, "UPDATE payees SET name = '$name', address = '$address', phone = '$phone', email = '$email', bank = '$bank', accno = '$accno', accname = '$accname', other = '$other' WHERE pid = '$TXTid'");
			
			
			
			$sql= "<b>Operation was Successful: Changes made<b>";
			echo "
				<script language='javascript'>
					location.href='payees?sql=$sql'
				</script>
			";
		}
?>

<?php
	if ($pg == 6)
	
		{
		
			$TXTid = $_GET['id'];
			mysqli_query($db, "delete from payees where pid = '$TXTid' ") or die(mysqli_error($db)) ;
			$sql = "Operation was Successful: 1 Item deleted";
			header ("location:payees?sql=$sql");
		}
?>

<?php
	if ($pg == 7)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from payees WHERE pid='$TXTid'");
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
                <h3>Payees</h3>
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
                        <a href="payees?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Payee</a>
                        <a href="payees" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> View Payees</a>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                        if ($pg == 1)
                            {
                    ?> 			 <form method="post" action="?pg=8" name="frmReg" onsubmit="return loginCheck()" >
                        <table class="form">
                             <tr>
                                <td>
                                    <label>Payee's Name</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="name"/>
                                </td>
                            </tr>
                                        <tr>
                                            <td>
                                                <label>Address</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="address"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Phone</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="phone"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Email</label>
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" name="email" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Ban Name</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="bank"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Account Name</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="accname"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Account Number</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="accno"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Other Information</label>
                                            </td>
                                            <td>
                                                <textarea name="other" class="form-control"> </textarea>
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
                            ?> 			 <form method="post" action="?pg=2" name="frmReg" onsubmit="return loginCheck()" >
                                    <table class="form">
                                        
                                        <tr>
                                            <td>
                                                <label>Payee's Name</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="name" value="<?php echo $content1["name"] ?>"/>
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $content1["pid"] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Address</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="address" value="<?php echo $content1["address"] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Phone</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $content1["phone"] ?>"/>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <label>Email</label>
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" name="email" value="<?php echo $content1["email"] ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Ban Name</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="bank" value="<?php echo $content1["bank"] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Account Name</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="accname" value="<?php echo $content1["accname"] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Account Number</label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="accno" value="<?php echo $content1["accno"] ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Other Information</label>
                                            </td>
                                            <td>
                                                <textarea name="other" class="form-control"><?php echo $content1["other"] ?> </textarea>
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
                                        $select_content=("select * from payees order by pid desc");
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
                                        <th>Payee's name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>email</th>
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
                                                    <td><?php  echo $content['address']?></td>
                                                    <td><?php  echo $content['phone']?></td>
                                                    <td><?php  echo $content['email']?></td>
                                                    <td><?php  echo ucfirst($content ['xdate'])?></td>
                                                    
                                                    <td width="5%"  style="font-weight:normal"><a href="payees?id=<?php echo ($content ['pid'])?>&pg=7" target="_parent"  class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   <td width="8%" align="center"><a href="payees?id=<?php  echo ($content ['pid'])?>&pg=6" target="_parent" onClick="return confirmDel();"  class="btn btn-danger"><i class="fa fa-close"></i></a> </td>
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
<?php include("includes/footer.php") ?>


<script language="javascript">
function loginCheck() {

if(document.frmReg.name.value == "") {
alert ("Please enter name name")
document.frmReg.name.focus();
return false
}
if(document.frmReg.phone.value == "") {
alert ("Please enter account name")
document.frmReg.phone.focus();
return false
}
if(document.frmReg.address.value == "") {
alert ("Please enter account No")
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