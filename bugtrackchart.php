<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


$respass = array();
$resfailed = array();
$resnottested = array();
$restesttotal = array();

//passed %
$querypassed = "select 'Passed', count(*) from `bug` where `status` = 'passed'";

if ($stmt = $con->prepare($querypassed)) {
    $stmt->execute();
    $stmt->bind_result($Passed, $count);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $Passed, $count);
        $respass=array("fruit"=>$Passed,"count"=>$count,"region"=>"#0F0");
        
    }
    $querynottesttotal = "select 'Total', count(*) from `bug` where 'status' != 'passed'";


    if ($stmt = $con->prepare($querynottesttotal)) {
        $stmt->execute();
        $stmt->bind_result($Total, $count);
        while ($stmt->fetch()) {
            //printf("%s, %s\n", $Total, $count);
            $restesttotal=array('Total'=>$Total, 'Count'=>$count);
        }
        $stmt->close();
    }    
}
file_put_contents("pass.txt","Passed Details:",FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",$respass['Passed'].$respass['Count'].'\n',FILE_APPEND|LOCK_EX);


//failed %
$queryfailed = "select 'Failed', count(*) from `bug` where `status` = 'Failed'";


if ($stmt = $con->prepare($queryfailed)) {
    $stmt->execute();
    $stmt->bind_result($Failed, $count);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $Failed, $count);
        $resfailed=array('Failed'=>$Failed, 'Count'=>$count);
    }
    $querynottesttotal = "select 'Total', count(*) from `bug` where 'status' != 'Failed'";


    if ($stmt = $con->prepare($querynottesttotal)) {
        $stmt->execute();
        $stmt->bind_result($Total, $count);
        while ($stmt->fetch()) {
            //printf("%s, %s\n", $Total, $count);
            $restesttotal=array('Total'=>$Total, 'Count'=>$count);
        }
        $stmt->close();
    }    

}
file_put_contents("pass.txt","Failed Details:",FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($resfailed,true),FILE_APPEND|LOCK_EX);


//nottested %
$querynottested = "select 'Not Tested', count(*) from `bug` where `status` = 'Not Tested'";


if ($stmt = $con->prepare($querynottested)) {
    $stmt->execute();
    $stmt->bind_result($nottested, $count);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $nottested, $count);
        $resnottested=array('Not Tested'=>$nottested, 'Count'=>$count);
    }
    $querynottesttotal = "select 'Total', count(*) from `bug` where 'status' != 'Not Tested'";


    if ($stmt = $con->prepare($querynottesttotal)) {
        $stmt->execute();
        $stmt->bind_result($Total, $count);
        while ($stmt->fetch()) {
            //printf("%s, %s\n", $Total, $count);
            $restesttotal=array('Total'=>$Total, 'Count'=>$count);
        }
        $stmt->close();
    }
}
file_put_contents("pass.txt","Not Tested Details:",FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($resnottested,true),FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($restesttotal,true),FILE_APPEND|LOCK_EX);

$con->close();
$testcases = array();
$testcases['Passed']=  $respass;
//$testcases['Failed']=  $resfailed;
//$testcases['Not Tested']=  $resnottested;
echo json_encode($testcases);

?>