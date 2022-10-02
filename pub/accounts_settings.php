<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$stype=$_SESSION['accttype']; 

$cid=$_REQUEST['id']; 

 $fsrch= $_POST['fsrch'];
 if($fsrch=='') {  $fsrch = $_REQUESTST['fsrch']; }	

 $ssrch= $_POST['ssrch'];
 if($ssrch=='') {  $ssrch = $_REQUESTST['ssrch']; }	
?>
<style>
.form-control  {
    color: #0B0237;
	font-weight: 600;
	font-size: 14px;
}	
</style>
<section class="post-area section-gap">
	<div class="container">
		<h1 class="text-white lpage" style="margin-bottom: 30px;">System Glossary Records Module</h1>				
		<div class="row justify-content-center d-flex">
			<div class="col-lg-12 content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area m-bottom ">
        <div class="container-fluid">           
            <div class="row rowflx" style="margin-bottom: 50px;">
<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31 dash-video" style="padding: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #000!important; text-align: left; padding: 15px;">
			 <span class="fa fa-users" style="margin-right: 15px; font-size: 2em;"></span>Faculty User Accounts Record
			 <button type="button" class="btn btn-success fa fa-save" id="CNEW" data-toggle="modal" data-target="#CUSR" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;" title="Create New Category"></button>
			 </h4>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
				<div class="col-xs-12 col-md-12" style="margin-top: 10px;">
				<form id="msearch" action="?page=accounts_settings&prc=fsch" method="post" class="form-horizontal" style="margin-bottom: 15px;">
				   <div class="input-group">
					 <input name="fsrch" type="text" class="form-control isearch" placeholder="Search Name Here" value="<?=$fsrch;?>">
					  <span class="input-group-btn">
						   <button class="btn btn-default" type="submit" style="background: #0A65D1; color:#fff;padding-left: 10px;padding-right: 10px;">
								<i class="fa fa-search" style="font-size:14px;"></i>
						   </button>
					  </span>
				  </div>
				</form>
				</div>
				<div class="clearfix">  </div>
				<div class="list-group" style="margin-bottom: 5px;">
				<?php 
				$rowsPerPageRV = 5;
				// Get the search variable from URL
				$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
				$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
				$cp=$currentPageRV;

				if($fsrch!='') {	
				$dsql = mysqli_query($con,"SELECT * from erga_users_account where typ='FACULTY' and alyas LIKE '%$fsrch%' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }
				else  {	
				$dsql = mysqli_query($con,"SELECT * from erga_users_account where typ='FACULTY' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }	

				  while($r = mysqli_fetch_assoc($dsql))
				   { $usrpic='data:image/png;base64,'.''.$r['ploc'];
					 if($r['actv']=='Y') { $actv='Active Account'; $clr='#0A65D1'; $stat='N'; }
					 else { $actv='Inactive Account'; $clr='#D9534F'; $stat='Y'; }
					
					if($r['alyas']!='') { $alyas=$r['alyas']; }
					else { $alyas=$r['eadd']; }
					?>            		                       
				<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
				<div class="col-xs-3 col-md-2" style="padding-bottom: 0px; float: left;">
				 <img src="<?=$usrpic?>" style="width: 60%;" onerror="this.src='../img/missing.jpg'">
				</div>
				<div class="col-xs-9 col-md-7" style="padding-bottom: 0px; float: left;">
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; font-weight: 700;"><?=strtoupper($alyas)?></span><br>
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$r['typ'];?></span> | 
				 <span style="color: <?=$clr;?>; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$actv;?></span>
				 </div>
				<div class="col-xs-12 col-md-3 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px; padding: 5px; float: right;">
				<?php if($r['actv']=='N') { ?>
					<a href="accountcontroller.php?prc=D&id=<?=$r['id']?>">
						<button class="btn btn-danger btn-sm fa fa-trash-o" title="Delete this Account" style="float: right; font-size: 18px; padding: 0px 6px;"></button>
					</a>
				<?php } ?>
				<?php if($r['actv']=='N')  { ?>
					<a href="accountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('Activate  User Account?')">
						<button class="btn btn-primary btn-sm fa fa-check" title="Activate User Account" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } else if($r['actv']=='Y')  { ?>
					<a href="accountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('De-Activate  User Account?')">
						<button class="btn btn-warning btn-sm fa fa-times" title="De-Activate  User Account" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } ?>
				</div>
				 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

				</div>

				 <?php  } ?></div>
				<div style="float: left; width: 100%; margin-bottom: 10px;">
							<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=accounts_settings&prc=<?=$prc;?>&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
							<div style="width:60%; float:left; font-size:11px;">
							  <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from erga_users_account where typ='FACULTY' LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=accounts_settings&ppageRV='.($currentPageRV-1).'"></a>'; }

				if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
				else { $d=$currentPageRV + $rowsPerPageRV; }

				if($d > $totalPagesRV) { $d=$totalPagesRV; }
				else { $d=$totalPagesRV; }

				//echo $d.' '.$totalPagesRV;
				for ($x=1;$x<=$d;$x++)
				{  if ($cp==$x) 
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#4850D3; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
				   }
				  else
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=accounts_settings&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=accounts_settings&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
							</div>
							<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=accounts_settings&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
				<div class="clearfix"></div>	        
						  </div>				
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31 dash-video" style="padding: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #000!important; text-align: left; padding: 15px;">
			 <span class="fa fa-users" style="margin-right: 15px; font-size: 2em;"></span>Student User Accounts Record
			 </h4>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
				<div class="col-xs-12 col-md-12" style="margin-top: 10px;">
				<form id="msearch" action="?page=accounts_settings&prc=fsch" method="post" class="form-horizontal" style="margin-bottom: 15px;">
				   <div class="input-group">
					 <input name="ssrch" type="text" class="form-control isearch" placeholder="Search Name Here" value="<?=$ssrch;?>">
					  <span class="input-group-btn">
						   <button class="btn btn-default" type="submit" style="background: #0A65D1; color:#fff;padding-left: 10px;padding-right: 10px;">
								<i class="fa fa-search" style="font-size:14px;"></i>
						   </button>
					  </span>
				  </div>
				</form>
				</div>
				<div class="clearfix">  </div>
				<div class="list-group" style="margin-bottom: 5px;">
				<?php 
				$rowsPerPageSV = 5;
				// Get the search variable from URL
				$currentPageSV = ((isset($_GET['ppageSV']) && $_GET['ppageSV'] > 0) ? (int)$_GET['ppageSV'] : 1);
				$offsetSV = ($currentPageSV-1)*$rowsPerPageSV;
				$cp=$currentPageSV;

				if($ssrch!='') {	
				$dsql = mysqli_query($con,"SELECT * from erga_users_account where typ='STUDENT' and alyas LIKE '%$ssrch%' ORDER BY alyas ASC LIMIT $offsetSV, $rowsPerPageSV"); }
				else  {	
				$dsql = mysqli_query($con,"SELECT * from erga_users_account where typ='STUDENT' ORDER BY alyas ASC LIMIT $offsetSV, $rowsPerPageSV"); }	

				  while($r = mysqli_fetch_assoc($dsql))
				   { $usrpic='data:image/png;base64,'.''.$r['ploc'];
					 if($r['actv']=='Y') { $actv='Active Account'; $clr='#0A65D1'; $stat='N'; }
					 else { $actv='Inactive Account'; $clr='#D9534F'; $stat='Y'; }
					
					if($r['alyas']!='') { $alyas=$r['alyas']; }
					else { $alyas=$r['eadd']; }
					?>            		                       
				<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
				<div class="col-xs-3 col-md-2" style="padding-bottom: 0px; float: left;">
				 <img src="<?=$usrpic?>" style="width: 60%;" onerror="this.src='../img/missing.jpg'">
				</div>
				<div class="col-xs-9 col-md-7" style="padding-bottom: 0px; float: left;">
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; font-weight: 700;"><?=strtoupper($alyas)?></span><br>
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$r['typ'];?></span> | 
				 <span style="color: <?=$clr;?>; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$actv;?></span>
				 </div>
				<div class="col-xs-12 col-md-3 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px; padding: 5px; float: right;">
				<?php if($r['actv']=='N') { ?>
					<a href="accountcontroller.php?prc=D&id=<?=$r['id']?>">
						<button class="btn btn-danger btn-sm fa fa-trash-o" title="Delete this Account" style="float: right; font-size: 18px; padding: 0px 6px;"></button>
					</a>
				<?php } ?>
				<?php if($r['actv']=='N')  { ?>
					<a href="accountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('Activate  User Account?')">
						<button class="btn btn-primary btn-sm fa fa-check" title="Activate User Account" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } else if($r['actv']=='Y')  { ?>
					<a href="accountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('De-Activate  User Account?')">
						<button class="btn btn-warning btn-sm fa fa-times" title="De-Activate  User Account" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } ?>
				</div>
				 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

				</div>

				 <?php  } ?></div>
				<div style="float: left; width: 100%; margin-bottom: 10px;">
							<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=accounts_settings&prc=<?=$prc;?>&ppageSV=<?=($currentPageSV-1)?>"> prev </a></div>
							<div style="width:60%; float:left; font-size:11px;">
							  <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from erga_users_account where typ='STUDENT' LIMIT $rowsPerPageSV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesSV = ceil($row['crt'] / $rowsPerPageSV);

				if($currentPageSV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=accounts_settings&ppageSV='.($currentPageSV-1).'"></a>'; }

				if($totalPagesSV < $rowsPerPageSV) { $d=$totalPagesSV; }
				else { $d=$currentPageSV + $rowsPerPageSV; }

				if($d > $totalPagesSV) { $d=$totalPagesSV; }
				else { $d=$totalPagesSV; }

				//echo $d.' '.$totalPagesSV;
				for ($x=1;$x<=$d;$x++)
				{  if ($cp==$x) 
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#4850D3; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
				   }
				  else
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=accounts_settings&ppageSV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesSV .'</strong> pages</span>'; 

				if($currentPageSV < $totalPagesSV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=accounts_settings&ppageSV='.($currentPageSV+1).'"></a>'; }
				?>
							</div>
							<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=accounts_settings&ppageSV=<?=($currentPageSV+1);?>"> next </a></div>
				<div class="clearfix"></div>	        
						  </div>				
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  
            </div>           
        </div>
    </div>
    <!-- user account info end -->
			</div>					
		</div>
	</div>	
</section>
<!-- ######################################## CREATE USER ACCOUNT RECORD ################################### -->
<div class="modal fade" id="CUSR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Create User Account
       </h4>
      </div>   
     <div class="modal-body">       
	<form action="accountcontroller.php?prc=C" method="post" style="margin-bottom:0px;" class="form-horizontal" role="form" id="frmUACT" >
	<div class="row">

	<div class="col-xs-12 col-md-12">
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Email Address : </span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<input type="email" maxlength="100" class="form-control" style="width:100%; float:left;" id="aeadd" name="aeadd" required placeholder="Input Email Address" value=""></div>
	<!-- ################################################################################################-->
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Username : </span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<input type="text" required maxlength="25" class="form-control" style="width:100%; float:left;" id="ausr" name="ausr" placeholder="Username" />
	</div><div class="clearfix"></div>

	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Password :<em style="font-size:9px;">&nbsp;(min. 8 characters)</em></span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<input type="password" required maxlength="25" class="form-control" style="width:100%; float:left;" id="apwd" name="apwd" placeholder="Password"/>
		</div><div class="clearfix"></div>

	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Account Type :</span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<select name="atyp" required class="form-control" id="atyp">
			  <option value="ADMIN" >ADMIN</option>
			  <option value="FACULTY" >FACULTY</option>
	</select>
		</div><div class="clearfix"></div>

	</div>
	</div>
	 </form>  
</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px; padding: 10px 15px;">
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmUACT"/>Submit</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
	
});
</script>	