<?php
$conn = new mysqli("localhost", "root", "", "smartphone");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$action="readdates";

if(isset($_GET['action'])){
	$action=$_GET['action'];
}

if($action=='readdates'){
             $query = $conn->query("select * from disdates");
             $disdates = array();

            while($row = $query->fetch_array()){
               array_push($disdates, $row);
            }
            $res['datess'] = $disdates;
}else if($action=='createdisable'){
      $datess = $_POST['datess'];


      $query = $conn->query("INSERT INTO `disdates` (`datess`) VALUES ('$datess')");
      $disdates = array();
      $res['disdates'] = $disdates;
}else if($action=='deletedisable'){
    
    $id = $_POST['id'];
    $query = $conn->query("DELETE FROM disdates WHERE id='$id'");
    $datess = array();
    $res['datess'] = $datess;
}



$conn->close();
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");
echo json_encode($res);
die();
?>
