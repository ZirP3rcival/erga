<style>
.sidebar .single-slidebar h4 {
    margin-bottom: 0px;
}	
</style>

	<div class="single-slidebar  dash-video">
		<h4 style="margin-bottom: 20px; color: #fff;">Image Gallery</h4>
		<div class="active-relatedjob-carusel" style="background: #fff; padding: 15px;">
<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$dsql = mysqli_query($con,"SELECT erga_glossary_attach.*, erga_glossary_ppt.id, erga_glossary_ppt.`title` FROM erga_glossary_attach 
INNER JOIN erga_glossary_ppt ON erga_glossary_ppt.id = erga_glossary_attach.tid
WHERE erga_glossary_attach.atype='I' ORDER BY RAND() ASC LIMIT 4");

  while($r = mysqli_fetch_assoc($dsql))
   {  $attch = $r['attch'];  
?>		
			<div class="single-rated">
				<img class="img-fluid" src="../uploader/uploads/<?=$attch?>" alt="">
				<h5><?=$attch?></h5>
			</div>
<?php } ?>
		</div>
	</div>
	