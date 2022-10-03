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
    header("location:faculty?page=glossary_module");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Glossary Record Saved Successfully!!!'; 
     header("location:faculty?page=glossary_module");
     exit;
  }  
}

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
$cid = mysqli_real_escape_string($con,$_REQUEST['cid']);
	
$sql="DELETE FROM erga_glossary_avp WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Glossary Record!!!'; 
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

if ($prc=='N') {		
$title = strtoupper(mysqli_real_escape_string($con,$_POST['title']));
	
$sql="INSERT INTO erga_category_list(category) VALUES ('$title')";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving Glossary Category!!!'; 
    header("location:admin?page=glossary_settings");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Glossary Glossary Category Saved Successfully!!!'; 
     header("location:admin?page=glossary_settings");
     exit;
  }  
}

if ($prc=='X') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM `erga_category_list` WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Glossary Record!!!'; 
	echo $sql;
    header("location:admin?page=glossary_settings");
    exit;
  }
 else  
   { $_SESSION['errmsg']=' Glossary Record Deleted Successfully!!!'; 
     header("location:admin?page=glossary_settings");
     exit;
  }  
}

if ($prc=='U') {		
$title = mysqli_real_escape_string($con,$_POST['title']);
$flink = mysqli_real_escape_string($con,$_POST['flink']);
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="UPDATE erga_glossary_avp SET title='$title', flink='$flink' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Updating Glossary Record!!!'; 
    header("location:faculty?page=glossary_module");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Glossary Record Updated Successfully!!!'; 
     header("location:faculty?page=glossary_module");
     exit;
  }  
}

if ($prc=='NT') {
$cid = mysqli_real_escape_string($con,$_REQUEST['cid']);	
$gtype = mysqli_real_escape_string($con,$_POST['gtype ']);	
$qst = mysqli_real_escape_string($con,$_POST['nqst']);
$qa1 = mysqli_real_escape_string($con,$_POST['nqa1']);
$qa2 = mysqli_real_escape_string($con,$_POST['nqa2']);
$qa3 = mysqli_real_escape_string($con,$_POST['nqa3']);
$qa4 = mysqli_real_escape_string($con,$_POST['nqa4']);
$qky = $_POST['nqky'];		
	
	$sql="INSERT INTO erga_glossary_trivia(cid, gtype, gquest, gans1, gans2, gans3, gans4, gkey) VALUES ('$cid', '$gtype', '$qst', '$qa1', '$qa2', '$qa3', '$qa4', '$qky')";  
	
	 if (!mysqli_query($con,$sql))
	  {  
		$_SESSION['errmsg']='Error Saving Glossary Assessment Record!!!'; 
		header("location:faculty?page=glossary_module&cid=$cid");
		exit;
	  }
	 else  
	   { 
		 $_SESSION['errmsg']=$msg.' Assessment Content Successfull!!!'; 
		 header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
		 exit;
	  }
}	
?>