<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$cid=$_REQUEST['cid'];
$tid=$_REQUEST['tid'];
?>     
<link rel="stylesheet" type="text/css" href="../uploader/css/dropzone.css"/>
<script type="text/javascript" src="../uploader/js/dropzone.js"></script>
<!--<form action="glossarycontroller.php?prc=S&cid=<=$cid?>" method="post" class="form-horizontal" id="frmAR" name="frmAR" style="margin:0px; padding:0px 12px;" role="form">-->
                      <div class="form-group">
							<select name="acat" required class="form-control" id="acat" style="display: inline-block; position:inherit; width:100%; margin-top: 15px;" form="frmslst" title="Select Category">
								<option value="" >- Select Attachment Type-</option>
								<option value="I">Attach Photo Files</option> 
								<option value="V">Attach Video Links</option> 
							</select>
                      </div>
                      <div id="apic" class="form-group" style="display: none;">
                        <label for="username">Browse Photo :</label>
						<div class="card-body" style="padding: 0px;">
								<div class="row" style="margin:0px;"> 
									<div class="col-12 col-md-12" style="padding: 0px;">
										<div class="file_upload">
											<form id="frmimg" action="glossaryuploader.php?prc=I&tid=<?=$tid?>" class="dropzone">
												<div class="dz-message needsclick">
													<strong style="font-size: 24px;">Drop Image Files Here<br>or<br>Click to Upload.</strong><br /><span>Maximum Filesize: 1.5Mb only</span>
												</div>
											</form>		
										</div>	 
									 </div>
									<div class="clearfix"></div>
								</div>
						</div>
                      </div>
                      <div id="avid" class="form-group" style="display: none;">
                       <form id="frmvid" action="glossaryuploader.php?prc=V&cid=<?=$cid?>&tid=<?=$tid?>" method="POST" style="padding: 15px 10px;">
                        <label for="username">Paste Video Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required></textarea>
                        <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px; margin-top: 15px; float: right;" form="frmvid"/>Submit</button>
                        <div class="clearfix"></div>
                        </form>
                      </div>                         
<!--</form>-->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
	
$("#acat").change(function(){
var tp = $('#acat').val();
	if(tp=='I') {
		$("#avid").hide();
		$("#apic").show();
	}
	else if(tp=='V') {
		$("#apic").hide();
		$("#avid").show();
	//	$('#frmvid').attr('action', 'glossaryuploader.php?prc=V');
	}
});	
	
});
</script>		