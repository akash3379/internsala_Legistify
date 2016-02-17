
<?php
include("database.php");
include("function.php");
session_start();
if(!login())
{
	header("location:index.php");
}
$user=$_GET['user'];
$u=$_SESSION['username'];
$q="UPDATE  `intern`.`$u` SET  `check` =  '1' WHERE  `client_name`='$user'";
mysql_query($q) or die("error");
$q="UPDATE  `intern`.`$user` SET  `check` =  '1' WHERE  `booked_lawer`='$u'";
mysql_query($q) or die("error");
header("location:dashboard_l.php");
?>