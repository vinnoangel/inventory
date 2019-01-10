<?php 
require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>

<?php
$xID = $_SESSION["ustcode"];
if($_POST["mode"]=="getItemDetail")
{
	$txtID =$_POST['item_id']; 
	$select_content1=("select * from items WHERE iid ='$txtID'");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	$num_chk1 = mysqli_num_rows ($content_result1);
	
	$datetime = date("Y-m-d H:i:s");
	$select_content=("select * from happyhour WHERE shh <= '$datetime' and ehh >= '$datetime'");
	$content_result= mysqli_query($db, $select_content) or die (mysqli_error($db));
	$content = mysqli_fetch_assoc($content_result);
	$num_chk = mysqli_num_rows ($content_result);
	if($num_chk>0){
		$sell = $content1['saleprice'] - (($content["discount"]/100) * $content1['saleprice']);
	}
	else{
		$sell = $content1['saleprice'];
	}
	
	if ($num_chk1 == 0)
		{
			echo "<b>Item not found: Invalid item search<b>";
		}
	else
		{
		$retArr = array();
		$retArr["itemid"] = $content1['iid'];
		$retArr["itemname"] = $content1['item'];
		$retArr["quantity"] = $content1['quantity'];
		$retArr["price"] = $content1['price'];
		$retArr["saleprice"] = $sell;
		$retArr["item_status"] = $content1['item_status'];
		$retArr["pic"] = "uploads/shopitem/".$content1['image'];
		echo json_encode($retArr); //Send Item Detail
	}
}
if($_POST["mode"]=="getServiceDetail")
{
	$txtID =$_POST['item_id']; 
	$select_content1=("select * from services WHERE iid ='$txtID'");
	$content_result1= mysqli_query($db, $select_content1) or die (mysqli_error($db));
	$content1 = mysqli_fetch_assoc($content_result1);
	$num_chk1 = mysqli_num_rows ($content_result1);
	
	if ($num_chk1 == 0)
		{
			echo "<b>Item not found: Invalid item search<b>";
		}
	else
		{
		$retArr = array();
		$retArr["itemid"] = $content1['iid'];
		$retArr["itemname"] = $content1['item'];
		$retArr["price"] = $content1['price'];
		echo json_encode($retArr); //Send Item Detail
	}
}

if($_POST["mode"]=="addEvent")
{
	  $title= $_POST["title"];
	  $descr= $_POST["descr"];
	  $started= $_POST["started"];
	  $end= $_POST["end"];
	  $xdate = date("Y-m-d");
	  $sql= "insert into eventcalender set title='$title', descr='$descr', startdate='$started', enddate='$end', user='$xID', xdate='$xdate' ";
	 $result=mysqli_query($db, $sql) or die(mysqli_error($db));
	 echo "Operation was Successful";
}

if($_POST["mode"]=="sms")
{
	  $sender=$_POST["sender"];
	  $phones = "";
	  $cnt = 0;
	  if($sender == "99999999999"){
		  $sql2="SELECT DISTINCT phone, idno FROM customers "; 
		  $query2=mysqli_query($db, $sql2)or die("The error resulted due to::".mysqli_error($db));
		  while(list($phone)=mysqli_fetch_row($query2))
		  {
			 if($cnt == 0){
				 $phones = $phone;
			 }else{
			 	$phones = $phones.", ".$phone;
			 }
			 $cnt = $cnt+1;
		  }
		  echo $phones;
	  }
	  else{
		  $sql2="SELECT DISTINCT phone, idno FROM customers where cid='$sender'";  
		  $query2=mysqli_query($db, $sql2)or die("The error resulted due to::".mysqli_error($db));
		  while(list($phone)=mysqli_fetch_row($query2))
		  {
			echo $phone ;
		  }
	  }
	  
	  
	  
	  //echo $sender.$phones;
}
?>

<?php
if($_POST["mode"] == "scratchcard"){
  	$id =  $_POST['clength'];
	$select_content5=("select * from result_card_activate");
	$content_result5= mysqli_query($db, $select_content5) or die(mysqli_error($db));
	$content5 = mysqli_fetch_assoc($content_result5);
	$num_chk5 = mysqli_num_rows ($content_result5);
	$id = $content5["id"];
	//if($num_chk5 > 0){
?>
		<h5 style="font-size: 12px;"> Number of Characters that will appear on each Card</h5>	
		<label for="noc">No* :</label>
        <input type="number" name="noc" value="<?php echo trim($content5['clength'] );?>" placeholder="Eg 10" />
		
<?php
	//}
}
?>

<?php
if($_POST["mode"] == "trid"){
  	
?>
		
			<tr>
                <td colspan="2">
                    <input type="text" name="tid" class="form-control" />
                </td>
            </tr>	
<?php
}
?>