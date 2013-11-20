<?php
$data1= $_POST["param1"];
$data2[]= $_POST["param2"];
//echo($var);
//function postdata(){
//$postdata = file_get_contents("php://input");
$data = file_get_contents("php://input");
$data=array('Person1'=>$data1);
echo 'person('.json_encode($data).')';
//$var1 = array('Person1'=>$data1);
//$var2= array('Person2'=>$data2);
//$var = array_merge($var1,$var2);
//echo json_encode(array($var));
//}
?> 