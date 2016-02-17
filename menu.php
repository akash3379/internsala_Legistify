
<?php
include("database.php");
include("function.php");
session_start();
// if lawer
$u=$_SESSION['username'];
$query="SELECT  *
FROM  `signup` 
WHERE  `username`='$u'";

if(!login())
{
	header("location:index.php");
}
$rc=mysql_query($query);
$row=mysql_fetch_array($rc);
if($row['lawer_or_client']==1)
{
	header("location:dashboard_l.php");
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
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
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
     <center>
		 
		   <form  method="get" name="form1" action="menu.php" onSubmit="return check();">
          <input name="key" type="text" size="70" placeholder="search by name" ><br>
          <input type="submit" name="sub" value="Search" class="button" />
        </form>     
</center>
<hr>	
<?php	
	
if(!isset($_GET["sub"]))
{
$query="SELECT * FROM `intern`.`signup` WHERE `lawer_or_client`='1' ORDER BY `id` DESC";

$rc=mysql_query($query);
while($row=mysql_fetch_array($rc))
			{
				$i++;
			?>
	<div class="row">
      	<div class="panel">
					
					<h3><a href="profile_l.php?id=<?php echo $row['id']; ?>">Lawer name: <font color="#FFA500"><?php echo $row["name"]; ?><font size="-10" color="red">click here to book</font></a></font></h3>
					<h5>User-name: <font size="-0.25"><?php echo $row["username"]; ?></font></h5>
					<h5>email: <font size="-0.25"><?php echo $row["email"]; ?></font></h5>
					
		</div>	
  </div>
  <hr>
<?php

}

if($i==0)
{
echo "<h3>No result</h3>";	
}
}
else
{
$i=0;
if(isset($_GET['key'])){
	$keywords=$_GET['key'];
	$terms = explode(" ",$keywords);


		//print_r($terms);
		$query="SELECT * FROM `signup` WHERE  ";
		$i=0;
		foreach($terms as $each)
		{
			$i++;
			if($i==1)
			{
			$query .= "name LIKE '%$each%' OR username LIKE '%$each%' ";	
			}
			else
			{
			$query .= " OR name LIKE '%$each%' OR username LIKE '%$each%' ";
			}

			$query .= "AND `lawer_or_client`='1' ORDER BY `id` DESC";
			
		}
		//echo $query;
		$rc=mysql_query($query);
		$numrows=mysql_num_rows($rc);
		if($numrows>0)
		{
			while($row=mysql_fetch_array($rc))
			{
				$i++;
				if($row['lawer_or_client']==0) continue;
			?>
	<div class="row">
      	<div class="panel">
					
					<h3><a href="profile_l.php?id=<?php echo $row['id']; ?>">Lawer name: <font color="#FFA500"><?php echo $row["name"]; ?><font size="-10" color="red">click here to book</font></a></font></h3>
					<h5>User-name: <font size="-0.25"><?php echo $row["username"]; ?></font></h5>
					<h5>email: <font size="-0.25"><?php echo $row["email"]; ?></font></h5>
					
		</div>	
  </div>
  <hr>
<?php

}
if($i==0)
{
echo "<h3>No result</h3>";	
}
}
}



}
?>
		
	<center>
    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
