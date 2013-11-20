<?php

$conn = mysql_connect("localhost","root","");
mysql_select_db("demo");

$c1 = $_POST['param1'];
$c2 = $_POST['param2'];
$c3 = $_POST['param3'];
$c4 = $_POST['param4'];
$c5 = $_POST['param5'];

// $checkUserQuery = mysql_query("SELECT * FROM user where username='$c1'");
// if(!$username OR !$password)
	// {echo ("Not Valid!");}
	// elseif(mysql_num_rows($checkUserQuery) > 0){
	// echo ("alerdy exit");
	// }
	// else
	// {
	$query = mysql_query("INSERT INTO `demo`.`user` ( `username`, `password`, `fname`, `lname`, `email`)  VALUES('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."')");
	// echo("Signup Successful");	
	$file = "test1.txt";
	file_put_contents($file," param1:".$c1." param2:".$c2." param3:".$c3." param4:".$c4." param5:".$c5, FILE_APPEND | LOCK_EX);
	// }

?>