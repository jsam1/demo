<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="scrum";
$Nottestedcount=0;

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


//$respass = array();
$resfailed = array();
$resnottested = array();
$restesttotal = array();
$Nottestedcount=0;
$Totalcount=0;
$querynottested = "select 'Not Tested', count(*) from `bug` where `status` = 'Not Tested'";


if ($stmt = $con->prepare($querynottested)) {
    $stmt->execute();
    $stmt->bind_result($nottested, $Nottestedcount);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $nottested, $count);
        $resnottested=array('Not Tested'=>$nottested, 'Count'=>$Nottestedcount);
    }
    $querynottesttotal = "select 'Total', count(*) from `bug` where 'status' != 'Not Tested'";


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
file_put_contents("pass.txt","Not Tested Details:",FILE_APPEND|LOCK_EX);
file_put_contents("pass.txt",print_r($resnottested,true),FILE_APPEND|LOCK_EX);
//file_put_contents("pass.txt",print_r($restesttotal,true),FILE_APPEND|LOCK_EX);

$con->close();
$testcases = array();
//$testcases['Passed']=  $respass;
//$testcases['Failed']=  $resfailed;
$testcases['Not Tested']=  $resnottested;
//echo json_encode($testcases);
echo ("color\tfruit\tcount\t\r\n#FF0\tNot Tested\t".$Nottestedcount."\r\n#FF0\tNot Tested\t".$Totalcount);
?>