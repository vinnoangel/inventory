<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];

$select_user=("select * from systemusers where id = '$xID' ");
$user_result= mysqli_query($db, $select_user) or die (mysqli_error($db));
$user = mysqli_fetch_assoc($user_result);
	
?>
<?php
	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
?>

<?php
	if ($pg == 2)
	{
		
			
			if($_GET['id'] != ""){
				$txtID =$_GET['id'];
				$select_content1=("select * from payees WHERE pid ='$txtID'");
			}
			else {
			 	$txtID =$_POST['search'];
				$select_content1=("select * from payees WHERE pid ='$txtID'");
			}
			
			$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
			$content1 = mysqli_fetch_assoc($content_result1);
			$num_chk1 = mysqli_num_rows ($content_result1);
			
			if ($num_chk1 == 0)
			
				{
				
					$sql= "Operation was Unsuccessful: Invalid Identification Number";
					echo "
						<script language='javascript'>
							location.href='payment-voucher?sql=$sql'
						</script>
					";
				}
			else
				{
			
			$name = $content1['name'];
			$bank = $content1['bank'];
			$accno = $content1['accno'];
			$payeeid = $content1['payeeid'];
			$accname = $content1['accname'];
			$_SESSION["idno"] = $content1['pid'];
			}
		}
?>

<?php
	if ($pg == 3)
	
		{
			$refno  = $_POST['refno'];
			$no  = $_POST['no'];
			$payeeid  = $_POST['payeeid'];
			$payeename  = $_POST['payeename'];
			$bank  = $_POST['bank'];
			$accno  = $_POST['accno'];
			$accname  = $_POST['accname'];
			$chequeno  = $_POST['chequeno'];
			$duedate  = $_POST['duedate'];
			$amount  = $_POST['amount'];
			$ctcode  = $_POST['ctcode'];
			$nara  = $_POST['nara'];
			$before  = $_POST['before'];
			$with  = $_POST['with'];
			$vat  = $_POST['vat'];
			$levy  = $_POST['levy'];
			$netpay  = $_POST['netpay'];
			$grandtotal  = $_POST['grandtotal'];
			$raise  = $_POST['raise'];
			$raisedate  = $_POST['raisedate'];
			$aut  = $_POST['aut'];
			$autdate  = $_POST['autdate'];
			$issue  = $_POST['issue'];
			$issuedate  = $_POST['issuedate'];
			$auth  = $_POST['auth'];
			$authdate  = $_POST['authdate'];
			$amtinword  = $_POST['amtinword'];
			$cc1  = $_POST['cc1'];
			$cc1date  = $_POST['cc1date'];
			$cc2  = $_POST['cc2'];
			$cc3  = $_POST['cc3'];
			$term = $_POST['term'];
			$sesion = $_POST['sesion'];
			$xdate = date("Y/m/d");
			//eixt;
			mysqli_query($db, "insert into paymentvoucher SET refno = '$refno', no = '$no', payeeid = '$payeeid', payeename = '$payeename', bank = '$bank', accno = '$accno', accname = '$accname', chequeno = '$chequeno', duedate = '$duedate', amout = '$amount', ctcode = '$ctcode', narration = '$nara', amtb4tax = '$before', withtax = '$with', vat = '$vat', levy = '$levy', netpay='$netpay', grandtotal = '$grandtotal', raisedby = '$raise', raiseddate = '$raisedate', Auditedby = '$aut', Auditeddate = '$autdate', Authorizedby = '$auth', Authorizeddate = '$authdate', issuedby = '$issue', issueddate = '$issuedate', amtinword = '$amtinword', cc1 = '$cc1', ccdate = '$cc1date', cc2 = '$cc2', cc3 = '$cc3', term_id='$term', sesion_id='$sesion', xdate='$xdate', user='$xID' ") or die(mysqli_error($db));
			$pvid = mysqli_insert_id();
			$pg ="";
			$sql= "Operation was Successful: Record Inserted";
?>	
			<script type="text/javascript">
                var agreewin = dhtmlmodal.open("agreebox", "iframe", "print-payment-voucher.php?pvid=<?php echo $pvid?>&pg=2", "Payment Voucher", "width=1000px,height=500px,center=1,resize=1,scrolling=0", "recal")
            </script>
	<?php
    }
