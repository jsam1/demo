<?php
echo '<pre>';
try {
$dbh= new PDO("mysql:host=localhost;dbname=mysql",'root','');
}catch(PDOException $e) {
 echo $e-getMessage();
}
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$dbh->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);

$a = $dbh->query("SELECT * FROM `demo` WHERE `name` IS NOT NULL AND `name` = 'Jayprakash' LIMIT 0 , 30"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
print_r( $a->fetch());
?>