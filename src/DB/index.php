<?php

$conn = new mysqli("localhost", "root", "", "drivetofix");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = array('error' => false);

$action="show";

if(isset($_GET['action'])){
	$action=$_GET['action'];
}

if($action=='show'){
	$query = $conn->query("select * from users");
	$users = array();

	while($row = $query->fetch_array()){
		array_push($users, $row);
	}

	$res['users'] = $users;
}



$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();

?>
