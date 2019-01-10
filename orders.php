<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];

	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';

if($pg == ""){
	$var1 = mt_rand(1,10);
	$var2 = mt_rand(1,10);
	$var3 = mt_rand(1,10);
	$var4 = mt_rand(1,10); 
	$_SESSION["transID"] = $var3.time().$var1.$var4;
	$_SESSION["id"] = isset($_POST['customer']) ? $_POST['customer'] : '';
}
?>


<?php
	if($pg == "1"){
		$select_content1=("select * from services WHERE iid='$TXTid'");
		$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
		$content1 = mysqli_fetch_assoc($content_result1);
		$num_chk1 = mysqli_num_rows ($content_result1);
	}
?>


<?php
	if ($pg == 3)
		{
		
			$TXTid = $_GET['id'];
			
			$select_content1=("select * from usercat WHERE id='$TXTid'");
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
                <h3>Order</h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                	<a href="dashboard" class="btn btn-sm btn-success" style="margin-top:6px"><i class="fa fa-home"></i> Dashboard</a>
                    <a href="sale" class="btn btn-sm btn-dark" style="margin-top:6px"><i class="fa fa-building"></i>New Order</a>

                 	<?php //include("menu.php");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" > 
                <form method="post" action="orderprint.php?pg=7" name="frmSearch" id="frmSearch" onSubmit="return println()">
                
                 <div class="x_title">
                 	 <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="customer" id="customer" class="select2_group form-control"  tabindex="-1">
                            <option value="">--Select Customer</option>
                            <?php
                                $id = $_SESSION["id"];
                                $query = mysqli_query($db, "select * from customers") or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($query)) {
                               // $id = $row['cid'];
                              ?>
                            <option value="<?php echo $row['cid'] ?>" <?php if($row['cid'] == $id){?> selected="selected" <?php ; } ?>><?php echo $row['name']." (". $row['idno'] .")"?></option>
                             <?php } ?>
                        </select>
                    </div>
                    
					<div class="clearfix"></div>
           		 </div>
            <div class="x_content">
        	
              <table style="width:100%">
              	<tr><td style="width:30%">
                        <table style="width:100%">
                          <tr>
                              <th>Service</th>
                          </tr>
                          <tr>
                             <td style="padding-right:40px">
                                <select name="searchItem" id="searchItem" class="select2_group form-control"  tabindex="-1" onChange="return loadService()">
                                    <option value="">--Select Service</option>
                                    <?php
                                         if($classv == ""){
                                             $select_content2=("select * from services  order by item asc");
                                         }else{
                                            $select_content2=("select * from services  where class='$classv' order by item asc");
                                         }
                                          $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                          $content2 = mysqli_fetch_assoc($content_result2);
                                          $num_chk2 = mysqli_num_rows ($content_result2);
                                          $k = 0
                                      ?>
                                    <?php if ($num_chk2 > 0) {
                                    	do { 	?>
                                    <option value="<?php echo  $content2['iid']?>" <?php if($content2['iid'] == $txtID){?> selected="selected" <?php } ?>><?php echo $content2['item']?></option>
                                    <?php } while ($content2 = mysqli_fetch_assoc($content_result2));
                                    } ?>
                                  </select><br><span id="container" style="color:#F00"></span>
                              </td>
                           </tr>
                         </table>
                     	</td>
              				<td>
                            	<div id="fixedamount" style="display: none">
                                    <table style="width:100%">
                                      <tr>
                                          <th style="width:25%">Price</th>
                                          <th style="width:20%">Qty</th>
                                          <th style="width:35%">Total Amount</th>
                                      </tr>
                                      <tr>
                                          <td>
                                            <input type="text" class="number" name="saleprice" id="saleprice"  readonly style="border:0px"/>
                                         </td>
                                         <td>
                                         	 <input type="hidden" name="quantity2" id="quantity2" readonly style="border:0px"/>
                                             <input type="text" class="form-control" name="quantity" value="" autocomplete="off" autofocus type="number"  id="quantity" onBlur="return amountCalc()" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>	
                                         </td>
                                         <td>
                                             <input type="text" class="form-control number" name="totalamount" id="totalamount"/>
                                         </td>
                                      </tr>
                                   </table>
                                </div>
                            </td>
                            
                            <td > 
                              <input type="hidden"  name="price" id="price" />
                              <input type="hidden" name="item_id" id="item_id"  required/>
                              <input type="hidden" name="item" id="item" value="<?php echo $item2 ?>" readonly style="border:0"/>
                              <input  type="button" class="btn btn-primary" value="Add to Cart" id="cartBtn" style="display: none" onClick="return loadcart();"/>
                            </td>
                          </tr>
                       </tbody>
                      </table>
           
           		 <div id="itemholder" style="display: none">
                 <table class="table table-striped responsive-utilities jambo_table" >
                 <thead>
                      <tr>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Total Amount</th>
                          <th>Remove</th>
                      </tr>
                  </thead>
                  <tbody class="cart_add" id="cart_add">
			
                  </tbody>
                </table>
                <table style="font-size:20px; width:100%; font-weight:bold; margin-top:0px; padding-top:10px">
                    <tr>
                        <td width="10%">Total:</td>
                        <td width="10%" align="right" id="tamt"> N 0.0 </td>
                        <td width="20%" align="right">Delivering Date: <input type="text" name="deliverdate" id="birthday" class="date-picker form-control" style="font-size:18px; width:150px; height:35px"> </td>
                        <td width="30%" align="right"> 
                        <input type="hidden"  name="sumTotal" id="sumTotal" value="0"/>
                        <input id="custID"  name="custID" type="hidden">
                        <input type="hidden"  name="transID" id="transID" value="<?php echo $_SESSION["transID"] ?>"/>
                        CASH Paid: 
                        <input type="text"  name="cash" value="" class="form-control number" autocomplete="off" autofocus style="font-size:18px; width:150px; height:35px" onKeyDown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"/>
                        </td>
                        <td width="20%" valign="middle">
                        <br>
                        <select name="mode" id="mode" class="form-control">
                        <option value="">Payment Mode</option>
                        <option value="cash">Cash</option>
                        <option value="pos">POS</option>
                        <option value="debt">Debt</option>
                        </select>
                          </td >
                          <td width="10%" style="color:#FFF; font-weight:bold; padding:5px "  align="right"><br>
                               <input  type="submit" class="btn btn-primary" value=" Make Payment " /> 
                          </td>
                    </tr>
                    <tr>               
                </table>
                </div> 
            </form>   
            		
   </div>
 </div>
 </div>
 </div>
