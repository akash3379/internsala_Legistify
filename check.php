<?php
include("database.php");
include("function.php");
if($_GET["rc"]==1){
	
echo "<script>alert('wrong Password or username::');</script>";
}
if(isset($_POST["subcheck"])){
$name=$_POST["username"];
$pass=$_POST["password"];

$check="SELECT * FROM signup WHERE `username`='$name' AND `pass`='$pass'";
$result=mysql_query($check);

$count=mysql_num_rows($result);

if($count>0){
 
	
		if($re=="on")
		{
			setcookie("username",$_POST["username"],time()+60*60*24*60);
			$_SESSION["username"]=$_POST["username"];
		}
		else if($re=="")
		{
			$_SESSION["username"]=$_POST["username"];
		}
		echo $_SESSION["username"];	
header("location:menu.php");
}
else
{
header("location:signin.php?rc=1");
}
}
?>