?>


<?php
	if ($pg == 5)
	
		{
			$refno  = $_POST['refno'];
			$no  = $_POST['no'];
			$payeeid  = $_POST['payeeid'];
			$payeename  = $_POST['payeename'];
			$bank  = $_POST['bank'];
			$accno  = $_POST['accno'];
			$accname  = $_POST['accname'];
			$chequeno  = $_POST['chequeno'];
			$duedate  = $_POST['duedate'];
			$amount  = $_POST['amount'];
			$ctcode  = $_POST['ctcode'];
			$nara  = $_POST['nara'];
			$before  = $_POST['before'];
			$with  = $_POST['with'];
			$vat  = $_POST['vat'];
			$levy  = $_POST['levy'];
			$netpay  = $_POST['netpay'];
			$grandtotal  = $_POST['grandtotal'];
			$raise  = $_POST['raise'];
			$raisedate  = $_POST['raisedate'];
			$aut  = $_POST['aut'];
			$autdate  = $_POST['autdate'];
			$issue  = $_POST['issue'];
			$issuedate  = $_POST['issuedate'];
			$auth  = $_POST['auth'];
			$authdate  = $_POST['authdate'];
			$amtinword  = $_POST['amtinword'];
			$cc1  = $_POST['cc1'];
			$cc1date  = $_POST['cc1date'];
			$cc2  = $_POST['cc2'];
			$cc3  = $_POST['cc3'];
			$term = $_POST['term'];
			$sesion = $_POST['sesion'];
			$xdate = date("Y/m/d");
			$pvid = $_POST['pvid'];
			//exit;
			mysqli_query($db, "update paymentvoucher SET refno = '$refno', no = '$no', payeeid = '$payeeid', payeename = '$payeename', bank = '$bank', accno = '$accno', accname = '$accname', chequeno = '$chequeno', duedate = '$duedate', amout = '$amount', ctcode = '$ctcode', narration = '$nara', amtb4tax = '$before', withtax = '$with', vat = '$vat', levy = '$levy', netpay='$netpay', grandtotal = '$grandtotal', raisedby = '$raise', raiseddate = '$raisedate', Auditedby = '$aut', Auditeddate = '$autdate', Authorizedby = '$auth', Authorizeddate = '$authdate', issuedby = '$issue', issueddate = '$issuedate', amtinword = '$amtinword', cc1 = '$cc1', ccdate = '$cc1date', cc2 = '$cc2', cc3 = '$cc3', term_id='$term', sesion_id='$sesion', xdate='$xdate', user='$xID' where pvid='$pvid'") or die(mysqli_error($db));
			$pg ="";
			$sql= "Operation was Successful: Record Inserted";
			//print-payment-voucher
			?>	
			<script type="text/javascript">
                var agreewin = dhtmlmodal.open("agreebox", "iframe", "print-payment-voucher.php?pvid=<?php echo $pvid?>&pg=2", "Payment Voucher", "width=1000px,height=500px,center=1,resize=1,scrolling=0", "recal")
            </script>
	<?php
    }
?>

<?php
	if ($pg == 6)
	{
		$TXTid = $_GET['id'];
		
		mysqli_query($db, "delete from paymentvoucher where pvid = '$TXTid' ") or die(mysqli_error($db)) ;
		$sql = "Operation was Successful: 1 Item deleted";
		echo "
		<script language='javascript'>
			location.href='payment-voucher?sql=$sql'
		</script>
		";	
	}
?>

