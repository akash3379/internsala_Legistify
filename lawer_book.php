
<?php
include("database.php");
include("function.php");
session_start();
if(!login())
{
	header("location:index.php");
}
if($_GET['rc']==1)
echo "<script>alert('Lawyer not available on this date Plz choose anote Time and date:');</script>";
$u=$_GET['user'];
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

	<div class="row">
      	<div class="panel">
			<form >
			<h3>For Lawyer:<font color="red"><?php echo $_GET['user']?></font></h3>
			<input value="<?php echo $_GET['user']?>" type="hidden" name="lawyer" >
			
			<?php
			$i=0;
			$q="SELECT * FROM `intern`.`avl` WHERE `username`='$u'";

			$result=mysql_query($q);
			
			$count=mysql_num_rows($result);
			if($count>0)
			{
			$i=1;
			$r=mysql_fetch_assoc($result);
			echo "<h6>Lawyer is not available: <font color='red'>From:";
			echo $r['date1'];
			echo " to ";
			echo $r['date2'];
			echo "</center></font></h6>";
			}
			?>
			<hr>
			<h4>Take appointment::</h4><br>
			
			Case Subject:<input type="text" name="subject" class="txt">
			Description:<input type="text" name="desc" class="txt">
			<div class="large-4 medium-4 columns">
				Date:<input type="date" name="date" class="txt">
				</div>
		<div class="large-4 medium-4 columns">
		Time:<input type="time" name="time" class="txt">
		</div>
		<br>
		<input type="submit" name ="sub" class="medium success button"value="SET"/>
		</form>
		</div>	
  </div>

	 <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	</div>
</body>
</html>
<?php



if(isset($_GET['sub']))
{
	$subject=$_GET['subject'];
	$desc=$_GET["desc"];
	$date1=$_GET['date'];
	$time1=$_GET['time'];
	$lawyer=$_GET['lawyer'];
	$user=$_SESSION["username"];
	$q="SELECT * FROM `intern`.`avl` WHERE `username`='$lawyer'";

	$result=mysql_query($q);
	
	$count=mysql_num_rows($result);
	echo $count;
	if($count>0)
	{
	
		$r=mysql_fetch_assoc($result);
		$d1=$r['date1'];
		$d2=$r['date2'];
		if($d1<$date1 && $d2>$date1)
		{
			
			header("location:lawer_book.php?user=$lawyer&&rc=1");
		}
		else
		{
			$dt=$date1." ".$time1;
			$user=$_SESSION['username'];
			$q="INSERT INTO  `intern`.`$user` (`booked_lawer` ,`case_sub` ,`desc` ,`time_date`,`check`)VALUES (  '$lawyer',  '$subject',  '$desc',  '$dt','0')";
			$result=mysql_query($q) ;
			$q="INSERT INTO  `intern`.`$lawyer` (`id` ,`client_name`,`case_sub`,`desc` ,`time_date`)VALUES (NULL , '$user',  '$subject',  '$desc', '$dt')";
			echo $q;
			$result=mysql_query($q) ;
			
			header("location:dashboard.php");
		}
	}
	else
	{
			$dt=$date1." ".$time1;
			$user=$_SESSION['username'];
			$q="INSERT INTO  `intern`.`$user` (`booked_lawer` ,`case_sub` ,`desc` ,`time_date`,`check`)VALUES (  '$lawyer',  '$subject',  '$desc',  '$dt','0')";
			$result=mysql_query($q) ;
			$q="INSERT INTO  `intern`.`$lawyer` (`id` ,`client_name`,`case_sub`,`desc` ,`time_date`)VALUES (NULL , '$user',  '$subject',  '$desc', '$dt')";
			echo $q;
			$result=mysql_query($q) ;
			header("location:dashboard.php");
	}
}
?>