<style>
.slider {
    margin: 0px;
	height: 100%;
    width: 100%;
	}

.tview{
    display: flex;     
    flex-direction: row;
    align-items: stretch;
    justify-content: space-evenly;
    flex-wrap: nowrap
	} 	
	
@media (max-width: 640px) {
.tview{
    display: block!important;
	} 
}
</style>
<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;
$tsearch=$_SESSION['search'];

$rowsPerPageAR = 2;
$currentPageAR = ((isset($_GET['ppageAR']) && $_GET['ppageAR'] > 0) ? (int)$_GET['ppageAR'] : 1);
$offsetAR = ($currentPageAR-1)*$rowsPerPageAR;
$cp=$currentPageAR;
?>
<div class="col-lg-12 col-xs-12 dash-video tview" >
<?php
$dsql = mysqli_query($con,"SELECT * from erga_glossary_ppt WHERE title LIKE '%$tsearch%' ORDER BY title ASC"); 

  while($r = mysqli_fetch_assoc($dsql))
   {  $flink = $r['flink'];  

preg_match('/src="([^"]+)"/', $flink, $match);
$url = $match[1];
?>
<div class="col-lg-6 col-xs-12 single-post d-flex flex-row" style="padding: 5px; margin: 10px; background: #fff;">
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
<?php } ?>
</div>
<div style="float: left; width: 100%; margin-bottom: 10px;">		
			<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?search=<?=$tsearch;?>&ppageAR=<?=($currentPageAR-1)?>"> prev </a></div>
						
			<div style="width:60%; float:left; font-size:11px;">
<?php 
	
$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from erga_glossary_ppt WHERE title LIKE '%$tsearch%' LIMIT $rowsPerPageAR"); 									 
$row = mysqli_fetch_assoc($sql);
$totalPagesAR = ceil($row['crt'] / $rowsPerPageAR);

if($currentPageAR > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?search='.$tsearch.'&ppageAR='.($currentPageAR-1).'"></a>'; }

if($totalPagesAR < $rowsPerPageAR) { $d=$totalPagesAR; }
else { $d=$currentPageAR + $rowsPerPageAR; }

if($d > $totalPagesAR) { $d=$totalPagesAR; }
else { $d=$totalPagesAR; }

for ($x=1;$x<=$d;$x++)
{  if ($cp==$x) 
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#4850D3; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
   }
  else
   { 
	 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?search='.$tsearch.'&ppageAR='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesAR .'</strong> pages</span>'; 

if($currentPageAR < $totalPagesAR) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?search='.$tsearch.'&ppageAR='.($currentPageAR+1).'"></a>'; } 

?>
			</div>
		
			<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?search=<?=$tsearch;?>&ppageAR=<?=($currentPageAR+1);?>"> next </a></div>
			
<div class="clearfix"></div>	        
</div>	