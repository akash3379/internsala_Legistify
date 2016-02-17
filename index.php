<?php
include("database.php");
include("function.php");
if(isset($_SESSION["username"]))
{
	header("location:menu.php");
}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Case_Solved</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
   
	<script language="javascript">
function check()
{

 if(document.form1.user.value=="")
  {
    alert("Plese Enter Username/Email-id");
	document.form1.user.focus();
	return false;
  }
 }
	
	</script>
</head>
  <body>
  <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">Case_Solved</a></h1>
    </li>   
  </ul>
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
	  <li><a href="signin.php">Sign In</a></li>	
      <li class="has-dropdown">
        <a href="#">New?</a>
        <ul class="dropdown">
          <li><a href="about.php">ABOUT</a></li>
		  <li><a href="#">Help</a></li>
        </ul>
      </li>
	  <li class="active"><a href="signup.php">Sign Up</a></li>
	
    </ul>

  </section>
</nav>
      <div class="row">
      <div class="large-12 columns">
        <h1>Welcome to Case_Solved.com</h1>
		
         
      </div>
	 
    </div>
    
    <div class="row">
      <div class="large-12 columns">
      	<div class="panel">
	        <h3>Book Online appointment now for free! </h3>
	        <p>Case_Solved is very good platform to book appointment to any lawyer in the india.</p>
	        <p>Try it now by signing up...</p>
	       <center><a href="signup.php" class="medium success button">Sign Up!</a></center>
      	</div>
      </div>
    </div>

    <div class="row">
      <div class="large-8 medium-8 columns">
        <h5>Here&rsquo;s your basic grid:</h5>
        <!-- Grid Example -->

        <div class="row">
          <div class="large-12 columns">
            <div class="callout panel">
              <p><strong>Thanks for your visit.</strong> Come Again.Tell your friends about it.</p>
            </div>
          </div>
        </div>          
				
    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>