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
	$query = $conn->query("select * from contact");
	$contact = array();

	while($row = $query->fetch_array()){
		array_push($contact, $row);
	}

	$res['contact'] = $contact;

}else if($action=='sendmail'){

$contact_name = $_POST['contact_name'];
$contact_email = $_POST['contact_email'];
$contact_text = $_POST['contact_text'];

	$query = $conn->query("INSERT INTO contact (contact_name, contact_email, contact_text) VALUES ('$contact_name', '$contact_email', '$contact_text')");
	$contact = array();
	$res['contact'] = $contact;

}else if($action=='deletemail'){

   $id = $_POST['id'];

   	$query = $conn->query("DELETE FROM contact WHERE id='$id'");
   	$contact = array();
   	$res['contact'] = $contact;

   }


$conn->close();
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");
echo json_encode($res);
die();
?>
