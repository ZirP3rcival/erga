<style>
.slider {
    margin: 0px;
	height: 100%;
    width: 100%;
	}
</style>
<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$dsql = mysqli_query($con,"SELECT * from erga_glossary_ppt ORDER BY RAND() ASC LIMIT 2"); 
  while($r = mysqli_fetch_assoc($dsql))
   {  $flink = $r['flink'];  

preg_match('/src="([^"]+)"/', $flink, $match);
$url = $match[1];
?>
<div class="single-post d-flex flex-row">
<div class="container" style="padding: 10px;">
	<div style="background: #FFF;"> 	
		<div class="content-slider" style="height: 100%;">
		  <div class="slider">
<div class="embed-container" style="position: relative; padding-bottom: 59.27%; height: 0; overflow: hidden; max-width: 100%;">';
	<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
		 src="<?=$url?>" frameborder="0" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
	</iframe>
</div>
		  </div>
		  <div class="clearfix">  </div>  
		</div>                                
    </div>                           
</div>
</div>
<?php }  ?>

