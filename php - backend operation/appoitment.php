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
	$query = $conn->query("select * from appoitment");
	$appoitment = array();

	while($row = $query->fetch_array()){
		array_push($appoitment, $row);
	}

	$res['appoitment'] = $appoitment;

}else if($action=='sendappoitment'){

$name = $_POST['name'];
$surname = $_POST['surname'];
$adress = $_POST['adress'];
$phone = $_POST['phone'];
$contact_person = $_POST['contact_person'];
$phone_type = $_POST['phone_type'];
$phone_problem = $_POST['phone_problem'];
$phone_other = $_POST['phone_other'];
$appoitment_date = $_POST['appoitment_date'];
$appoitment_hour = $_POST['appoitment_hour'];

	$query = $conn->query("INSERT INTO appoitment (name, surname, adress, phone, contact_person, phone_type, phone_problem, phone_other, appoitment_date, appoitment_hour) VALUES ('$name', '$surname', '$adress', '$phone', '$contact_person', '$phone_type', '$phone_problem', '$phone_other', '$appoitment_date', '$appoitment_hour')");
	$appoitment = array();
	$res['appoitment'] = $appoitment;

}else if($action=='deleteappoitment'){

   $id = $_POST['id'];

   	$query = $conn->query("DELETE FROM appoitment WHERE id='$id'");
   	$appoitment = array();
   	$res['appoitment'] = $appoitment;

}else if($action=='sendtechnician'){

   $id = $_POST['id'];
   $technician = $_POST['technician'];

   	$query = $conn->query("UPDATE appoitment SET technician = '$technician' WHERE id='$id'");
   	$appoitment = array();
   	$res['appoitment'] = $appoitment;

}



$conn->close();
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");
echo json_encode($res);
die();
?>
