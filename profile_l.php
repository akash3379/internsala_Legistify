
<?php
include("database.php");
include("function.php");
if(!login())
{
	header("location:index.php");
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
   
 
</head>
  <body>
  <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php">Case_Solved</a></h1>
    </li>
    
  </ul>
  
   </center>
   <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
	<li><a href="menu.php">Book Appointment</a></li>
<li><a href="dashboard.php">Dashboard</a></li> 	
      <li class="has-dropdown active">
        <a href="#" >Hi <?php echo $_SESSION["username"]; ?></a>
        <ul class="dropdown">
          <li><a href="about.php">ABOUT</a></li>
      <li><a href="help.php" >Help</a></li>
      <li class="active"><a href="signout.php" >Signout</a></li>
        </ul>
      
  
    </ul>
 
  </section>
</nav>

<br />

	<div style="width:800px; margin:0 auto;">
	<br>
	<br>
<?php
	
	
$username=$_SESSION["username"];
//$ma=$_GET["matc"];
$id=$_GET["id"];
$query="SELECT * FROM `intern`.`signup` WHERE`id`=$id";
//echo $query;
$rc=mysql_query($query);

while($row=mysql_fetch_array($rc))
{
$nn=$row["username"];
?>
	<div class="row">
      	<div class="panel">
					
					<h1>Lawer name: <font color="#FFA500"><?php echo $row["name"]; ?></font></h1>
					<h5>Username: <font size="-0.25"><?php echo $nn; ?></font></h5>
					<h5>City: <font size="-0.25"><?php echo $row["city"]; ?></font></h5>
					<h5>Phone-no.: <font size="-0.25"><?php echo $row["phone"]; ?></font></h5>
					<h5>Email-id: <font size="-0.25"><?php echo $row["email"]; ?></font></h5>
					<center>
				 <a href="lawer_book.php?id=<?php echo $id; ?>&&user=<?php echo $nn; ?>"><input type="submit" class="medium success button"value="Book?"/></a>
					</center>
		</div>	
  </div>
<?php

}


?>
  
	 <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	</div>
</body>
</html>
