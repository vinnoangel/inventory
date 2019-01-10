<?php require_once("../includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

$xID = $_SESSION["ustcode"];
$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
?>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="../css/DT_bootstrap.css">

<?php
if ($pg ==2)
{
		$select_content4=("select * from school");
		$content_result4= mysqli_query($db, $select_content4) or die (mysqli_error($db));
		$content4 = mysqli_fetch_assoc($content_result4);
		
		echo $TXTid = $_GET['pvid'];
		$select_content1=("select * from paymentvoucher WHERE pvid='$TXTid'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$num_chk1 = mysqli_num_rows ($content_result1);
		
		$select_content2=("select * from terms where status ='1'");
		$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
		$content2 = mysqli_fetch_assoc($content_result2);
		$num_chk2 = mysqli_num_rows ($content_result2);
?>
        <table width="100%">
            <tr >
                <td width="20%"><img src="../logos/<?php echo $content4["logo"] ?>" width="100px" height="100px"></td>
                <td align="center">
					<h3><?php echo $content4["sname"] ?></h3>
                </td>
                <td width="30%"><?php echo $content4["address"] ?></td>
            </tr>
            <tr >
                <td width="20%">&nbsp;</td>
                <td align="center">
					<h4>PAYMENT VOUCHER</h4>
                </td>
                <td width="30%"><?php echo date("Y"). " ".$content2["term"]. " TERM" ?></td>
            </tr>
        </table>
         
         <hr>
		<table class="table-striped table-bordered" style="width:100%; font-size:14px">
                    <tr style="height:30px">
                         <td style="height:30px;"><b>REF NO:</b></td> 
                         <td><?php echo $content1["refno"] ?></td> 
                         <td><b>BANK NAME:</b></td>  
                         <td><?php echo $content1["bank"] ?></td>     
                    </tr>
                    <tr style="height:30px">
                         <td><b>No:</b></td> 
                         <td><?php echo $content1["no"] ?></td> 
                         <td><b>ACCOUNT NAME:</b></td>  
                         <td><?php echo $content1["accname"] ?></td>     
                    </tr>
                    <tr style="height:30px">
                        <td><b>PAYEE ID:</b></font></td>
                        <td><?php echo $content1["payeeid"] ?></td>
                        <td><b>ACCOUNT NO:</b></font></td>
                        <td><?php echo $content1["accno"] ?> </td>
                    </tr>
                     <tr style="height:30px">
                        <td><b>PAYEE NAME</b></font></td>
                        <td><?php echo $content1["payeename"] ?></td>
                        <td><b>CHEQUE NO:</b></font></td>
                        <td><?php echo $content1["chequeno"] ?></td>
                    </tr>
                    <tr>
                        <td><b>INVOICE AMT</b></font></td>
                        <td>N<?php echo $content1["amout"] ?></td>
                        <td ><b>DUE DATE:</b></font></td>
                        <td><?php echo $content1["duedate"] ?></td>
                    </tr>
               </table>
               <br>
               <table class="table-striped table-bordered" style="width:100%;  text-align:center; font-size:14px">
                    <tr>
                         <td><b>ACCT. CODE:</b></td> 
                         <td><b>NARRATION:</b> </td> 
                         <td><b>INVOICE AMT.<br /> BEFORE TAX:</b></td>  
                         <td colspan="3">
                         		<table style="width:100%; text-align:center">
                                	<tr> <td colspan="3"> <b>TAX ELEMENTs:</b></td></tr>
                                    <tr> <td><b>WITH:</b></td> <td><b>VAT:</b></td> <td><b>LEVY</b></td></tr>
                                </table>
                         </td> 
                         <td><b>NET PAY</b></td>    
                    </tr>
                     <tr align="center" style="height:30px">
                         <td >&nbsp; <?php echo $content1["ctcode"] ?></td> 
                         <td>&nbsp;<?php echo $content1["naration"] ?></td> 
                         <td>&nbsp;<?php echo $content1["amtb4tax"] ?></td>  
                         <td>&nbsp;<?php echo $content1["withtax"] ?></td> 
                         <td>&nbsp;<?php echo $content1["vat"] ?></td> 
                         <td>&nbsp;<?php echo $content1["levy"] ?></td>
                         <td>&nbsp;<?php echo $content1["netpay"] ?></td>    
                    </tr>
              </table>	
               <br>
              <table class="table-striped table-bordered" style="width:100%; font-size:14px" >
              		<tr style="height:30px">
                         <td width="150px"><b>GRAND TOTAL:</b></td> 
                         <td style="padding-left:10px; padding-top:10px"><?php echo $content1["grandtotal"] ?></td> 
                    </tr>
              </table>
             <br>
               <table class="table-striped table-bordered" style="width:100%; font-size:14px">
                    <tr style="height:30px">
                         <td style="height:30px;"><b>PREPARED BY:</b></td> 
                         <td><?php echo $content1["raisedby"] ?> </td> 
                         <td><b>AUDITED BY:</b></td>  
                         <td><?php echo $content1["Auditedby"] ?></td>     
                    </tr>
                    <tr style="height:30px">
                         <td><b>DATE:</b></td> 
                         <td><?php echo $content1["raiseddate"] ?> </td> 
                         <td><b>DATE:</b></td>  
                         <td><?php echo $content1["Auditeddate"] ?></td>     
                    </tr>
                    <tr style="height:30px">
                        <td><b>SIGNATURE:</b></font></td>
                        <td></td>
                        <td><b>SIGNATURE:</b></font></td>
                        <td> </td>
                    </tr>
                     <tr style="height:30px">
                        <td><b>APPROVED By</b></font></td>
                        <td><?php echo $content1["Authorizedby"] ?></td>
                        <td><b>PAID By:</b></font></td>
                        <td> <?php echo $content1["issuedby"] ?></td>
                    </tr>
                    <tr style="height:30px">
                        <td><b>DATE</b></font></td>
                        <td> <?php echo $content1["Authorized"] ?> </td>
                        <td ><b>DATE:</b></font></td>
                        <td><?php echo $content1["issueddate"] ?></td>
                    </tr>
                    <tr style="height:30px">
                        <td><b>SIGNATURE</b></font></td>
                        <td>  </td>
                        <td ><b>SIGNATURE:</b></font></td>
                        <td> </td>
                    </tr>
               </table>
                <br>
                <table class="table-striped table-bordered" style="width:100%; font-size:14px">
                    <tr style="height:30px">
                         <td style="height:30px;"><b>Amount in word:</b></td> 
                         <td colspan="3"><?php echo $content1["amtinword"] ?></td> 
                    </tr>
                    <tr style="height:30px">
                         <td><b>PAYEE'S SIGNATURE:</b></td> 
                         <td><?php echo $content1["cc1"] ?> </td> 
                         <td><b>PAYEE'S SIGNATURE::</b></td>  
                         <td><?php echo $content1["cc2"] ?></td>     
                    </tr>
                    <tr style="height:30px">
                        <td><b>DATE:</b></font></td>
                        <td><?php echo $content1["ccdate"] ?></td>
                        <td><b>DATE:</b></font></td>
                        <td><?php echo $content1["cc3"] ?></td>
                    </tr>
               </table>
		
        <table width="100%">
             <tr>
                <td align="center" style="padding:20px"> <a href="javascript:window.print()" >Print </a> </td>
            </tr>
        </table>
<?php
}
else{
	echo $sql;
}
?>
<br><br><br><br><br><br><br>
Powered by www.noraktech.com