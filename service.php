<?php
require './functions.php';
require './lib/nusoap.php';
$server =  new soap_server();
$server->configureWSDL('demo'.'urn:demo');
//ComplexType
$server->wsdl->addComplexType(
'row',
'complexType',
'struct',
'all',
'',
array(
'id' => array('name' => 'id', 'type' => 'xsd:string'),
'name' => array('name' => 'name', 'type' => 'xsd:string'),
)
);
 
$server->wsdl->addComplexType(
'rowArray',
'complexType',
'array',
'',
'SOAP-ENC:Array',
array(),
array(
array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:row[]')
),
'tns:row'
);

$server->register(
            "price",
            array("name"=>"xsd:string"),
            array("return" => "tns:rowArray")
            );
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);


?>