<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$cid=$_REQUEST['cid'];
$tid=$_REQUEST['tid'];
?>     
<form action="glossarycontroller.php?prc=S&cid=<?=$cid?>" method="post" class="form-horizontal" id="frmAR" name="frmAR" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">Glossary Record Title :</label>
                        <input name="title" type="text" class="form-control" id="title" maxlength="100" required>
                      </div>
                      <div class="form-group">
                        <label for="username">Published Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required></textarea>
                      </div>                      
</form>
