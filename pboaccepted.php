<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

// $sampleGroups = array(
            // array( 'key'=> 'group1', 'title'=> 'Project Title: 1', 'subtitle'=> 'Project Subtitle: 1', 'backgroundImage'=> 'darkGray  ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            // array( 'key'=> 'group2', 'title'=> 'Project Title: 2', 'subtitle'=> 'Project Subtitle: 2', 'backgroundImage'=> 'lightGray ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            // array( 'key'=> 'group3', 'title'=> 'Project Title: 3', 'subtitle'=> 'Project Subtitle: 3', 'backgroundImage'=> 'mediumGray', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            // array( 'key'=> 'group4', 'title'=> 'Project Title: 4', 'subtitle'=> 'Project Subtitle: 4', 'backgroundImage'=> 'lightGray ', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            // array( 'key'=> 'group5', 'title'=> 'Project Title: 5', 'subtitle'=> 'Project Subtitle: 5', 'backgroundImage'=> 'mediumGray', 'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' ),
            // array( 'key'=> 'group6', 'title'=> 'Project Title: 6', 'subtitle'=> 'Project Subtitle: 6', 'backgroundImage'=> 'darkGray',   'description'=> 'groupDescription', 'status' => 'Not Started', 'teamsize' => 'Team Size 5' )
        // );
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$c1 = $_POST['param1'];
$selectqry = "SELECT * FROM scrum.product_backlog WHERE pboid = '".$c1."';";
//$msg = 'Connected successfully';
file_put_contents("pbo1.txt",$c1,FILE_APPEND|LOCK_EX);
$result = mysql_query($selectqry);
if (!$result) {
    //file_put_contents("pbo.txt",$c1,FILE_APPEND|LOCK_EX); 
die('Invalid query: ' . mysql_error());
}
$listpbo = array();
while ($row = mysql_fetch_assoc($result)) {
array_push($listpbo,    array('key'=> $row['requestid'],
    //$row['fieldname']
	'requestid'=> $row['requestid'],
    'title'=>$row['title'],
    'desc'=> $row['description'],
	'assign'=>$row['assignedto'],
	'state'=> $row['state'],
	'work_left'=>$row['work_left'],
	'story_brd'=> $row['storyboard'],
	'estimate_stry'=> $row['estimate_story'],
	'test_case'=> $row['test_case'],
	'accept_criteria'=> $row['accept_criteria'],
	'history'=> $row['history'],
	'links'=> $row['links'],
	'attachment'=> $row['attachment'],
	'effort_detail'=> $row['effort_detail'],
	'buisness_value'=> $row['buisness_value'],
	'area'=> $row['area'],
	'backlog_priority'=> $row['backlog_priority'],
	'work_type'=> $row['work_type'],
	'Status'=> $row['status']));
    file_put_contents("pbo.txt",$row['requestid'].$row['title'].$row['description'].$row['state'],FILE_APPEND|LOCK_EX); 
}
mysql_close($link);
$data=array('Product'=>$listpbo);
echo json_encode($data);

?>