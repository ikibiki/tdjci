<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Dust Jacket">
	<title>Login - The Dust Jacket</title>   


	<?php
    echoStyles();
    echoStylesWebsite();
    echoScripts();
    echoScriptsWebsite();
    echoSwal2();
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="page-home">        
  <header id="header">
	  <div class="wrap">
	    <div id="top-bar" class="clearfix">

	      <div class="social-icons">
	        <a href="#"><span class="fa fa-facebook"></span></a>
	        <a href="#"><span class="fa fa-twitter"></span></a>
	        <a href="#"><span class="fa fa-google-plus"></span></a>
	        <a href="#"><span class="fa fa-instagram"></span></a>
	      </div><!--/.social-icons-->

	      <div class="quick-links">
	        <a href="<?php echo base_url('login'); ?>">Login</a>
	        <a href="#">Sign Up</a>
	        <a href="#">Cart</a>
	      </div><!--/.quick-links-->          
	    </div><!--/top-bar-->

	    <img id="logo" src="assets/images/logo.jpg">

	      <!-- <div id="main-nav-wrap">
	        <ul id="main-nav">
	          <li><a href="#">Home</a></li>
	          <li><a href="#">About Us</a></li>
	          <li><a href="#">Contact Us</a></li>
	        </ul>
	      </div> --><!--/main-nav-wrap-->
	      
	      <div id="main-menu">
	        <ul>
	         
	          <li>
	            <a href="#">
	              <img src="assets/images/menu-booking.png">
	              <span>Booking</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="#">
	              <img src="assets/images/menu-register.png">
	              <span>Register</span>
	            </a>
	          </li>
	          <li>
	            <a href="<?php echo base_url('login'); ?>">
	              <i class="fa fa-sign-in" arial-hidden="true"></i>
	              <span>Sign In</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="#">
	              <img src="assets/images/menu-signup.png">
	              <span>Contact Us</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="#">
	              <i class="fa fa-exclamation-circle" arial-hidden="true"></i>
	              <span>About</span>
	            </a>
	          </li>
	        </ul>
	      </div><!--/main-menu-->

	      <!-- <div id="search-wrap">
	        <form id="search-form" action="" method="post" class="clearfix">
	          <input type="text" id="search-keyword" name="search_keyword">
	          <input type="submit" id="search-submit" name="search_submit" value="SEARCH">
	        </form>/search-form
	      </div> --><!--/search-wrap-->

	      <!-- <p class="text1">
	        <strong>IS A BOOK NOT COMING UP ON A SEARCH OF OUR WEBSITE?</strong><br>
	        <span class="text1b">Send an Enquiry</span> through to us now so we can order the book you need!
	      </p> -->

	  </div><!--/.wrap-->
	</header><!--/header-->
  <div id="container">
    <div class="wrap">
		<div id="content">
			  
		</div><!--/content-->
    </div><!--/.wrap-->
  </div><!--/container-->
  <footer id="footer">
	  <div class="wrap">
	    <div id="footer-credits">
	      &copy; 2017 The Dust Jacket
	    </div><!--/credits-->
	    <div id="footer-info">
	      02 6722 4444  |  44 Byron Street  | Inverell NSW
	    </div>
	  </div><!--/.wrap-->
	</footer>  
</body>
</html>