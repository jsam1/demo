<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";
$Failedcount=0;
$Totalcount=0;
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


//$respass = array();
$resfailed = array();
//$resnottested = array();
$restesttotal = array();

$queryfailed = "select 'Failed', count(*) from `bug` where `status` = 'Failed'";


if ($stmt = $con->prepare($queryfailed)) {
    $stmt->execute();
    $stmt->bind_result($Failed, $Failedcount);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $Failed, $count);
        $resfailed=array('Failed'=>$Failed, 'Count'=>$Failedcount);
    }
    $querynottesttotal = "select 'Total', count(*) from `bug` where 'status' != 'Failed'";


    if ($stmt = $con->prepare($querynottesttotal)) {
        $stmt->execute();
        $stmt->bind_result($Total, $Totalcount);
        while ($stmt->fetch()) {
            //printf("%s, %s\n", $Total, $count);
            $restesttotal=array('Total'=>$Total, 'Count'=>$Totalcount);
        }
        $stmt->close();
    }    

}
file_put_contents("pass.txt","Failed Details:",FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($resfailed,true),FILE_APPEND|LOCK_EX);

$con->close();
$testcases = array();
//$testcases['Passed']=  $respass;
$testcases['Failed']=  $resfailed;
//$testcases['Not Tested']=  $resnottested;
//echo json_encode($testcases);
echo ("color\tfruit\tcount\t\r\n#F00\tFailed\t".$Failedcount."\r\n#F00\tFailed\t".$Totalcount);

?>