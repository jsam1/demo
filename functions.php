<?php
function price($name)
{
    $details = array(
    'abc'=>100,
    'def'=>200,
    'xyz'=>10
    );
    
    foreach($details as $n=>$p)
    {
        if($name==$n)
            $price=$p;
    }
          
    
echo '<pre>';
try {
$dbh= new PDO("mysql:host=localhost;dbname=mysql",'root','');
}catch(PDOException $e) {
 echo $e-getMessage();
}
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$dbh->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);

$cnt = $dbh->query("SELECT * FROM `demo` ");//WHERE `name` IS NOT NULL AND `name` = 'Jayprakash' LIMIT 0 , 30"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
$c = count($cnt->fetchAll());
//echo '<br/>The no rows fetched'.$c;
$a = $dbh->prepare("INSERT INTO `demo` (`id`, `name`) VALUES(? , ? )"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
$c = $c+1;
$pass = array($c,$name);
//echo 'id is:'.$c.'<br/>';
$a->execute($pass);
$a = $dbh->query("SELECT * FROM `demo` ");//WHERE `name` IS NOT NULL AND `name` = 'Jayprakash' LIMIT 0 , 30"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
$rec = $a->fetchAll();
 return new soapval('return',$rec);
}

?>