<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$stype=$_SESSION['accttype']; 
$id=$_SESSION['id'];
if($id!='') {
$sqlay="SELECT id, eadd, sqt, sqa, usr, lnme, mnme, fnme, cno, ploc, thm1, thm2 FROM erga_users_account WHERE id='$id'"; 

$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$photo='data:image/png;base64,'.''.$r['ploc'];
	$ploc = $r['ploc'];
	$eadd = $r['eadd'];
	$sqt = $r['sqt'];
	$sqa = $r['sqa'];
	$usr = $r['usr'];
	$pwd = $_SESSION['pwd'];
	$lnme = $r['lnme'];
	$mnme = $r['mnme'];
	$fnme = $r['fnme'];
	$cno= $r['cno'];
	
	$thm1= $r['thm1'];
	$thm2= $r['thm2'];
}
}
if($stype=='') {  $thm1= '#5E83F1'; 	$thm2= '#6277FB';  }
	
$cssString = '#header.header-user { background: '.$thm1.'!important; opacity :0.9!important; transition: all 0.5s; }';
$cssString.= '.ticker-btn { background: '.$thm2.'!important; }';
$cssString.= '.dash-video { background: '.$thm1.'!important; }';	
$cssString.= '.footer-area { background: '.$thm1.'!important; opacity :0.9!important; }';
$cssString.= '.banner-content .form-wrap { background-color: '.$thm2.'!important; }';
$cssString.= '.modal-header { background: '.$thm1.'; }';
?>

<style>
<?=$cssString;?>	
</style>

<?php 
if($stype=='') {
?>
 <header id="header" id="home">
  <div class="container">
  	<div class="row align-items-center justify-content-between d-flex">
	    <div id="logo">
	      <a href="#"><img src="../img/logo.png" alt="" title="" /></a>
	    </div>
	    <nav id="nav-menu-container">
	      <ul class="nav-menu">
	        <li class="menu-active"><a class="ticker-btn" href="#">Home</a></li>
<!--	        <li><a class="ticker-btn" href="about-us.html">About Us</a></li>-->
	        <li class="menu-has-children"><a class="ticker-btn" href="#">Category</a>
	          <ul class="popul">
								<li><a class="ticker-btn" href="elements.html">Research Method</a></li>
								<li><a class="ticker-btn" href="search.html">Statistics</a></li>
	          </ul>
	        </li>
	        <li><a class="ticker-btn" href="#" id="signup">Signup</a></li>
	        <li><a class="ticker-btn" href="#" id="login">Login</a></li>	  	        
	      </ul>
	    </nav><!-- #nav-menu-container -->		    		
  	</div>
  </div>
</header>
<?php } else if($stype=='ADMIN') { ?>
<header id="header" id="home" class="header-user">
  <div class="container">
  	<div class="row align-items-center justify-content-between d-flex">
	    <div id="logo">
	      <a href="#"><img src="../img/logo.png" alt="" title="" /></a>
	    </div>
	    <nav id="nav-menu-container">
	      <ul class="nav-menu">
	        <li class="menu-active"><a class="ticker-btn" href="#">Home</a></li>
	        <li class="menu-has-children"><a class="ticker-btn" href="#">System Records</a>
	          <ul class="popul">
					<li><a class="ticker-btn" href="#">Accounts Module</a></li>
					<li><a class="ticker-btn" href="#">Contents Module</a></li>
	          </ul>
	        </li>
	        <li><a class="ticker-btn" href="#" id="my_account">My Account</a></li>
	        <li><a class="ticker-btn" href="logout" id="logout">Logout</a></li>	 
	        <li> 
	        	<img id="img" src="<?=$photo?>" style="width:75px; border-radius: 15px; border: 3px solid #fff;"  onerror="this.src='../img/missing.jpg'"  />    
	        </li> 	 			  
	      </ul>
	    </nav><!-- #nav-menu-container -->		    		
  	</div>
  </div>
</header>
<?php } else if($stype=='FACULTY') { ?>
<header id="header" id="home" class="header-user">
  <div class="container">
  	<div class="row align-items-center justify-content-between d-flex">
	    <div id="logo">
	      <a href="#"><img src="../img/logo.png" alt="" title="" /></a>
	    </div>
	    <nav id="nav-menu-container">
	      <ul class="nav-menu">
	        <li class="menu-active"><a class="ticker-btn" href="#">Home</a></li>
			<li><a class="ticker-btn" href="#" id="user_account">System Records</a></li>
	        <li><a class="ticker-btn" href="#" id="my_account">My Account</a></li>
	        <li><a class="ticker-btn" href="logout" id="logout">Logout</a></li>		 
	        <li> 
	        	<img id="img" src="<?=$photo?>" style="width:75px; border-radius: 15px; border: 3px solid #fff;"  onerror="this.src='../img/missing.jpg'"  />    
	        </li>         	        
	      </ul>
	    </nav><!-- #nav-menu-container -->		    		
  	</div>
  </div>
</header>
<?php } else if($stype=='STUDENT') { ?>
<header id="header" id="home" class="header-user">
  <div class="container">
  	<div class="row align-items-center justify-content-between d-flex">
	    <div id="logo">
	      <a href="#"><img src="../img/logo.png" alt="" title="" /></a>
	    </div>
	    <nav id="nav-menu-container">
	      <ul class="nav-menu">
	        <li class="menu-active"><a class="ticker-btn" href="#">Home</a></li>
<!--	        <li><a class="ticker-btn" href="about-us.html">About Us</a></li>-->
	        <li class="menu-has-children"><a class="ticker-btn" href="#">Category</a>
	          <ul class="popul">
								<li><a class="ticker-btn" href="elements.html">Research Method</a></li>
								<li><a class="ticker-btn" href="search.html">Statistics</a></li>
	          </ul>
	        </li>
	        <li><a class="ticker-btn" href="#" id="my_account">My Account</a></li>
	        <li><a class="ticker-btn" href="logout" id="logout">Logout</a></li>		 
	        <li> 
	        	<img id="img" src="<?=$photo?>" style="width:75px; border-radius: 15px; border: 3px solid #fff;"  onerror="this.src='../img/missing.jpg'"  />    
	        </li>         	        
	      </ul>
	    </nav><!-- #nav-menu-container -->		    		
  	</div>
  </div>
</header>
<?php } ?>