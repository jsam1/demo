<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
//$data1= $_POST['param1'];
//$data2= $_POST['param2'];
//echo($var);
//function postdata(){
//$postdata = file_get_contents('php=>//input');
//$data = file_get_contents('php=>//input');
$sampleGroups = array(
            /*'Person1'=>*/array( 'key'=> 'group1', 'title'=> 'Project Title: 1', 'subtitle'=> 'Project Subtitle: 1', 'backgroundImage'=> 'darkGray  ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            /*'Person2'=>*/array( 'key'=> 'group2', 'title'=> 'Project Title: 2', 'subtitle'=> 'Project Subtitle: 2', 'backgroundImage'=> 'lightGray ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            /*'Person3'=>*/array( 'key'=> 'group3', 'title'=> 'Project Title: 3', 'subtitle'=> 'Project Subtitle: 3', 'backgroundImage'=> 'mediumGray', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            /*'Person4'=>*/array( 'key'=> 'group4', 'title'=> 'Project Title: 4', 'subtitle'=> 'Project Subtitle: 4', 'backgroundImage'=> 'lightGray ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            /*'Person5'=>*/array( 'key'=> 'group5', 'title'=> 'Project Title: 5', 'subtitle'=> 'Project Subtitle: 5', 'backgroundImage'=> 'mediumGray', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            /*'Person6'=>*/array( 'key'=> 'group6', 'title'=> 'Project Title: 6', 'subtitle'=> 'Project Subtitle: 6', 'backgroundImage'=> 'darkGray',   'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' )
        );
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$msg = 'Connected successfully';
file_put_contents("debug.txt",$msg,FILE_APPEND|LOCK_EX);
$result = mysql_query('SELECT * FROM Scrum.Projects;');
if (!$result) {
file_put_contents("debug.txt",mysql_error(),FILE_APPEND|LOCK_EX); 
die('Invalid query: ' . mysql_error());
}
$ProjectDetails = array();
while ($row = mysql_fetch_assoc($result)) {
array_push($ProjectDetails,    array('key'=> $row['ProjID'],
    'Title'=> $row['Title'],
    'subtitle'=>$row['Subtitle'],
    'description'=> $row['Description'],
    'status'=> $row['Status'],
    'teamsize'=> $row['Teamsize'],
    'domain'=> $row['Domain'],
    'ratings'=> $row['Ratings']));
    file_put_contents("debug.txt",$row['ProjID'].$row['Title'].$row['Status'].$row['Domain'],FILE_APPEND|LOCK_EX); 

}
mysql_close($link);
$data=array('Project'=>$ProjectDetails);
echo json_encode($data);
//}
?>