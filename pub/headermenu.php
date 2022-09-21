<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$id=$_SESSION['id'];
if($id!='') {
$sqlay="SELECT id, eadd, sqt, sqa, usr, lnme, mnme, fnme, cno, ploc, thm1 FROM erga_users_account WHERE id='$id'"; 

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
}

$cssString = '#header.header-student { background: rgb(82 122 239 / 90%)!important; transition: all 0.5s; }';

file_put_contents('../css/custom-style.css', $cssString);

if($thm1!='') { ?>
	<link rel='stylesheet' href="../css/custom-style.css">
<?php }
}

$stype=$_SESSION['account'];
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
<?php } else if($stype=='STUDENT') { ?>
<header id="header" id="home" class="header-student">
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
	      </ul>
	    </nav><!-- #nav-menu-container -->		    		
  	</div>
  </div>
</header>
<?php } ?>