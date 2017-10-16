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
	<title>Dust Jacket</title>   


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
	            <a href="app/add_booking.php">
	              <img src="assets/images/menu-booking.png">
	              <span>Booking</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="student-registration.php">
	              <img src="assets/images/menu-register.png">
	              <span>Register</span>
	            </a>
	          </li>
	          <li>
	            <a href="login.php">
	              <i class="fa fa-sign-in" arial-hidden="true"></i>
	              <span>Sign In</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="contact.php">
	              <img src="assets/images/menu-signup.png">
	              <span>Contact Us</span>
	            </a>
	          </li>
	          
	          <li>
	            <a href="about.php">
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
			  <p>
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis turpis sem, vitae suscipit sem molestie quis. Ut ac lectus rutrum, sollicitudin neque eu, efficitur nibh. Proin in velit sem. Quisque non dictum dui. Nam rhoncus cursus varius. Ut rhoncus felis id libero vehicula, efficitur dignissim mi hendrerit. Ut ut ornare justo. Quisque id ipsum nec diam mollis dignissim. Donec feugiat est in aliquet faucibus. Maecenas scelerisque laoreet luctus. Curabitur sed ante aliquam, feugiat mauris ac, fermentum metus. Aenean porttitor orci id velit eleifend elementum. Proin rhoncus neque in consectetur rhoncus. Phasellus laoreet vitae nisl vel consequat. Curabitur metus nulla, fermentum sed convallis a, fermentum suscipit lectus.
			  </p>
			  <p>
			    Curabitur efficitur egestas urna blandit condimentum. Phasellus est mauris, lobortis eu turpis sed, gravida feugiat urna. Etiam sodales luctus metus et laoreet. Curabitur laoreet quis nibh in condimentum. Vivamus rutrum libero nec dui mattis, molestie aliquam purus ornare. Pellentesque tempus, dolor nec laoreet sodales, neque dui fermentum tellus, vitae hendrerit tellus sapien quis tortor. Aliquam erat volutpat. Integer tellus elit, varius id quam nec, convallis aliquam lacus. In hac habitasse platea dictumst.
			  </p>
			  <p>
			    Donec justo urna, dictum ut tincidunt et, suscipit vel neque. Etiam feugiat purus ac maximus dignissim. Suspendisse venenatis nunc quam, vitae rhoncus nibh accumsan eu. Sed sit amet ipsum varius, tempus dolor at, accumsan ipsum. Proin eget vestibulum diam. Morbi at ipsum ut nisi faucibus molestie non hendrerit nibh. Maecenas luctus feugiat est consequat pharetra. Curabitur egestas sem vel elit sodales, at tempor diam interdum. Sed in dolor sem. Cras varius lacus sed nibh porta rhoncus. In hac habitasse platea dictumst. Aenean dapibus tortor mauris, nec dapibus nisi fringilla ac. Nunc dapibus neque a vestibulum finibus. Curabitur ut nibh ac tellus facilisis ornare. Vestibulum suscipit in odio id molestie.
			  </p>
			    <p>
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis turpis sem, vitae suscipit sem molestie quis. Ut ac lectus rutrum, sollicitudin neque eu, efficitur nibh. Proin in velit sem. Quisque non dictum dui. Nam rhoncus cursus varius. Ut rhoncus felis id libero vehicula, efficitur dignissim mi hendrerit. Ut ut ornare justo. Quisque id ipsum nec diam mollis dignissim. Donec feugiat est in aliquet faucibus. Maecenas scelerisque laoreet luctus. Curabitur sed ante aliquam, feugiat mauris ac, fermentum metus. Aenean porttitor orci id velit eleifend elementum. Proin rhoncus neque in consectetur rhoncus. Phasellus laoreet vitae nisl vel consequat. Curabitur metus nulla, fermentum sed convallis a, fermentum suscipit lectus.
			  </p>
			  <p>
			    Curabitur efficitur egestas urna blandit condimentum. Phasellus est mauris, lobortis eu turpis sed, gravida feugiat urna. Etiam sodales luctus metus et laoreet. Curabitur laoreet quis nibh in condimentum. Vivamus rutrum libero nec dui mattis, molestie aliquam purus ornare. Pellentesque tempus, dolor nec laoreet sodales, neque dui fermentum tellus, vitae hendrerit tellus sapien quis tortor. Aliquam erat volutpat. Integer tellus elit, varius id quam nec, convallis aliquam lacus. In hac habitasse platea dictumst.
			  </p>
			  <p>
			    Donec justo urna, dictum ut tincidunt et, suscipit vel neque. Etiam feugiat purus ac maximus dignissim. Suspendisse venenatis nunc quam, vitae rhoncus nibh accumsan eu. Sed sit amet ipsum varius, tempus dolor at, accumsan ipsum. Proin eget vestibulum diam. Morbi at ipsum ut nisi faucibus molestie non hendrerit nibh. Maecenas luctus feugiat est consequat pharetra. Curabitur egestas sem vel elit sodales, at tempor diam interdum. Sed in dolor sem. Cras varius lacus sed nibh porta rhoncus. In hac habitasse platea dictumst. Aenean dapibus tortor mauris, nec dapibus nisi fringilla ac. Nunc dapibus neque a vestibulum finibus. Curabitur ut nibh ac tellus facilisis ornare. Vestibulum suscipit in odio id molestie.
			  </p>
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