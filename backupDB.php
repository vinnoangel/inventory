<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Backup</title>

<link rel="stylesheet" type="text/css" href="../../CSS/menu.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/general.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/modalWindow.css" />
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript"> 
function confirmdelete()
{ 
 return confirm("Are you sure you want to delete?");  
} 
</script> 
<script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>

</head>

<body onload="startTime()">
 <center>
 <ul id="menu">
	<li><a href="../../Admin/home.php">Home</a></li>
	<li>
		<a href="#">Transaction</a>
		<ul>
			<li><a href="../../Admin/supply.php">SUPPLY MGNT</a></li>
			<li><a href="../../Admin/Request/request.php">REQUEST SUPPLY</a></li>
			<li><a href="../../Admin/reqSupply.php">REQUEST SUPPLY</a></li>
		</ul>
	</li>
	<li>
		<a href="#">Set-up</a>
		<ul>
			<li><a href="../../Admin/addDiv.php">DIVISION</a></li>
			<li><a href="../../Admin/employee.php">EMPLOYEE</a></li>
			<li><a href="../../Admin/userReg.php">USER MGNT</a></li>
		</ul>
	</li>
	<li>
		<a href="#">TOOLS</a>
		<ul>
			<li><a href="#">USER'S LOG</a></li>
			<li><a href="../../Admin/databasebackup/backupDB.php">BACK-UP DATABASE</a></li>
		</ul>
	</li>
	<li><a href="#">Print</a></li>
	<li><a href="#">Help</a></li>
     <div style="float:right; font-family:Arial, Helvetica, sans-serif; color:#FFFFFF; margin-right:5px">
	 
     <SCRIPT LANGUAGE="Javascript">
<!-- 

// Array of day names
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday",
				"Thursday","Friday","Saturday");

// Array of month Names
var monthNames = new Array(
"January","February","March","April","May","June","July",
"August","September","October","November","December");

var now = new Date();
document.write(dayNames[now.getDay()] + ", " + 
monthNames[now.getMonth()] + " " + 
now.getDate() + ", " + now.getFullYear());

// -->
</SCRIPT>
     <div id="txt"></div>
    </div>
</ul>
 </center>
 
  <center>
   <?php include("../../header1.php"); ?>
  </center>
  
   <center>
     <div class="employee">
	   <div class="employeeHead">
	   
	    <div class="empTopLeft">
	
         <a href="backup.php" id="sss">
		
<img src="backup.png" alt="backup" />
</a>
      
		</div>
		
		<div class="empTopRight"> 
		</div>		
	   </div>
	   
	   <div class="backup">

<div class="conBackup">

<h1 class="title">Backup Archives</p>

<table
<tr id="head">
<td width="350">
File Name
</td>
<td width="100">
Action
</td>
<td>
Delete
</td>
</tr>
<?php
// List the files
$dir = opendir ("./DB_backup"); 
while (false !== ($file = readdir($dir))) { 

	// Print the filenames that have .sql extension
	if (strpos($file,'.sql',1)) { 

	// Remove the sql extension part in the filename
	$filenameboth = str_replace('.sql', '', $file);
                        
	// Print the cells

		echo "<tr id='eee'>";
		echo '<td>'.$filenameboth.".sql".'</td>';
		echo "<td>"."<a href='DB_backup/" . $filenameboth . ".sql' class='view'>Download SQL</a>"."</td>";
		echo "<td>"."<a class='view'>Delete</a>"."</td>";
		echo "</tr>";
		
	} 
} 
?> 
</table>
   </div
	   ></div>
	 </div>
   </center> 
   
  
  <center>
   <?php include("../../footer.php"); ?>  
  </center>
</body>
</html>