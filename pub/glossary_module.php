<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fsrch=$_POST['fsrch'];
$stype=$_SESSION['accttype']; 
$fid=$_SESSION['id'];
$cid=$_POST['category'];
$tid=$_REQUEST['tid'];
$dsp = 'none';

if($cid=='') { $cid=$_REQUEST['cid']; }
if($tid!='') { $dsp='block'; }
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
            <div class="row rowflx" style="margin-bottom: 50px; align-items: flex-start;">

<div class="col-lg-12 col-xs-12 my-acct-box mg-tb-31 dash-video" style="padding: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #000!important; text-align: left; padding: 15px;">
			 <span class="fa fa-folder" style="margin-right: 15px; font-size: 2em;"></span>Glossary Records Module</h4>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
 <form method="post" action="?page=glossary_module" id="frmslst" name="frmslst"> </form>	
  <div class="col-xs-12 col-md-8" style="margin-bottom: 10px; padding: 0px; float: left">
	<div class="col-xs-12 col-md-12" style="padding: 0px;">	
	<select name="category" required class="form-control" id="category" style="display: inline-block; position:inherit; width:100%;" form="frmslst" onChange="this.form.submit();" title="Select Category">
			  <option value="" >- Select Glossary Category-</option>
	<?php	
	$dsql = mysqli_query($con,"SELECT * FROM erga_category_list ORDER BY category ASC");

	  while($r = mysqli_fetch_assoc($dsql))
	   {  ?>   
		<option value="<?=$r['id'];?>" <?=($cid == $r['id'] ? 'selected' : '');?>><?=$r['category'];?></option> 
	<?php  } ?>  
			</select>
	</div>
	<div class="clearfix"></div>
	
  </div>
  <div class="col-xs-12 col-md-4" style="margin-bottom: 10px; padding: 0px; float: right;">
  <button class="btn btn-primary btn-block" id="gnew" name="gnew" data-toggle="modal" data-target="#NGR" > New Glossary Record </button>
  </div>
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-7 col-xs-12 my-acct-box mg-tb-31" style="padding: 0px; margin-top: 15px;">
	<div class="card dash-video">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #fff!important; text-align: left; padding: 15px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Glossary Record Content</h4>
		  </div>
  
<div class="card-block" style="margin: 0px 15px; background: #fff; padding: 0px 15px; margin-bottom: 15px;">
	<div class="col-xs-12 col-md-12" style="margin-top: 10px; padding: 0px;">
	<form id="msearch" action="?page=glossary_module" method="post" class="form-horizontal" style="margin-bottom: 15px;">
	   <div class="input-group">
		 <input name="fsrch" type="text" class="form-control isearch" placeholder="Search Content Title Here" value="<?=$fsrch;?>">
		  <span class="input-group-btn">
			<button class="btn btn-default" type="submit" style="background: #0A65D1; color:#fff;padding-left: 10px;padding-right: 10px;">
			<i class="fa fa-search" style="font-size:14px;"></i>
			</button>
		  </span>
	  </div>
	</form>
	</div>
<div class="list-group" style="margin-bottom: 15px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
	<div class="row">
		<div class="col-xs-2 col-md-12" style="padding-bottom: 0px; padding-right: 0px; color: #000;">Title</div>
		<div class="clearfix"></div>
	</div>
</li>
<?php 

$rowsPerPageRV = 5;
$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
$cp=$currentPageRV;
	
$byword = " AND title LIKE '%$fsrch%' ";	
$bytype = " AND ftype LIKE '%$cid%' ";	
	
$dsql = mysqli_query($con,"SELECT * from erga_glossary_avp WHERE fid='$fid' $bytype $byword ORDER BY title ASC LIMIT $offsetRV, $rowsPerPageRV");
  while($rx = mysqli_fetch_assoc($dsql))
   {  if($cid=='')  { $cid=$rx['ftype']; }
    ?>                                   
<li class="list-group-item" style="padding: 5px 15px; font-size: 14px; color: #000;">
	<div class="row">
	<div class="col-xs-12 col-md-7" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['title'];?></div>
    <div class="col-xs-12 col-md-5" style="padding-bottom: 0px; padding-right: 0px;">
	 
	 <a href="glossarycontroller?id=<?=$rx['id'];?>&prc=D&cid=<?=$cid?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger fa fa-trash-o" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>

	 <button class="btn btn-warning fa fa-edit" id="editls" data-id="<?=$rx['id'];?>" data-tle="<?=$rx['title'];?>" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>

	 <a href="?page=glossary_module&cid=<?=$cid?>&tid=<?=$rx['id']?>" class="trash" onclick="return confirm('View Trivia Record?')"><button class="btn btn-info fa fa-list-alt trivia" data-id="<?=$rx['id'];?>" title="Create Trivia Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
	 	 
	 <button class="btn btn-primary fa fa-search" id="viewls" data-id="<?=$rx['id'];?>" data-title="<?=$rx['title'];?>" title="View this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
	 
	 </div>	 
	 <div class="clearfix"></div>
	 </div>
 </li>

 <?php } ?>
