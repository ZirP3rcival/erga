<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$stype=$_SESSION['accttype']; 

function randomKey($length) {
    $key= '';	
        
    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
    
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
    }

$prc=$_REQUEST['prc'];
$T0 = mysqli_real_escape_string($con,$_POST['lnme']);
$T1 = mysqli_real_escape_string($con,$_POST['fnme']);
$T2 = mysqli_real_escape_string($con,$_POST['mnme']);
$T3 = $T0.', '.$T1.' '.$T2;
$T4 = mysqli_real_escape_string($con,$_POST['cno']);
$T5 = mysqli_real_escape_string($con,$_POST['eadd']);

if($stype=='ADMIN') {  $indx='admin'; }
else if($stype=='FACULTY') {  $indx='faculty'; }
else if($stype=='STUDENT') {  $indx='student'; }

if ($prc=='A') {			
$id = $_REQUEST['id'];	
$T1 = $_REQUEST['set'];	
	
$sql="UPDATE erga_users_account SET actv='$T1' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Setting User Account Status!!!';  
    header("location:admin?page=accounts_settings");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='User Account Status Set Successfully!!!'; 
     header("location:admin?page=accounts_settings");
     exit;
  }   
}

if ($prc=='C') {		
$T4 = mysqli_real_escape_string($con,$_POST['aeadd']);
$T6 = mysqli_real_escape_string($con,$_POST['ausr']);
$T7 = mysqli_real_escape_string($con,$_POST['apwd']);
$T8 = mysqli_real_escape_string($con,$_POST['atyp']);	
  
$sql="INSERT INTO erga_users_account(eadd,usr,pwd,actv,typ) VALUES ('$T4','$T6',MD5('$T7'),'Y','$T8')";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Saving New User Account!<br>Please Re-type All Entries Properly....'; 
    header("location:admin?page=accounts_settings");
    exit;
  }
 else  
   { $_SESSION['errmsg']='New User Account Submitted Successfully!<br>Please advise user to login and finish profiling'; 
     header("location:admin?page=accounts_settings");
     exit;
  }  
}

if ($prc=='S') {			
	
$sqldata = mysqli_query($con,"SELECT eadd, cno FROM erga_users_account WHERE (eadd like '%$T5%' OR cno like '%$T4%')");	
$count=mysqli_num_rows($sqldata );

if($count>0)
	{ 
		$_SESSION['errmsg'] ='Record Already Exist!!! Cannot Proceed with Registration...';	
		header("location:index.php?page=register");
		exit;
	}	
	
$sql="INSERT INTO erga_users_account(lnme, fnme, mnme, eadd, cno, alyas, actv, typ, usr, pwd) VALUES ('$T0','$T1','$T2','$T5','$T4','$T3','Y','STUDENT','$T5',MD5('$T4'))";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Student Account Record!!!'; 
    header("location:index.php?page=register");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='New Student Account Record Saved Successfully!!!<br><br>Please Login using the following detail...<br>Username: Email Address<br>Password: Contact No'; 
     header("location:index.php?page=login");
     exit;
  }   
}

if ($prc=='D') {	
$id = $_REQUEST['id'];		
$sql="DELETE FROM erga_users_account WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Deleting User Account Record!!!'; 
    header("location:admin?page=accounts_settings");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='User Account Record Deleted Successfully!!!'; 
     header("location:admin?page=accounts_settings");
     exit;
  }   
}

if ($prc=='R') {	
$T1 = mysqli_real_escape_string($con,$_POST['eadd']);
$T2 = mysqli_real_escape_string($con,$_POST['sqs']);
$T3 = mysqli_real_escape_string($con,$_POST['sqa']);	
	
$sql=mysqli_query($con,"SELECT id, eadd, sqt, sqa FROM erga_users_account WHERE eadd='$T1' AND sqt='$T2' AND sqa='$T3'");  
$ct=mysqli_num_rows($sql);
	
while($r = mysqli_fetch_assoc($sql)) 
	{ $id=$r['id']; }	
	
if($ct==0)
{
	$_SESSION['errmsg']='Recovery Details Invalid!!!<br>Cannot Proceed with Recovery Request.'; 
    header("location:index.php?page=recover");
    exit;
}
 else  
   {
	 $otp=randomKey(6);  
	 $pwd=MD5($otp); 
	 $sql0 = mysqli_query($con, "UPDATE erga_users_account SET usr='$T1', pwd='$pwd' WHERE id='$id'");
	 $_SESSION['errmsg']='Account Recovery Successfull!!!<br><br>Please Login using this details:<br> Username: [Email Address]<br>Password: '.$otp; 
     header("location:index.php?page=login");
     exit;
  }   
}

?>