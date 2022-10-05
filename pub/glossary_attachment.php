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
<form action="glossarycontroller.php?prc=S&cid=<?=$cid?>" method="post" class="form-horizontal" id="frmAR" name="frmAR" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">Attachment Type :</label>
							<select name="acat" required class="form-control" id="acat" style="display: inline-block; position:inherit; width:100%;" form="frmslst" title="Select Category">
								<option value="" >- Select -</option>
								<option value="I">Attach Photo Files</option> 
								<option value="V">Attach Video Links</option> 
							</select>
                      </div>
                      <div id="apic" class="form-group" style="display: none;">
                        <label for="username">Browse Photo :</label>
									<div class="file_upload">
										<form action="sliderupload.php?prc=I" class="dropzone">
											<div class="dz-message needsclick">
												<strong style="font-size: 24px;">Drop Files Here<br>or<br>Click to Upload.</strong><br /><span>Maximum Filesize: 1.5Mb only</span>
											</div>
										</form>		
									</div>
                      </div>
                      <div id="avid" class="form-group" style="display: none;">
                        <label for="username">Paste Video Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required></textarea>
                      </div>                         
</form>
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
	}
});	
	
});
</script>		