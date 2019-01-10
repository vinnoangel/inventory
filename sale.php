<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];

	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pv = isset($_GET["pv"]) ? $_GET["pv"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';


if($pg == ""){
	
	$_SESSION["id"] = isset($_POST['customer']) ? $_POST['customer'] : '';
}
?>

<?php
	if($pg == "1"){
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
			mysqli_query($db, "delete from cart where cart_id = '$TXTid' ") or die(mysqli_error($db)) ;
			$_SESSION["id"] = $_POST['customer'];
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
                <h3>Sales
                <span style="color:#F00">
                <?php 
					$datetime = date("Y-m-d H:i:s");
                	$select_content=("select * from happyhour WHERE shh <= '$datetime' and ehh >= '$datetime'");
					$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
					$content = mysqli_fetch_assoc($content_result);
					$num_chk = mysqli_num_rows ($content_result);
					if($num_chk>0){echo "Happy Hour Time is ON"; }
				?>
                </span>
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                	<a href="dashboard" class="btn btn-sm btn-success" style="margin-top:6px"><i class="fa fa-home"></i> Dashboard</a>
                    <a href="sale" class="btn btn-sm btn-dark" style="margin-top:6px"><i class="fa fa-building"></i>New Sale</a>

                 	<?php //include("menu.php");?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" > 
                <form method="post" action="receiptprint?pg=7" name="frmSearch" id="frmSearch" onSubmit="return println()">
                
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
                     <div class="col-md-3 col-sm-3 col-xs-3">
                        <img id="pic" name="pic" src="<?php echo $pic; ?>" width="30px" height="30px" />   
                        <input type="hidden"  name="img" id="picname" value="<?php echo $pic ?>"/>
                    </div>
					<div class="clearfix"></div>
           		 </div>
            <div class="x_content">
        	
              <table style="width:100%">
              	<tr><td style="width:30%">
                        <table style="width:100%">
                          <tr>
                              <th>Item</th>
                          </tr>
                          <tr>
                             <td style="padding-right:40px">
                                <select name="searchItem" id="searchItem" class="select2_group form-control"  tabindex="-1" onChange="return loadItem()">
                                    <option value="">--Select Item</option>
                                    <?php
                                         if($classv == ""){
                                             $select_content2=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id order by item asc");
                                         }else{
                                            $select_content2=("select * from items i INNER JOIN categories c ON c.cid=i.cat_id where class='$classv' order by item asc");
                                         }
                                          $content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
                                          $content2 = mysqli_fetch_assoc($content_result2);
                                          $num_chk2 = mysqli_num_rows ($content_result2);
                                          $k = 0
                                      ?>
                                    <?php do { 	?>
                                    <option value="<?php echo  $content2['iid']?>" <?php if($content2['iid'] == $txtID){?> selected="selected" <?php } ?>><?php echo $content2['item']." (". $content2['category'] .")"?></option>
                                    <?php } while ($content2 = mysqli_fetch_assoc($content_result2)); ?>
                                  </select><br><span id="container" style="color:#F00"></span>
                              </td>
                           </tr>
                         </table>
                     	</td>
              				<td>
                            	<div id="fixedamount" style="display: none">
                                    <table style="width:100%">
                                      <tr>
                                          <th style="width:20%">Price</th>
                                          <th style="width:20%">Remaining Qty</th>
                                          <th style="width:20%">Qty</th>
                                          <th style="width:35%">Total Amount</th>
                                      </tr>
                                      <tr>
                                          <td>
                                            <input type="text" class="number" name="saleprice" id="saleprice"  readonly style="border:0px"/>
                                         </td>
                                          <td>
                                            <input type="text" class="number" name="aquantity" id="aquantity"  readonly style="border:0px"/>
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
                              <input type="hidden" name="item_status" id="item_status" value="" readonly style="border:0"/>
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
                          <th>Price</th>
                          <th>Total Amount</th>
                          <th>Remove</th>
                      </tr>
                  </thead>
                  <tbody class="cart_add" id="cart_add">
			
                  </tbody>
                </table>
                <table style="font-size:20px; width:100%; font-weight:bold; margin-top:0px; padding-top:10px">
                    <tr>
                        <td width="10%">Total</td>
                        <td width="10%" align="right" id="tamt"> N 0.0 </td>
                        <td width="50%" align="right"> 
                        <input type="hidden"  name="sumTotal" id="sumTotal" value="0"/>
                        <input type="hidden" id="custID"  name="custID" >
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
                               <input  type="submit" class="btn btn-primary" value=" Make Payment " id="payments" /> 
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
				alert("Paying Cash is Less Than Purchasing Amount");
				return false;
			}
			else{
				$("#payments").attr("disabled",true) // Disable Button
				$("#cartBtn").attr("disabled",true) // Disable Button
				$("#payments").attr("disabled",true) // Disable Button
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
function loadItem(){	
	var item_id=$('#searchItem').val();
	$('#container').html("");
	//alert(item_id)
	//checks if the variable is empty
	if(item_id=="")
	{
		$('#container').html("<strong>selecte Item to search");
		return false;
	}
	mypath='mode=getItemDetail&item_id='+item_id;
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
			$('#aquantity').val(respons.quantity);
			$('#item_status').val(respons.item_status);
			document.getElementById('pic').setAttribute('src', respons.pic);
			
			$('#cartBtn').show();
			$('#fixedamount').show();
			$('#itemholder').show();
			if(respons.item_status == 1){
				$('#quantity2').val(respons.quantity);
				$('#saleprice').val(respons.saleprice);
				//$("#totalamount").attr("disabled", "disabled");
				$('#totalamount').attr('readonly', true);
			}
			else{
				$('#saleprice').val("No Fixed Price");
				//$("#totalamount").removeAttr("disabled");
				$('#totalamount').attr('readonly', false); 
			}
			return false;
		}
	});
	return false;
}

function amountCalc(){
	var q1 = $('#quantity').val()
	var q2 = $('#quantity2').val()
	var pr = eval($('#saleprice').val())
	if(eval(q1) > eval(q2)){
		alert ("Insufficient Item! \nThe Quantity is greater then stock in the shop")
		$('#quantity').val("")
		$('#quantity').focus()
		return false
	}
	else{
		var totalamt = eval(q1) * eval(pr)
		var num = totalamt.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		$('#totalamount').val(num)
	}
	return false;
}

function loadcart(){
	//checks if the variable is empty
	var item_status = $('#item_status').val();
	var q1 = $('#quantity').val()
	var q2 = $('#quantity2').val()
	$("#totlamount").removeAttr("disabled"); 
	if(document.frmSearch.searchItem.value == ""){
		alert ("Select ITEM!\n Select an item to add")
		document.frmSearch.searchItem.focus();
		return false
	}
	if(item_status == 1){
		if(q1 <= 0 || q1 == "") {
			alert ("Pleas, enter Quantity")
			document.frmSearch.quantity.focus();
			return false
		}
		if(eval(q1) > eval(q2)) {
			alert ("Insufficient Item!\n The Quantity is greater then stock in the shop")
			$('#quantity').val("")
			return false
		}
		else{
			callAddCart()
		}
	}
	if(item_status == 0){
		var amt = $('#totalamount').val()
		if(q1 <= 0 || q1 == "") {
			alert ("Pleas, enter Quantity")
			document.frmSearch.quantity.focus();
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
		"mode": "addToCart"
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
