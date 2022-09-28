<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$cid=$_POST['category'];

if($cid=='') { $cid=$_REQUEST['cid']; }
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
<div class="col-lg-4 col-xs-12 my-acct-box mg-tb-31 dash-video" style="padding: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #000!important; text-align: left; padding: 15px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Glossary Category</h4>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
 <form method="post" action="?page=glossary_module" id="frmslst" name="frmslst"> </form>	
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Select Category : </span></div>
	<div class="col-xs-12 col-md-12" style="padding: 0px;">	
	<select name="category" required class="form-control" id="category" style="display: inline-block; position:inherit; width:100%;" form="frmslst" onChange="this.form.submit();" title="Select Category">
			  <option value="" >- Select -</option>
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
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
  <button class="btn btn-info btn-block" id="cnew" name="cnew" data-toggle="modal" data-target="#NGC" style="margin-top: 25px;" > New Glossary Category </button>
  <button class="btn btn-primary btn-block" id="gnew" name="gnew" data-toggle="modal" data-target="#NGR" style="margin-top: 15px;" > New Glossary Record </button>
  </div>
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-book" style="margin-right: 15px; font-size: 2em;"></span>Lessons Record List			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Listahan ng mga Aralin</h6>
		  </div>
  
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
	<div class="row">
		<div class="col-xs-2 col-md-12" style="padding-bottom: 0px; padding-right: 0px;">Title</div>
		<div class="clearfix"></div>
	</div>
></li>
<?php 
if($fgrd!='')	{
$dsql = mysqli_query($con,"SELECT * from ft2_module_records WHERE grde = '$fgrd' AND syr = '$syr' AND fid='$fid' AND asid='$fsbj' ORDER BY title ASC");
  while($rx = mysqli_fetch_assoc($dsql))
   { $sphoto='data:image/png;base64,'.''.$rx['ploc'];
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;"><div class="row">
<div class="col-xs-10 col-md-9" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['title'];?></div>
 <a href="lessonscontroller?id=<?=$rx['id'];?>&prc=D" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger glyphicon glyphicon-trash" title="Delete this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
  
 <button class="btn btn-warning glyphicon glyphicon-edit" id="editls" data-id="<?=$rx['id'];?>" data-tle="<?=$rx['title'];?>" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
 
 <button class="btn btn-primary glyphicon glyphicon-search" id="viewls" data-id="<?=$rx['id'];?>" title="View this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
 <div class="clearfix"></div></div></li>

 <?php }} ?></div>   
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


<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
var fgrd= document.getElementById("fgrd").value;
var fsbj= document.getElementById("fsbj").value;	
	
if((fgrd=='')||(fsbj=='')) { $('#cnew').prop('disabled',true); }	
else { $('#cnew').prop('disabled',false); }	

	
$(document).on("click","#viewls",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewlesson.php?id='+id);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Lesson Preview');
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
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	