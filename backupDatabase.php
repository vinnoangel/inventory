<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php

$xID = $_SESSION["ustcode"];
?>
<?php
	$pg = $_GET['pg'];
	$pv = $_GET['pv'];
	$sql = $_GET['sql'];
?>

<?php
	if ($pg == 6)
	{
		$pcode = $_GET['pcode'];
		if($pcode != ""){
			$file = "DB_backup/$pcode";
			unlink($file);
		}
	}
?>


<?php include("header.php"); ?>
<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> DataBase Backup </h2><br />
                    <a href="backup.php" id="sss">
                     <img src="backup.png" alt="backup" />
                    </a></h3>
                </div>
    
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                         <a href="dashboard" class="btn btn-sm btn-success"><i class="fa fa-home"></i> Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
    
            <div class="row">
    
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" >
			        <h3 style="color:#FF0000">Please, Always downlaod the backup and save in External Device</h3>
            <table class="table table-striped table-bordered" id="example">

                <thead>
                <tr>
                    <th>S/N</th>
                    <th>File Name</th>
                    <th>Download</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				// List the files
				$dir = opendir ("./DB_backup"); 
				while (false !== ($file = readdir($dir))) { 
				
					// Print the filenames that have .sql extension
					if (strpos($file,'.sql',1)) { 
				
					// Remove the sql extension part in the filename
					$filenameboth = str_replace('.sql', '', $file);
							$k = $k + 1;			
					// Print the cells
				?>
						<tr id='eee'>
                            <td><?php echo $k ?></td>
                            <td><?php echo  $filenameboth.".sql" ?></td>
                            <td><a href="DB_backup/<?php echo $filenameboth.'.sql' ?>" target='_blank'><img src="images/dbbackup_icon.png"></a> </td>
                            <td><a href="?pg=6&pcode=<?php echo $filenameboth.'.sql'?>" onClick='return confirmDel();' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
						</tr>
				<?php		
					} 
				} 
				?>
			
			</tbody>
			</table>
            </div>
   		</div>
	 </div>
   </div>
 </div>
<?php include("includes/footer2.php") ?>

<script language="JavaScript" type="text/javascript">

function confirmDel(){ // to confirm delete action before url is sent
	//confirm("Do you want to delete this item?");
	if (confirm("Do you want to delete this?")) {
       return true;
    }	
	return false;
}
</script>