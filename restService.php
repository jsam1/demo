<?php
/* require the user as the parameter */
//if(isset($_GET['user']) && intval($_GET['user'])) {

	/* soak in the passed variable or set our own */
	$number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; //10 is the default
	//$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$user_id = $_GET['user']; //no default

	///* connect to the db */
	//$link = mysql_connect('localhost','username','password') or die('Cannot connect to the DB');
	//mysql_select_db('db_name',$link) or die('Cannot select the DB');

	///* grab the posts from the db */
	//$query = "SELECT post_title, guid FROM wp_posts WHERE post_author = $user_id AND post_status = 'publish' ORDER BY ID DESC LIMIT $number_of_posts";
	//$result = mysql_query($query,$link) or die('Errant query:  '.$query);

	///* create one master array of the records */
	//$posts = array();
	//if(mysql_num_rows($result)) {
	//	while($post = mysql_fetch_assoc($result)) {
	//		$posts[] = array('post'=>$post);
	//	}
	//}
    //echo 'executing';
    //echo '<pre>';
$file='booklist3.txt';
//file_put_contents($file, 'Connecting..'.'Host:'.$_SERVER["SERVER_NAME"].'PORT:'.$_SERVER["REMOTE_PORT"].PHP_EOL,FILE_APPEND);   
//$link = mysql_connect('discoveryofkarnataka.ipagemysql.com', 'scrumaas', '*password*'); 
//if (!$link) { 
//    die('Could not connect: ' . mysql_error()); 
//} 
//echo 'Connected successfully'; 
//mysql_select_db(agile9); 
try {
//$dbh= new PDO("mysql:host=localhost;dbname=mysql",'root','');
file_put_contents($file, 'Connecting..'.PHP_EOL,FILE_APPEND);   
//$dbh= new PDO("mysql:discoveryofkarnataka.ipagemysql.com",'dbname=agile9','scrumaas', 'Anagha1716'); 
$link = mysql_connect('discoveryofkarnataka.com', 'scrumaas', 'Anagha1716'); 
if (!$link) { 
file_put_contents($file, 'Error Out..'.PHP_EOL,FILE_APPEND);   
    file_put_contents($file, 'Could not connect: ' . mysql_error()); 
} 
file_put_contents($file, 'Connected successfully'); 
mysql_select_db(agile9); 
$sql = 'SELECT * FROM `demo` ';
$result = mysql_query($sql);
//}catch(PDOException $e) {
// echo $e-getMessage();
// file_put_contents($file, 'Error..'.$e-getMessage().PHP_EOL,FILE_APPEND);   
//}
//file_put_contents($file, 'Connected..'.PHP_EOL,FILE_APPEND);   
file_put_contents($file, 'SQL Error'.$e-getMessage().PHP_EOL,FILE_APPEND);    
//$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
//$dbh->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);

//$cnt = $dbh->query("SELECT * FROM `demo` ");//WHERE `name` IS NOT NULL AND `name` = 'Jayprakash' LIMIT 0 , 30"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
//$c = count($cnt->fetchAll());
////echo '<br/>The no rows fetched'.$c;
//$a = $dbh->prepare("INSERT INTO `demo` (`id`, `name`,`PBItemDescription`, `TeamName`) VALUES(? , ? , ? , ? )"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
//$c = $c+1;
//$pass = array($c,$_POST['bookname'],$_POST['PBItemDescription'] );



////echo 'id is:'.$c.'<br/>';
//$a->execute($pass);
//$a = $dbh->query("SELECT * FROM `demo` ");//WHERE `name` IS NOT NULL AND `name` = 'Jayprakash' LIMIT 0 , 30"); // WHERE `name` is not null and  `name` = 'Jayprakash'");
//$posts = $a->fetchAll();
//file_put_contents('query.txt',json_encode($posts).PHP_EOL,FILE_APPEND);
//print_r($posts);
	/* output in necessary format */
	///if($format == 'json') {
		header('Content-type: application/json');
		//print_r( json_encode($posts));
        echo json_encode($result);
        //echo  json_encode($posts);
        //return json_encode(array('content'=>$posts));
	//}
	//else {
	//	header('Content-type: text/xml');
	//	echo '<posts>';
	//	foreach($posts as $index => $post) {
	//		if(is_array($post)) {
	//			foreach($post as $key => $value) {
	//				echo '<',$key,'>';
	//				if(is_array($value)) {
	//					foreach($value as $tag => $val) {
	//						echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
	//					}
	//				}
	//				echo '</',$key,'>';
	//			}
	//		}
	//	}
	//	echo '</posts>';
	//}

	/* disconnect from the db */
	//@mysql_close($link);
//}
?>