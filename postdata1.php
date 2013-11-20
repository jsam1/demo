<?php
$data1= $_POST["param1"];
$data2[0]= $_POST["param2"];
$data2[1]= "December";
$data2[2]= "2nd";
$data2[3]= "2000";
//echo($var);
//function postdata(){
//$postdata = file_get_contents("php://input");
//$data = file_get_contents("php://input");
$name = array('Name'=>$data1);
$dob = array('dob'=>$data2);
$data=array_merge($name,$dob)   ;
echo json_encode(array('Person'=>$data));
//$var1 = array('Person1'=>$data1);
//$var2= array('Person2'=>$data2);
//$var = array_merge($var1,$var2);
//echo json_encode(array($var));
//}
?> 