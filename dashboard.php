
<?php
include("database.php");
include("function.php");
if(login())
{


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

 if(document.form1.key.value=="")
  {
    alert("Plese Enter something");
  document.form1.key.focus();
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
<?php
}

?>
<br />

	<div style="width:800px; margin:0 auto;">
	<br>
	<br>
<?php
	
	
$username=$_SESSION["username"];
//$ma=$_GET["matc"];
$query="SELECT * FROM `intern`.`$username` ORDER BY `id` DESC";

$rc=mysql_query($query);
$i=0;
while($row=mysql_fetch_array($rc))
{
	$i++;
?>
	<div class="row">
      	<div class="panel">
					<h3>Appointment: <font color="red"><?php echo $i; ?></font></h3>
					<hr>
					<h3>Lawer Username: <font color="#FFA500"><?php echo $row["booked_lawer"]; ?></font></h3>
					<h4>Case Subject: <font size="-0.25"><?php echo $row["case_sub"]; ?></font></h4>
					<h4>Description: <font size="-0.25"><?php echo $row["desc"]; ?></font></h4>
					<h4>Date-time: <font size="-0.25"><?php echo $row["time_date"]; ?></font></h4>
					<?php 
						if($row["check"]==1)
						{
					?>
					___________________________________________________________<font size="+1" color="green">verified by Lawyer</font>
					<?php
					
					}
					else
					{
					?>
					_____________________________________________________<font size="+1" color="red">Haven't verified yet by Lawyer</font>
					<?php
					
					}
					?>
		</div>	
  </div>
<?php

}
if($i==0)
{
echo "<h3>You havent take any appointment</h3>";	
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