<?php include("includes/footer.php") ?>

<script language='javascript'>
	function println() {
		var itid = $('#citem_id').val();
		var cash = document.frmSearch.cash.value
		while (cash.search(",") >= 0) {
			cash = (cash + "").replace(',', '');
		}
		if(document.frmSearch.customer.value == ''){
			alert ("Select Customer")
			return false
		}
		if(document.frmSearch.deliverdate.value == ''){
			alert ("Select Delivering Date")
			document.frmSearch.deliverdate.focus()
			return false
		}
		if(eval(document.frmSearch.sumTotal.value  == 0)) {
			alert ("Cart Error! \n No Item in the Cart")
			return false
		}
		else if((document.frmSearch.mode.value  == 0)) {
			alert ("Cart Error! \n Payment Mode Not Specified")
			return false
		}
		else if((document.frmSearch.mode.value == 'debt') && (document.frmSearch.customer.value == '')){
			alert ("Select Customer")
			return false
		}		
		else{
			if((eval(cash) < eval(document.frmSearch.sumTotal.value)) && document.frmSearch.mode.value != 'debt') {
				alert("Paying Cash is Less Than Order Amount");
				return false;
			}
			else{
				window.open('about:blank', 'popup', 'width=320,height=440,resizeable=no');
				document.frmSearch.setAttribute('target', 'popup');
				document.frmSearch.setAttribute('onsubmit', '');
				document.frmSearch.submit();
				/*$('#cart_add').empty();
				$('#tamt').empty();
				$('#sumTotal').val("");
				$('#mode').val("");
				$('#cash').val("");*/
				/*newWindow=window.open('receiptprint.php?pg=<?php echo $_SESSION["transID"]?>&cash='+document.frmSearch.cash.value+'&custID='+document.frmSearch.customer.value+'&pmode='+document.frmSearch.mode.value+'&itid='+itid,'','width=300px,height=580px')
				newWindow.focus();	*/	
						
			}
		}
	}
</script>

<script language="javascript">
function loadService(){	
	var item_id=$('#searchItem').val();
	$('#container').html("");
	if(item_id=="")
	{
		$('#container').html("<strong>selecte Item to search");
		return false;
	}
	mypath='mode=getServiceDetail&item_id='+item_id;
	$.ajax({
		type:'POST',
		url:'loaddata.php',
		data:mypath,
		dataType: "json",
		//cache:false,
		success:function(respons){
			//returns the reponse
			$('#item_id').val(respons.itemid);
			$('#item').val(respons.itemname);
			$('#price').val(respons.price);
			
			$('#cartBtn').show();
			$('#fixedamount').show();
			$('#itemholder').show();
			if(respons.price == ""){
				$('#saleprice').val("No Fixed Price");
			}
			else{
				var num = eval(respons.price)
				var num2 = num.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('#saleprice').val(num2);
			}
			return false;
		}
	});
	return false;
}

function loadcart(){
	//checks if the variable is empty
	var amt = $('#totalamount').val()
	var q1 = $('#quantity').val()
	if(document.frmSearch.searchItem.value == ""){
		alert ("Select ITEM!\n Select an item to add")
		document.frmSearch.searchItem.focus();
		return false
	}
	if(amt <= 0 || amt =="") {
		alert ("Pleas, enter Amount")
		document.frmSearch.sprice.focus();
		return false
	}
	else{
		callAddCart()
	}
}

function callAddCart(){
	var tsum = eval($('#sumTotal').val());
	var str = $('#totalamount').val();
	while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
	//str = str.replace(",","")
	var totalamt = tsum + eval(str);
	
	var datavalue = {
		"mode": "addServiceToCart"
	};
	datavalue = $("#frmSearch").serialize() + "&" + $.param(datavalue);
	$.ajax({
		type:'POST',
		url:'addtocart.php',
		data:datavalue,
		cache:false,
		success:function(resps){
			//$('#total').val(total);
			$('.cart_add').append(resps);
			$('#sumTotal').val(totalamt);
			var num = 'N' + totalamt.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			$('#tamt').html(num);
	
			$('#quantity2').val(""); $('#quantity').val(""); $('#saleprice').val("");  $('#totalamount').val(""); 
			 $('#searchItem option').attr('selected', false);
			 $('#searchItem').attr('selectedIndex', '-1');
			//$('#searchItem').prop("selected", false)
			return false;
		}
	});
	return false;
}

function deleteAction(id){
	$(".del"+id).remove();// .fadeOut('slow'); 
}
</script>



<script type="text/javascript">
	$(document).ready( function() {
		$('.btn-danger1').click( function() {
			var id = $(this).attr("id");
			document.frmReg3.custID.value =$(this).attr("id");
			document.frmSearch.custID.value =$(this).attr("id");
			mypath='id='+id;
			$.ajax({
				url:'getname.php',
				data:mypath,
				cache:false,
				success:function(resps){
					$('#showName').html(resps);
					return false;
				}
			});
			return false;
		});				
	});
</script>