<?php
	if ($pg == 4)
		{
			$TXTid = $_GET['id'];
			$select_content1=("select * from paymentvoucher WHERE pvid='$TXTid'");
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
                <h3>Payment Voucher</h3>
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
                        <form method="post" action="?pg=2" name="frmReg" onsubmit="return markStudents()">
                            <select name="search" id="search" class="select2_group form-control"  tabindex="-1" style="width:50%">
                                <option value="">Select Payee</option>
                                <?php
                                      $select_content2=("select * from payees order by name asc");
                                      $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                      $content2 = mysqli_fetch_assoc($content_result2);
                                      $num_chk2 = mysqli_num_rows ($content_result2);
                                      $k = 0
                                  ?>
                                <?php do { 	?>
                                <option value="<?php echo  $content2['pid']?>" <?php if($content2['pid'] == $txtID){?> selected="selected" <?php } ?>><?php echo $content2['name']." (". $content2['accno'] .")"?></option>
                                <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                          </select>
                            <input  type="submit" class="btn btn-primary" value="Load Payee" onClick="return laodstudents();" />
                          </form>
                          <a href="payees?pg=1" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Payee</a>
                    </div>
            <?php
				if ($pg == "")			
				{
			?>
           
			 <table class="table table-striped responsive-utilities jambo_table" id="example">
					<?php
						$select_content=("select * from paymentvoucher order by xdate desc");
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
									<th align="center">S/N</th>
                                    <th align="center">Ref No</th>
									<th align="center">Payee Name</th>
									<th align="center">Bank</th>
                                    <th align="center">Amount</th>
                                    <th align="center"> Issued BY </th>
                                    <th align="center">View</th>
                                    <th align="center">Edit</th>
                                    <th align="center">Delete</th>
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
									<td align="center"><?php echo $k  ?></td>
                                    <td align="center"><?php  echo ucfirst($content ['refno'])?></td>
									<td align="center"><?php  echo $content['payeename']?></td>
									<td align="center"><?php  echo ucfirst($content ['bank'])?></td>
                                    <td align="center"><?php  echo ucfirst($content ['amout'])?></td>
                                    <td><?php  echo ucfirst($content ['issuedby'])?></td>
                                    <td width="5%"  style="font-weight:normal"><a href='javascript: var agreewin = dhtmlmodal.open("agreebox", "iframe", "print-payment-voucher.php?pvid=<?php echo $content ['pvid']?>&pg=2", "Payment Voucher", "width=1000px,height=500px,center=1,resize=1,scrolling=0", "recal")' class="btn btn-primary"><i class="fa fa-search"></i></a></td> 
                                    <td width="5%"  style="font-weight:normal"><a href="payment-voucher?id=<?php echo ($content ['pvid'])?>&pg=4" target="_parent" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>                                                   
                                    <td width="8%" align="center"><a href="payment-voucher?id=<?php  echo ($content ['pvid'])?>&pg=6" target="_parent" onClick="return confirmDel();"  class="btn btn-danger"><i class="fa fa-close"></i></a> </td>
								</tr>
						 <?php } while ($content = mysqli_fetch_assoc($content_result)); ?>
			<?php 
				}
			?>
			
			</tbody>
			</table>
            </div>
             
            <?php
				}
				if ($pg == "2")			
						{
			?>
            	<form method="post" action="?pg=3" name="paymentForm" onsubmit="return loginCheck22()">
				<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                <table class="table-striped table-bordered" style="width:100%">
                
                    <tr >
                         <td style="height:30px;">Ref No:</td> 
                         <td><input type="text" name="refno" value="<?php echo time() ?>" style="height:30px" /> </td> 
                         <td>Bank Name:</td>  
                         <td><input type="text"  name="bank" value="<?php echo $bank ?>" style="height:30px" /></td>     
                    </tr>
                    <tr>
                         <td>No:</td> 
                         <td><input type="text"  name="no" value="" style="height:30px" /> </td> 
                         <td>Account Name:</td>  
                         <td><input type="text"  name="accname" value="<?php echo $accname ?>" style="height:30px" /></td>     
                    </tr>
                    <tr>
                        <td>Payee ID:</td>
                        <td><input type="text"  name="payeeid" value="<?php echo $payeeid ?>" style="height:30px" /></td>
                        <td>Account No:</td>
                        <td><input type="text"  name="accno" value="<?php echo $accno ?>" style="height:30px" /> </td>
                    </tr>
                     <tr>
                        <td>Payee Name</td>
                        <td> <input type="text"  name="payeename" value="<?php echo $name ?>" style="height:30px" /> </td>
                        <td>Cheque No:</td>
                        <td> <input type="text"  name="chequeno" value="<?php echo $content1["chequeno"] ?>" style="height:30px"/></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>N<input type="text"  name="amount" id="amount" value="" style="height:30px"  onchange="return getAmountInWord()" class="number" onblur="return getAmountInWord()" />  </td>
                        <td >Due Date:</td>
                        <td>
                            <input name="duedate" type="date" value="<?php echo $mdate ?>" style="height:30px"/>
                            <input type="hidden"  name="term" value="<?php echo $content3["tid"] ?>" />
                            <input type="hidden"  name="sesion" value="<?php echo $content4["sid"] ?>" />
                        </td>
                    </tr>
               </table>
               
               <table class="table-striped table-bordered" style="width:100%; border:#309 solid 1px; text-align:center">
                    <tr>
                         <td>ACCT. CODE:</td> 
                         <td>NARRATION: </td> 
                         <td>INVOICE AMT.<br /> BEFORE TAX:</td>  
                         <td colspan="3">
                         		<table style="width:100%; text-align:center">
                                	<tr> <td colspan="3"> TAX ELEMENTs:</td></tr>
                                    <tr> <td>WITH:</td> <td>VAT:</td> <td>LEVY</td></tr>
                                </table>
                         </td> 
                         <td>NET PAY</td>    
                    </tr>
                     <tr align="center">
                         <td ><input type="text"  name="ctcode" value="" style="height:30px; width:100px" /></td> 
                         <td><textarea name="nara" style="width:350px"><?php echo $content1["naration"] ?></textarea></td> 
                         <td><input type="text"  name="before" value="" style="height:30px; width:100px" /></td>  
                         <td><input type="text"  name="with" value="" style="height:30px; width:100px" /></td> 
                         <td><input type="text"  name="vat" value="" style="height:30px; width:100px" /></td> 
                         <td><input type="text"  name="levy" value="" style="height:30px; width:100px" /></td>
                         <td><input type="text"  name="netpay" value="" style="height:30px; width:100px" /></td>    
                    </tr>
              </table>	
              <table class="table-striped table-bordered" style="width:100%; border:#F00 solid 1px;" >
              		<tr>
                         <td width="100px">GRAND TOTAL:</td> 
                         <td style="padding-left:10px; padding-top:10px"><input type="text"  name="grandtotal" value="" style="height:30px; " /></td> 
                         <td>Paid By:</td>
                        <td> <input type="text"  name="issue" value="<?php echo $user["surname"]." ".$user["fname"] ?>" style="height:30px"/></td>
                    </tr>
              </table>
            
                <table class="table-striped table-bordered" style="width:100%">
                    <tr >
                         <td style="height:30px;">Amount in word:</td> 
                         <td colspan="3"><textarea name="amtinword" id="amtinword" style="width:900px"></textarea></td> 
                    </tr>
               </table>
   			    <table class="table-striped table-bordered" style="width:100%; text-align:center; border:#00C solid 1px;" >
              		<tr>
                         <td style="padding-bottom:10px; padding-top:10px"><input type="submit"  name="save" value=" Save " class="btn btn-blue" /></td> 
                    </tr>
              </table>
            </form>
	 </div>
     	<?php
			}
			if ($pg == "4")			
						{
			?>
            	<form method="post" action="?pg=5" name="paymentForm" onsubmit="return loginCheck22()">
				<span style="font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FF0000"><?php echo $sql; ?></span>
                <table class="table-striped table-bordered" style="width:100%">
                    <tr >
                         <td style="height:30px;">Ref No:</td> 
                         <td><input type="text" name="refno" value="<?php echo $content1["refno"] ?>" style="height:30px" /> </td> 
                         <td>Bank Name:</td>  
                         <td><input type="text"  name="bank" value="<?php echo $content1["bank"] ?>" style="height:30px" /></td>     
                    </tr>
                    <tr>
                         <td>No:</td> 
                         <td><input type="text"  name="no" value="<?php echo $content1["no"] ?>" style="height:30px" /> </td> 
                         <td>Account Name:</td>  
                         <td><input type="text"  name="accname" value="<?php echo $content1["accname"] ?>" style="height:30px" /></td>     
                    </tr>
                    <tr>
                        <td>Payee ID:</td>
                        <td><input type="text"  name="payeeid" value="<?php echo $content1["payeeid"] ?>" style="height:30px" /></td>
                        <td>Account No:</td>
                        <td><input type="text"  name="accno" value="<?php echo $content1["accno"] ?>" style="height:30px" /> </td>
                    </tr>
                     <tr>
                        <td>Payee Name</td>
                        <td> <input type="text"  name="payeename" value="<?php echo $content1["payeename"] ?>" style="height:30px" /> </td>
                        <td>Cheque No:</td>
                        <td> <input type="text"  name="chequeno" value="<?php echo $content1["chequeno"] ?>" style="height:30px"/></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>N<input type="text"  name="amount" id="amount" value="<?php echo $content1["amout"] ?>" style="height:30px"  onchange="return getAmountInWord()" class="number"/>  </td>
                        <td >Due Date:</td>
                        <td>
                            <input name="duedate" type="date" value="<?php echo $content1["duedate"] ?>" style="height:30px"/>
                        </td>
                    </tr>
               </table>
               
               <table class="table-striped table-bordered" style="width:90%; border:#309 solid 1px; text-align:center">
                    <tr>
                         <td>ACCT. CODE:</td> 
                         <td>NARRATION: </td> 
                         <td>INVOICE AMT.<br /> BEFORE TAX:</td>  
                         <td colspan="3">
                         		<table style="width:100%; text-align:center">
                                	<tr> <td colspan="3"> TAX ELEMENTs:</td></tr>
                                    <tr> <td>WITH:</td> <td>VAT:</td> <td>LEVY</td></tr>
                                </table>
                         </td> 
                         <td>NET PAY</td>    
                    </tr>
                     <tr align="center">
                         <td ><input type="text"  name="ctcode" value="<?php echo $content1["ctcode"] ?>" style="height:30px;" /></td> 
                         <td><textarea name="nara"><?php echo $content1["naration"] ?></textarea></td> 
                         <td><input type="text"  name="before" value="<?php echo $content1["amtb4tax"] ?>" style="height:30px" /></td>  
                         <td><input type="text"  name="with" value="<?php echo $content1["withtax"] ?>" style="height:30px;" /></td> 
                         <td><input type="text"  name="vat" value="<?php echo $content1["vat"] ?>" style="height:30px;" /></td> 
                         <td><input type="text"  name="levy" value="<?php echo $content1["levy"] ?>" style="height:30px;" /></td>
                         <td><input type="text"  name="netpay" value="<?php echo $content1["netpay"] ?>" style="height:30px;" /></td>    
                    </tr>
              </table>	
              <table class="table-striped table-bordered" style="width:100%; border:#F00 solid 1px;" >
              		<tr>
                         <td width="100px">GRAND TOTAL:</td> 
                         <td style="padding-left:10px; padding-top:10px"><input type="text"  name="grandtotal" value="<?php echo $content1["grandtotal"] ?>" style="height:30px; " /></td> 
                         <td>Paid By:</td>
                        <td><input type="text"  name="issue" value="<?php echo $user["surname"]." ".$user["fname"] ?>" style="height:30px" /></td>
                    </tr>
              </table>
                <table class="table-striped table-bordered" style="width:100%">
                    <tr >
                         <td style="height:30px;">Amount in word:</td> 
                         <td colspan="3"><textarea name="amtinword" id="amtinword" style="width:900px"><?php echo $content1["amtinword"] ?></textarea></td> 
                    </tr>
                    
               </table>
   			    <table class="table-striped table-bordered" style="width:100%; text-align:center; border:#00C solid 1px;" >
              		<tr> <input type="hidden"  name="pvid" value="<?php echo $content1["pvid"] ?>" />
                    	 <input type="hidden"  name="term" value="<?php echo $content3["tid"] ?>" />
                         <input type="hidden"  name="sesion" value="<?php echo $content4["sid"] ?>" />
                         <td style="padding-bottom:10px; padding-top:10px"><input type="submit"  name="update" value=" Update " class="btn btn-primary" /></td> 
                    </tr>
              </table>
            </form>
     	<?php
			}
			?>
  				</div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>

