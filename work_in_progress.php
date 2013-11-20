<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";
$curr_stat="";
$area_task="";
$StoryPoints=0;

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$query = "SELECT curr_stat, area_task, StoryPoints from `sprint_backlog` where `curr_stat` = 'Work In Progress' || `curr_stat` = 'Done' LIMIT 10";
$res = "region\tfruit\tcount\t\r\n";
file_put_contents("pie1.txt","hi there",FILE_APPEND|LOCK_EX);
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($curr_stat, $area_task, $StoryPoints);
    while ($stmt->fetch()) {
        // array('region'=>$curr_stat, 'fruit'=>$area_task,'count'=>$StoryPoints);
        file_put_contents("testArjun.txt",$res,FILE_APPEND|LOCK_EX);
        $res .= $area_task."\t".$curr_stat."\t".$StoryPoints."\t\r\n";
    }
    $stmt->close();
}

$con->close();

echo $res;
?>