<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

$query = "SELECT `Done`, count(*) from `sprint_backlog` where `curr_stat` = 'Done'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($Work In Progress, $count);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $Work In Progress, $count);
    }
    $stmt->close();
}

?>