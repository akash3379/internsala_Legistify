<?php
include("function.php");
include("database.php");
if(isset($_POST["sub_client"])){
$a=$_POST["name"];
$b=$_POST["user"];
$c=$_POST["pass"];
$d=$_POST["city"];
$e=$_POST["phone"];
$f=$_POST["email"];

$check="SELECT * FROM signup WHERE `username`='$b' AND `lawer_or_client`='0'";
$result=mysql_query($check);

$count=mysql_num_rows($result);
if($count>=1)
{
echo "<script>alert('Already have an account:::');</script>";
header("location:signup.php");

}
else{



$cre="CREATE TABLE IF NOT EXISTS `$b` (
`id` int(11) NOT NULL auto_increment,
  `booked_lawer` varchar(500) default NULL,
  `case_sub` varchar(500) default NULL,
  `desc` varchar(500) NOT NULL,
  `time_date` datetime NOT NULL,
  `check` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ";

//echo $cre;

mysql_query($cre)or die("Could Not Perform the db");
$table="INSERT INTO  `intern`.`signup` (
`id` ,
`name` ,
`username` ,
`pass` ,
`city` ,
`phone` ,
`email` ,
`lawer_or_client`,
`image`
)
VALUES (
NULL ,  '$a',  '$b',  '$c',  '$d',  '$e',  '$f','0',NULL)";	

$rs=mysql_query($table)or die("Could Not Perform the Query");

echo "<script>alert('account created plz Log in::');</script>";	
header("location:signin.php?returnc=1 && name=$b");
}
}





// for Lawer

if(isset($_POST["sub_lawer"])){
$a=$_POST["name"];
$b=$_POST["user"];
$c=$_POST["pass"];
$d=$_POST["city"];
$e=$_POST["phone"];
$f=$_POST["email"];

$check="SELECT * FROM signup WHERE `username`='$b' AND `lawer_or_client`='0'";
$result=mysql_query($check);

$count=mysql_num_rows($result);
if($count>=1)
{
echo "<script>alert('Already have an account:::');</script>";
header("location:signup.php");

}
else{



$cre="CREATE TABLE  `intern`.`$b` (
`id` int(11) NOT NULL auto_increment,
  `client_name` varchar(100) NOT NULL,
  `case_sub` varchar(500) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `time_date` datetime NOT NULL,
  `check` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
)  ";

//echo $cre;

mysql_query($cre)or die("Could Not Perform the db");
$table="INSERT INTO  `intern`.`signup` (
`id` ,
`name` ,
`username` ,
`pass` ,
`city` ,
`phone` ,
`email` ,
`lawer_or_client`,
`image`
)
VALUES (
NULL ,  '$a',  '$b',  '$c',  '$d',  '$e',  '$f','1',NULL)";	
echo $table;
$rs=mysql_query($table)or die("Could Not Perform the Query");	
echo "<script>alert('account created plz Log in::');</script>";
header("location:signin.php");
}
}
?>