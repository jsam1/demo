<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php
require './lib/nusoap.php';
try
{
$client = new nusoap_client("http://localhost/xampp/demo/service.php?wsdl");
$book_name = $_POST['bookname'];
$price=$client->call('price',array("name"=>"$book_name"));
}
catch (SoapFault $e)
{
    echo $e->getMessage() . "\n";
}
echo $price["id"].'<br/>';
print_r($price["id"]);
if($client->fault)
echo 'This book doesnot exist';
else
{
$book= '<h2>The price of the book :'.$book_name.' : </h2>';
$file='booklist.txt';
file_put_contents($file,$book.PHP_EOL,FILE_APPEND);
echo '<pre>';
print_r($price);
echo 'Added the book to the Bought list';
}


?>
</body>
</html>
