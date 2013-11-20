<?php
$file='booklist4.txt';
file_put_contents($file, 'Connecting..'.PHP_EOL,FILE_APPEND);   
$link = mysql_connect('discoveryofkarnataka.ipagemysql.com', 'scrumaas', 'Anagha1716'); 
if (!$link) { 
file_put_contents($file, 'Error Out..'.PHP_EOL,FILE_APPEND);   
    file_put_contents($file, 'Could not connect: ' . mysql_error().PHP_EOL,FILE_APPEND); 
} 
file_put_contents($file, 'Connected successfully'.PHP_EOL,FILE_APPEND); 
mysql_select_db('agile9',$link); 
file_put_contents($file, 'Selected DB successfully'.PHP_EOL,FILE_APPEND); 
//$ins = "INSERT INTO agile9.demo (name, PBItemDescription, TeamName) values ('".$_POST['bookname']."' , '".$_POST['PBItemDescription']."' , 'AnaghaSystemTeam' ".")";
//file_put_contents($file, 'insert Query'.$ins.PHP_EOL,FILE_APPEND); 
//mysql_query($ins);
//$insId = mysql_insert_id();
//file_put_contents($file, 'insert Id:'.$insId.PHP_EOL,FILE_APPEND); 
$sql = 'SELECT * FROM agile9.`demo`  ';
$sections_result = mysql_query($sql) or die(mysql_error());
$records;
file_put_contents($file, 'Queried successfully'.PHP_EOL,FILE_APPEND); 
//while ($sections_array = mysql_fetch_array($sections_result, MYSQL_NUM)) {
////$sections_array = mysql_fetch_array($sections_result) or die(mysql_error());
//$records = array_merge($records,$sections_array);
//$strrow .=  $sections_array[0].','.$sections_array[1].','.$sections_array[2];
//file_put_contents($file, 'query fetch'.$strrow.PHP_EOL,FILE_APPEND);
//file_put_contents('filename.txt', print_r($sections_array,true).PHP_EOL,FILE_APPEND);
//}
$i=0;
while($sections_array = mysql_fetch_array($sections_result, MYSQL_ASSOC))
{
$records[] = $sections_array;
$i = $i + 1;
file_put_contents('filename.txt', print_r($sections_array,true).PHP_EOL,FILE_APPEND);
}
//if(!$result)
//file_put_contents($file, 'SQL Error'.json_encode($sections_array).PHP_EOL,FILE_APPEND);  
header('Content-type: application/json');
//echo 'The result is';
file_put_contents($file, 'returning..'.PHP_EOL,FILE_APPEND);  
mysql_close($link);
echo "content(".json_encode($records).")";
?>