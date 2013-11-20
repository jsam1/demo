<?php
/**
 make an http POST request and return the response content and headers
 @param string $url    url of the requested script
 @param array $data    hash array of request variables
 @return returns a hash array with response content and headers in the following form:
     array ('content'=>'<html></html>'
         , 'headers'=>array ('HTTP/1.1 200 OK', 'Connection: close', ...)
         )
 */
function http_post ($url, $data)
 {
     //$url = http_build_query (array($url));
     $data_url = http_build_query (array($data));
     $data_len = 2;

     //writing the params to the file
     $file='booklist.txt';
     file_put_contents($file,urlencode($_POST['bookname']).PHP_EOL,FILE_APPEND);
     
     
     return array ('content'=>file_get_contents ($url, false, stream_context_create (array ('http'=>array ('method'=>'POST'
             , 'header'=>"Content-type: application/json\r\n Connection: close\r\nContent-Length: $data_len\r\n"
             , 'content'=>$data_url
             ))))
         , 'headers'=>$http_response_header
         );
 }
 
$url = 'http://localhost/xampp/demo/restService.php?user='.urlencode($_POST['bookname']).'&num=30';
$bookreader = $_POST['bookname'];
$reader = http_post($url,$bookreader);
echo json_encode($reader);

?>