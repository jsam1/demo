<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";
$Passcount=0;
$Totalcount=0;
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


$respass = array();
//$resfailed = array();
//$resnottested = array();
$restesttotal = array();

//passed %
$querypassed = "select 'Passed', count(*) from `bug` where `status` = 'passed'";

if ($stmt = $con->prepare($querypassed)) {
    $stmt->execute();
    $stmt->bind_result($Passed, $Passcount);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $Passed, $Passcount);
        $respass[0]=array("fruit"=>$Passed,"count"=>$Passcount,"color"=>"#0F0");
        
    }
    $querynottesttotal = "select 'Passed', count(*) from `bug` where 'status' != 'passed'";


    if ($stmt = $con->prepare($querynottesttotal)) {
        $stmt->execute();
        $stmt->bind_result($Total, $Totalcount);
        while ($stmt->fetch()) {
            //printf("%s, %s\n", $Total, $count);
            $respass[1]=array('fruit'=>$Total, 'count'=>$Totalcount,"color"=>"#0F0");
        }
        $stmt->close();
    }    
}
file_put_contents("pass.txt","Passed Details:",FILE_APPEND|LOCK_EX);
//file_put_contents("pass.txt",$respass['Passed'].$respass['Count'].'\n',FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($respass,true),FILE_APPEND|LOCK_EX);

$con->close();
$testcases = array();
$testcases['Passed']=  $respass;
//$testcases['Failed']=  $resfailed;
//$testcases['Not Tested']=  $resnottested;
//echo json_encode($respass);
//echo ("color\tfruit\tcount\t\r\n#0F0\tTask1\t10\r\n#0F0\tTask1\t5")
echo ("color\tfruit\tcount\t\r\n#0F0\tPassed\t".$Passcount."\r\n#0F0\tPassed\t".$Totalcount);
?>