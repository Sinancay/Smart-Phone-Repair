<?php
$conn = new mysqli("localhost", "root", "", "smartphone");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$action="show";

if(isset($_GET['action'])){
	$action=$_GET['action'];
}

if($action=='show'){
	$query = $conn->query("select * from devices");
	$devices = array();

	while($row = $query->fetch_array()){
		array_push($devices, $row);
	}

	$res['devices'] = $devices;

}else if($action=='newdevice'){

$mark = $_POST['mark'];
$model = $_POST['model'];
$screen_cost = $_POST['screen_cost'];
$battery_cost = $_POST['battery_cost'];
$other_parts = $_POST['other_parts'];

	$query = $conn->query("INSERT INTO devices (mark, model, screen_cost, battery_cost, other_parts) VALUES ('$mark', '$model', '$screen_cost', '$battery_cost', '$other_parts')");
	$devices = array();
	$res['devices'] = $devices;

}else if($action=='editdevice'){

$id = $_POST['id'];
$mark = $_POST['mark'];
$model = $_POST['model'];
$screen_cost = $_POST['screen_cost'];
$battery_cost = $_POST['battery_cost'];
$other_parts = $_POST['other_parts'];

 	$query = $conn->query("UPDATE devices SET mark='$mark', model='$model', screen_cost='$screen_cost', battery_cost='$battery_cost', other_parts='$other_parts' WHERE id='$id'");
 	$devices = array();
 	$res['devices'] = $devices;

 }else if($action=='deletedevice'){

   $id = $_POST['id'];

   	$query = $conn->query("DELETE FROM devices WHERE id='$id'");
   	$devices = array();
   	$res['devices'] = $devices;

   }else if($action=='devicename'){

    $query = $conn->query("select model from devices");
	$devices = array();

	while($row = $query->fetch_array()){
		array_push($devices, $row);
	}

	$res['devices'] = $devices;

   }


$conn->close();
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");
echo json_encode($res);
die();
?>