<script language="javascript">
function markStudents() {
	if(document.frmReg.search.value == "") {
		alert ("Please Payee Name or ID")
		document.frmReg.search.focus();
		return false
	}
	else {
		return true
	}
}

function loginCheck22() {
	if(document.paymentForm.payeeid.value == "") {
		alert ("Please enter Payee ID")
		document.paymentForm.payeeid.focus();
		return false
	}
	else if(document.paymentForm.payeename.value == "") {
		alert ("Please enter Payee Name")
		document.paymentForm.payeename.focus();
		return false
	}
	else if(document.paymentForm.amount.value == "") {
		alert ("Please enter Amount")
		document.paymentForm.amount.focus();
		return false
	}
	else if(document.paymentForm.bank.value == "") {
		alert ("Please enter Bank")
		document.paymentForm.bank.focus();
		return false
	}
	else if(document.paymentForm.accname.value == "") {
		alert ("Please enter Account Name")
		document.paymentForm.accname.focus();
		return false
	}
	else if(document.paymentForm.accno.value == "") {
		alert ("Please enter Account No")
		document.paymentForm.accno.focus();
		return false
	}
	else if(document.paymentForm.chequeno.value == "") {
		alert ("Please enter Cheque No")
		document.paymentForm.chequeno.focus();
		return false
	}
	else if(document.paymentForm.duedate.value == "") {
		alert ("Please enter Due Date")
		document.paymentForm.duedate.focus();
		return false
	}
	else if(document.paymentForm.issue.value == "") {
		alert ("Please enter Issue By")
		document.paymentForm.issue.focus();
		return false
	}
	else if(document.paymentForm.issuedate.value == "mm/dd/yyyy") {
		alert ("Please enter Issue Date")
		document.paymentForm.issuedate.focus();
		return false
	} 
	else {
		return true
	}	
}
</script>

