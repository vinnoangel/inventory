<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$xID = $_SESSION["ustcode"];

	$pg = isset($_GET["pg"]) ? $_GET["pg"] : '';
	$pgs = isset($_GET["pgs"]) ? $_GET["pgs"] : '';
	$sql = isset($_GET["sql"]) ? $_GET["sql"] : '';
	$cusid = isset($_GET["bid"]) ? $_GET["bid"] : '';
	
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

<?php include("header.php"); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Return Item </h3>
            </div>

            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                	<a href="dashboard" class="btn btn-sm btn-success" style="margin-top:6px"><i class="fa fa-home"></i> Dashboard</a>
                    <a href="sale" class="btn btn-sm btn-dark" style="margin-top:6px"><i class="fa fa-building"></i>New Sale</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" > 
                
                <?php
					if($cusid != ""){
				?>
                 <div class="x_title">
                 <h3>
                            <?php
								$select_content11=("select * from customers WHERE cid='$cusid'");
								$content_result11= mysqli_query($db, $select_content11) or die (mysqli_error($db));
								$content11 = mysqli_fetch_assoc($content_result11);
								echo $content11['name'];
							?>
                    </h3>      
					<div class="clearfix"></div>
           		 </div>
                 <?php
					}
				?>
            <div class="x_content">
        	<form method="post" action="receiptprint?pg=7" name="frmSearch" id="frmSearch" onSubmit="return println()">
              <table class="table table-striped responsive-utilities jambo_table" >
                 <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Total Amount</th>
                          <!--<th>Return</th>-->
                      </tr>
                  </thead>
                  <tbody>
					<?php
						$select_content13=("select * from sales WHERE transID='$pgs'");
						$content_result13= mysqli_query($db, $select_content13) or die (mysqli_error($db));
						$content13 = mysqli_fetch_assoc($content_result13);
						$num_chk13 = mysqli_num_rows ($content_result13);
						$k =1;
						if($num_chk13 > 0){
							do{
								$itemID = $content13['item_id'];
								$select_content2=("select * from items where iid='$itemID'");
								$content_result2= mysqli_query($db, $select_content2) or die (mysqli_error($db));
								$content2 = mysqli_fetch_assoc($content_result2);
								
					?>
                    	<tr>
                          <td><?php echo $k; ?></td>
                          <td><?php echo $content2['item']; ?></td>
                          <td><?php echo $content13['quantity']; ?></td>
                          <td><?php echo $content13['price']; ?></td>
                          <td><?php echo $content13['soldprice']; ?></td>
                          <!--<td><a class="btn btn-danger" onClick="return deleteAction(<?php echo $itemID; ?>)">Return</a></th>-->
                        </tr>
                    <?php
							$k++;	
							}while($content13 = mysqli_fetch_assoc($content_result13));
						}
					?>
                    	<tr>
                          <td colspan="5" align="center"><a class="btn btn-danger" onClick="return returnItem()">Return Item(s)</a></td>
                        </tr>
                  </tbody>
              </table>
            </form>   
            		
   </div>
 </div>
 </div>
 </div>
<?php include("includes/footer.php") ?>
<script src="js/jquery.blockUI.js"></script>

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
