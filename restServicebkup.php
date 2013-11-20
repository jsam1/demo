<?php
$file='booklist3.txt';
file_put_contents($file, 'Connecting..'.PHP_EOL,FILE_APPEND);   
$link = mysql_connect('discoveryofkarnataka.com', 'scrumaas', 'Anagha1716'); 

if (!$link) { 
file_put_contents($file, 'Error Out..'.PHP_EOL,FILE_APPEND);   
    file_put_contents($file, 'Could not connect: ' . mysql_error()); 
} 
file_put_contents($file, 'Connected successfully'); 
mysql_select_db(agile9); 
$sql = 'SELECT * FROM `demo` ';
$result = mysql_query($sql);
file_put_contents($file, 'SQL Error'.$e-getMessage().PHP_EOL,FILE_APPEND);    

header('Content-type: application/json');
        echo json_encode($result);

?>