</div>   
<div style="float: left; width: 100%; margin-bottom: 10px;">
			<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=glossary_module&prc=<?=$prc;?>&cid=<?=$cid;?>&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
			<div style="width:60%; float:left; font-size:11px;">
			  <?php
$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from erga_glossary_avp WHERE ftype='$cid' AND fid='$fid' LIMIT $rowsPerPageRV"); 
														 
$row = mysqli_fetch_assoc($sql);
$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

if($currentPageRV > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageRV='.($currentPageRV-1).'"></a>'; }

if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
else { $d=$currentPageRV + $rowsPerPageRV; }

if($d > $totalPagesRV) { $d=$totalPagesRV; }
else { $d=$totalPagesRV; }

for ($x=1;$x<=$d;$x++)
{  if ($cp==$x) 
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#4850D3; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
   }
  else
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

if($currentPageRV < $totalPagesRV) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageRV='.($currentPageRV+1).'"></a>'; }
?>
			</div>
			<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=glossary_module&cid=<?=$cid;?>&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
<div class="clearfix"></div>	        
</div>	 
</div> 
</div> 
</div>   

<div class="col-lg-5 col-xs-12 my-acct-box mg-tb-31" style="padding: 0px; margin-top: 15px;">
	<div class="card dash-video">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #fff!important; text-align: left; padding: 15px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Glossary Trivia Content
			 	 <button class="btn btn-success fa fa-save" id="trivia" data-cid="<?=$cid;?>" data-tid="<?=$tid;?>" title="Create Trivia Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px; display: <?=$dsp;?>"></button>
			 </h4>
		  </div>
  
<div class="card-block" style="margin: 0px 15px; background: #fff; padding: 0px 15px; margin-bottom: 15px;">
<div class="list-group" style="margin-bottom: 15px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
	<div class="row">
		<div class="col-xs-2 col-md-12" style="padding-bottom: 0px; padding-right: 0px; color: #000;">Assessment Question List</div>
		<div class="clearfix"></div>
	</div>
</li>
<?php 
if($tid!='') {	
$rowsPerPageTV = 5;
$currentPageTV = ((isset($_GET['ppageTV']) && $_GET['ppageTV'] > 0) ? (int)$_GET['ppageTV'] : 1);
$offsetTV = ($currentPageTV-1)*$rowsPerPageTV;
$cp=$currentPageTV;
	
$dsql = mysqli_query($con,"SELECT * from erga_glossary_trivia WHERE cid='$tid' ORDER BY id ASC LIMIT $offsetTV, $rowsPerPageTV");
	
  while($rx = mysqli_fetch_assoc($dsql))
   { $tp=$rx['gtype'];  if($tp=='0') { $typ='PRE'; } else  { $typ='POST'; }
	 $quest=substr($rx['gquest'], 0, 100);
    ?>                                   
<li class="list-group-item" style="padding: 5px 15px; font-size: 14px; color: #000;">
	<div class="row">
	<div class="col-xs-12 col-md-2" style="padding-bottom: 0px; padding-right: 0px; padding-left: 10px; font-size: 10px; font-weight: 600;"><?=$typ;?></div>
    <div class="col-xs-12 col-md-5" style="padding-bottom: 0px; padding-right: 0px;"><?=$quest;?>...</div>
    <div class="col-xs-12 col-md-5" style="padding-bottom: 0px; padding-right: 0px;">
	 
	 <a href="glossarycontroller?id=<?=$rx['id'];?>&prc=DT&cid=<?=$cid?>&tid=<?=$tid?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger fa fa-trash-o" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>

	 <button class="btn btn-warning fa fa-edit" id="editls" data-id="<?=$rx['id'];?>" data-tle="<?=$rx['title'];?>" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
	 
	 </div>	 
	 <div class="clearfix"></div>
	 </div>
 </li>

 <?php } } ?>
</div>   
<div style="float: left; width: 100%; margin-bottom: 10px;">
			<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=glossary_module&prc=<?=$prc;?>&cid=<?=$cid;?>&ppageTV=<?=($currentPageTV-1)?>"> prev </a></div>
			<div style="width:60%; float:left; font-size:11px;">
<?php
if($tid!='') {	
$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from erga_glossary_trivia WHERE cid='$tid' LIMIT $rowsPerPageTV"); 
													 
$row = mysqli_fetch_assoc($sql);
$totalPagesTV = ceil($row['crt'] / $rowsPerPageTV);

if($currentPageTV > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageTV='.($currentPageTV-1).'"></a>'; }

if($totalPagesTV < $rowsPerPageTV) { $d=$totalPagesTV; }
else { $d=$currentPageTV + $rowsPerPageTV; }

if($d > $totalPagesTV) { $d=$totalPagesTV; }
else { $d=$totalPagesTV; }

for ($x=1;$x<=$d;$x++)
{  if ($cp==$x) 
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#4850D3; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
   }
  else
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageTV='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesTV .'</strong> pages</span>'; 

if($currentPageTV < $totalPagesTV) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=glossary_module&cid='.$cid.'&ppageTV='.($currentPageTV+1).'"></a>'; } 
}
?>
			</div>
			<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=glossary_module&cid=<?=$cid;?>&ppageTV=<?=($currentPageTV+1);?>"> next </a></div>
<div class="clearfix"></div>	        
</div>	

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

<!-- ######################################## CREATE GLOSSARY RECORD ################################### -->
<div class="modal fade" id="NGR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Create Glossary Record
       </h4>
      </div>   
     <div class="modal-body">       
<form action="glossarycontroller.php?prc=S&cid=<?=$cid?>" method="post" class="form-horizontal" id="frmcgrd" name="frmcgrd" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">Glossary Record Title :</label>
                        <input name="title" type="text" class="form-control" id="title" maxlength="100" required>
                      </div>
                      <div class="form-group">
                        <label for="username">Published Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required></textarea>
                      </div>                      
</form>
</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px; padding: 10px 15px;">
 <button type="button" class="btn btn-info" id="editor" name="editor" style="font-size: 12px; float: left;" form="frmcgrd"/>Create Record</button>
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmcgrd"/>Submit</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->
<!-- ######################################## UPDATE GLOSSARY RECORD ################################### -->
<div class="modal fade" id="ULM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Update Glossary Record
       </h4>
      </div>   
<div class="modal-body" id="contentx">        

</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px; padding: 10px 15px;">
 <button type="button" class="btn btn-info" id="editor" name="editor" style="font-size: 12px;" form="frmuml"/>Create Lesson</button>
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmuml"/>Update</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->
<!-- ######################################## CREATE TRIVIA RECORD ################################### -->
<div class="modal fade" id="CTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Create Glossary Trivia Record
       </h4>
      </div>   
<div class="modal-body" id="contentv">        

</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px; padding: 10px 15px;">
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmTR"/>Submit</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
	
$(document).on("click","#viewls",function() {
	var id=$(this).data('id');
	var tt=$(this).data('title');
	$('#content').empty();
	$("#content").load('viewinformation.php?id='+id);
	$('.modwidth').css('width','75%');
	$('.modcap').empty();
	$(".modcap").append(tt);
	$('#POPMODAL').modal('show');
});	
	
$(document).on("click","#editls",function() {
	var id=$(this).data('id');
	$('#contentx').empty();
	$("#contentx").load('updatelesson.php?id='+id);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('Update Lesson Record');
	$('#ULM').modal('show');
});	
	
$(document).on("click","#trivia",function() {
	var cid=$(this).data('cid');
	var tid=$(this).data('tid');
	$('#contentv').empty();
	$("#contentv").load('create_trivia.php?cid='+cid+'&tid='+tid+'&mde=NT');
	$('.modwidth').css('width','55%');
	$('.modcap').empty();
	$(".modcap").append('Glossary Trivia Record');
	$('#CTR').modal('show');
});	
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	