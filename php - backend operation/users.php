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
	$query = $conn->query("select * from users");
	$users = array();

	while($row = $query->fetch_array()){
		array_push($users, $row);
	}

	$res['users'] = $users;

}else if($action=='username'){
	$query = $conn->query("select username from users");
	$users = array();

	while($row = $query->fetch_array()){
		array_push($users, $row);
	}

	$res['users'] = $users;

}else if($action=='password'){
	$query = $conn->query("select password from users");
	$users = array();

	while($row = $query->fetch_array()){
		array_push($users, $row);
	}

	$res['users'] = $users;

}else if($action=='adduser'){

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

	$query = $conn->query("INSERT INTO users (username, password, email, phone) VALUES ('$username', '$password', '$email', '$phone')");
	$users = array();
	$res['users'] = $users;

}else if($action=='edituser'){

 $id = $_POST['id'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];

 	$query = $conn->query("UPDATE users SET username='$username', password='$password', email='$email', phone='$phone' WHERE id='$id'");
 	$users = array();
 	$res['users'] = $users;

 }else if($action=='deleteuser'){

   $id = $_POST['id'];

   	$query = $conn->query("DELETE FROM users WHERE id='$id'");
   	$users = array();
   	$res['users'] = $users;

   }


$conn->close();
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");
echo json_encode($res);
die();
?>
