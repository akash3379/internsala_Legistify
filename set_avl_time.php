
<?php
include("database.php");
include("function.php");
if(!login())
{
	header("location:index.php");
}
$u=$_SESSION["username"];
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
<li><a href="dashboard_l.php">Dashboard</a></li> 	
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
	<?php
	$i=0;
	$q="SELECT * FROM `intern`.`avl` WHERE `username`='$u'";

	$result=mysql_query($q);
	
	$count=mysql_num_rows($result);
	if($count>0)
	{
	$i=1;
	$r=mysql_fetch_assoc($result);
	echo "<center><h4><font color='red'><h3>You are Not available at:</h3><br>From:";
	echo $r['date1'];
	echo " to ";
	echo $r['date2'];
	echo "</center></font></h4>";
	}
	?>
      	<div class="panel">
		<h3>SET the time in which you are not available:</h3>
				<form>
				From:<input type="date" name="date1" class="txt">
			<br>
			To:<input type="date" name="date2" class="txt">
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

$date1=$_GET['date1'];
$date2=$_GET['date2'];

if($i==1)
{
$qq="UPDATE  `intern`.`avl` SET  `date1` =  '$date1',
	`date2` =  '$date2' WHERE  `username` ='$u'";
	$rc=mysql_query($qq);
	if($rc)
	header("location:dashboard_l.php");	
}
else
{
$q="INSERT INTO  `intern`.`avl` (
`id` ,
`username` ,
`date1` ,
`date2`
)
VALUES (
NULL ,  '$u',  '$date1',  '$date2')";
$rc=mysql_query($q);
if($rc)
header("location:dashboard_l.php");
}
}

?>