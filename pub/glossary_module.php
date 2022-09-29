<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$stype=$_SESSION['accttype']; 

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
			 <span class="fa fa-folder" style="margin-right: 15px; font-size: 2em;"></span>Glossary Category</h4>
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
	<div class="card dash-video">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px; color: #fff!important; text-align: left; padding: 15px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Glossary Record Content</h4>
		  </div>
  
<div class="card-block" style="margin: 0px 15px;">
<div class="list-group" style="margin-bottom: 15px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
	<div class="row">
		<div class="col-xs-2 col-md-12" style="padding-bottom: 0px; padding-right: 0px;">Title</div>
		<div class="clearfix"></div>
	</div>
</li>
<?php 
if($cid!='')	{
$dsql = mysqli_query($con,"SELECT * from erga_glossary_avp WHERE ftype='$cid' ORDER BY title ASC");
  while($rx = mysqli_fetch_assoc($dsql))
   { 
    ?>                                   
<li class="list-group-item" style="padding: 5px 15px; font-size: 14px; color: #000;">
	<div class="row">
	<div class="col-xs-12 col-md-9" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['title'];?></div>
    <div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">
	 
	 <a href="glossarycontroller?id=<?=$rx['id'];?>&prc=D&cid=<?=$cid?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger fa fa-trash-o" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
	 
<?php if($stype=='FACULTY') { ?> 
	 <button class="btn btn-warning fa fa-edit" id="editls" data-id="<?=$rx['id'];?>" data-tle="<?=$rx['title'];?>" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
<?php } ?>	 
	 
	 <button class="btn btn-primary fa fa-search" id="viewls" data-id="<?=$rx['id'];?>" data-title="<?=$rx['title'];?>" title="View this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
	 
	 </div>	 
	 <div class="clearfix"></div>
	 </div>
 </li>

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

<!-- ######################################## CREATE GRADE LEVEL RECORD ################################### -->
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
<!-- ######################################## CREATE GRADE LEVEL RECORD ################################### -->
<div class="modal fade" id="ULM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Update Lesson Record
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
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	