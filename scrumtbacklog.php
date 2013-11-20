<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("demo");


$c1 = $_POST['param1'];
$c2 = $_POST['param2'];
$c3 = $_POST['param3'];
$c4 = $_POST['param4'];
$c5 = $_POST['param5'];


$query = mysql_query("UPDATE INTO `scrum`.`sprint_backlog` ( 'taskid',`title_task`, `task_desc`, `workflow_step`, `status`)   VALUES('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."')");


$file = "test2.txt";
file_put_contents($file," param1:".$c1." param2:".$c2." param3:".$c3." param4:".$c4." param5:".$c5, FILE_APPEND
|LOCK_EX);


?>