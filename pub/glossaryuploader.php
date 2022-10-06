<?php
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; 

# My time zone
$timezone = "Asia/Manila";
# PHP 5
date_default_timezone_set($timezone);
//echo gmdate("l, F d, Y - h:i a",$local); 
$rdate = date('Y-m-d-H-i-s');
$prc=$_REQUEST['prc'];
$cid=$_REQUEST['cid'];
$tid=$_REQUEST['tid'];
if($prc=='I') {
	if(!empty($_FILES)){     
		$upload_dir = "../uploader/uploads/";
		$fileName = $_FILES['file']['name'];
		$uploaded_file = $upload_dir.$fileName;    
		if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
			$sqlne = mysqli_query($con,"INSERT INTO erga_glossary_attach(tid, attch, atype) VALUES('$tid','$fileName','I')");
		}   
}
}

if($prc=='V') {
$alink=$_POST['flink'];	
	$sqlne = mysqli_query($con,"INSERT INTO erga_glossary_attach(tid, attch, atype) VALUES('$tid','$alink','V')");
	header("location:faculty?page=glossary_module&cid=$cid&tid=$tid&ua=UA");
    exit;
}
?>