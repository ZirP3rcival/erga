<style>
.sidebar .single-slidebar h4 {
    margin-bottom: 0px;
}	
	
iframe {
    border: 0;
    width: 100%;
    height: 215px;
}	
</style>	
<div class="single-slidebar">
	<h4 style="margin-bottom: 20px;">Informative Videos</h4>
	<div class="blog-list">
<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}		
		
$dsql = mysqli_query($con,"SELECT erga_glossary_attach.*, erga_glossary_ppt.id, erga_glossary_ppt.`title` FROM erga_glossary_attach 
INNER JOIN erga_glossary_ppt ON erga_glossary_ppt.id = erga_glossary_attach.tid
WHERE erga_glossary_attach.atype='V' ORDER BY RAND() ASC LIMIT 2");

  while($r = mysqli_fetch_assoc($dsql))
   {  $attch = $r['attch'];  
		$alink=convertYoutube($attch);
?>		
		<div class="single-blog dash-video">
			<a href="<?=$attch?>" target="new" style="font-size: 13px; color: #fff;"><?=$attch?></a>
			<?=$alink;?>
		</div>		
<?php } ?>			
	</div>
</div>	