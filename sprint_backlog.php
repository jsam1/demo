<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("scrum");


$c1 = $_POST['param1'];
$c2 = $_POST['param2'];
$c3 = $_POST['param3'];
$c4 = $_POST['param4'];
$c5 = $_POST['param5'];
$file = "test3.txt";


file_put_contents($file,"UPDATE `scrum`.`sprint_backlog` SET `title_task` ='".$c2."', `curr_stat` ='".$c5."', `task_desc` ='".$c3."', `workflow_step` ='".$c4."' WHERE `task_id` ='".$c1."';", FILE_APPEND|LOCK_EX);

$query = mysql_query("UPDATE `scrum`.`sprint_backlog`
SET
`title_task` ='".$c2."',
`curr_stat` ='".$c5."',
`task_desc` ='".$c3."',
`workflow_step` ='".$c4."' WHERE `task_id` ='".$c1."';");


$file = "test2.txt";
file_put_contents($file," param1:".$c1." param2:".$c2." param3:".$c3." param4:".$c4." param5:".$c5, FILE_APPEND|LOCK_EX);

if($query)
{
    echo "successfully updated DB";
}
else
{
    echo mysql_error();
}

?>