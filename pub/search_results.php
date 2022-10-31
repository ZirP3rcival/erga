			<!-- start banner Area -->
<?php 
include_once('topicsearch.php');
if($tsearch!='') 
	{ $title='Search Result for `'.$tsearch.'`'; }
else { $title='Random Information'; }
?>  				
			<!-- End banner Area -->
<a name="results"></a>				
			<!-- Start post Area -->
<section class="post-area section-gap">
	<div class="container">
	<h1 class="text-white lpage" style="margin-bottom: 30px;"><?=$title?></h1>				
		<div class="row justify-content-center d-flex">
			<div class="col-lg-8 post-list">					
				<?php 
				if($tsearch!='') 
					{ include_once('search_topic.php'); } 
				else 
					{ include_once('randomtopic.php'); }
				?>  		
			</div>			
			<div class="col-lg-4 sidebar">	
				<?php include_once('infogallery.php');?>  						
				<?php include_once('infovideo.php');?>  
			</div>					
		</div>
	</div>	
</section>
			<!-- End post Area -->	