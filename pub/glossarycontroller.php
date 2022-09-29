<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];
$fid=$_SESSION['id'];

if ($prc=='S') {		
$title = mysqli_real_escape_string($con,$_POST['title']);
$flink = mysqli_real_escape_string($con,$_POST['flink']);
$cid = mysqli_real_escape_string($con,$_REQUEST['cid']);
	
$sql="INSERT INTO erga_glossary_avp(fid, title, flink,ftype) VALUES ('$fid','$title','$flink','$cid')";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving Glossary Record!!!'; 
    header("location:admin?page=glossary_module");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Glossary Record Saved Successfully!!!'; 
     header("location:admin?page=glossary_module");
     exit;
  }  
}

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
$cid = mysqli_real_escape_string($con,$_REQUEST['cid']);
	
$sql="DELETE FROM erga_glossary_avp WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting  Glossary Record!!!'; 
	echo $sql;
    header("location:admin?page=glossary_module&cid=$cid");
    exit;
  }
 else  
   { $_SESSION['errmsg']=' Glossary Record Deleted Successfully!!!'; 
     header("location:admin?page=glossary_module&cid=$cid");
     exit;
  }  
}
?>