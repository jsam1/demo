<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$res = array();
$query = "SELECT `sprint_backlog`.`area_task`, `sprint_backlog`.`title_task`, `sprint_backlog`.`actual_effrt`, `sprint_backlog`.`wrk_remng`, `sprint_backlog`.`tot_hr_wrk`, `sprint_backlog`.`task_id`, `sprint_backlog`.`esitmated_wrk_hrs`, `sprint_backlog`.`bad`, `sprint_backlog`.`satisfactory`, `sprint_backlog`.`good` FROM `scrum`.`sprint_backlog` LIMIT 10;";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($area_task, $title_task, $actual_effrt, $wrk_remng, $tot_hr_wrk, $task_id, $esitmated_wrk_hrs, $bad, $satisfactory, $good);
    while ($stmt->fetch()) {
        $res[] = array('title'=>$area_task, 'subtitle'=>$title_task,'ranges'=>array($bad,$satisfactory,$good), 'measures'=>array($actual_effrt,$wrk_remng,$tot_hr_wrk), 'markers'=>array($esitmated_wrk_hrs) );
    }
    $stmt->close();
}


$con->close();
echo json_encode($res);
?>