<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
<?php include_once('landingheader.php');?>  	
		<body>
			<!-- #header -->
<?php include_once('headermenu.php');?> 			  
			<!-- #header -->

			<!-- start banner Area -->
<?php include_once('topicsearch.php');?>  				
			<!-- End banner Area -->
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<h1 class="text-white lpage" style="margin-bottom: 30px;">Random Information</h1>				
					<div class="row justify-content-center d-flex">
<div class="col-lg-8 post-list">					
	<?php include_once('randomtopic.php');?>  		
</div>			
<div class="col-lg-4 sidebar">	
	<?php include_once('infogallery.php');?>  						
	<?php include_once('infovideo.php');?>  
</div> 
						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->		
<!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>		
<?php include_once('landingfooter.php');?>  			
		</body>
	</html>
<!-- ################################################################################# --> 
<?php
  $errmsg = $_SESSION['errmsg'];
    if($errmsg!=""){ ?>
  <script type="text/javascript">
    var bb = bootbox.alert({ message: "<?=$errmsg ?>",title: "<span style='color:#5B84F3;'>e-RGA Alert :</span>",
        size: 'medium'});
      //bb.find('.modal-dialog').css({'width': '35%'});
	  bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
      bb.find('.close').css({'display': 'none'});
      bb.find('.modal-header').css({'background-color': '#fff','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
      bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'15px'});
      bb.find('.modal-footer').css({'background-color': '#fff','padding': '10px'}); 
      bb.find(".btn-success").addClass("btnpri");
          
      <?php unset($_SESSION['errmsg']); ?>	   
      setTimeout(function() {
        bootbox.hideAll();
        }, 50000);
  </script>
  <?php } 

  if(isset($_SESSION['errmsg'])){
      unset($_SESSION['errmsg']);
} ?>
<?php ob_flush(); ?>	
<!-- ############################################################################################ -->
<!-- for modal display -->
<div id="POPMODAL" class="modal fade">
  <div class="modal-dialog modwidth">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title modcap" style="color: #fff;"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" id="content" style="padding-top: 0px;">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){

$(document).on("click","#signup",function() {
	$('#content').empty();
	$("#content").load('register.php');
	$('.modwidth').css('width','35%');
	$('.modcap').empty();
	$(".modcap").append('Register New Account');
	$('#POPMODAL').modal('show');  
});	

	
$(document).on("click","#login, #lgbtn",function() {
	$('#content').empty();
	$("#content").load('login.php');
	$('.modwidth').css('width','35%');
	$('.modcap').empty();
	$(".modcap").append('User Verification');
	$('#POPMODAL').modal('show');  
});	

$(document).on("click","#logprob",function() {
	$('#content').empty();
	$("#content").load('recover.php');
	$('.modwidth').css('width','35%');
	$('.modcap').empty();
	$(".modcap").append('Account Recovery');
	$('#POPMODAL').modal('show');  
});	
	
});
</script>