<script type="text/javascript">
	$('input.number').keyup(function (event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) {
            event.preventDefault();
        }

        var currentVal = $(this).val();
        var testDecimal = testDecimals(currentVal);
        if (testDecimal.length > 1) {
            console.log("You cannot enter more than one decimal point");
            currentVal = currentVal.slice(0, -1);
        }
        $(this).val(replaceCommas(currentVal));
    });

    function testDecimals(currentVal) {
        var count;
        currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
        return count;
    }

    function replaceCommas(yourNumber) {
        var components = yourNumber.toString().split(".");
        if (components.length === 1)
            components[0] = yourNumber;
        components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        if (components.length === 2)
            components[1] = components[1].replace(/\D/g, "");
        return components.join(".");
    }
	
//#################################################################################################
function getAmountInWord(){
	//declaare a variable that collects the value in the select button
	var facultyfield=$('#amount').val();
	//checks if the variable is empty
	if( facultyfield=="")
	{
		$('#container').html("<strong> No value selected for the search record");
		return false;
	}
	
	mypath='amount='+facultyfield;
			$.ajax({
			type:'POST',
			url:'money-in-words.php',
			data:mypath,
			cache:false,
			success:function(resps){
			$('dept_div').empty();
			//returns the reponse
			$('#amtinword').val(resps);
			return false;
		}
	});
	return false;
}
//########################################################################################################
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

