<?php

include 'connect.php';

$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];
//sets login to false, will be set to true once certain criteria are met
$loggedin = false;

$query = "SELECT PhoneNumber, Password  FROM customers WHERE PhoneNumber = ? AND Password = ? LIMIT 1";
if($stmt = $con->prepare($query)){
	$stmt->bind_param("ss", $phonenumber, $password);
	$stmt->execute();
	$stmt->bind_result($phonenumber, $password);
	while($stmt->fetch()){
//takes data from the customer table, so it can check the login		
			$loggedin = true;
			// SUCCESS
			session_start();
			session_regenerate_id(); 
			$_SESSION['id'] = session_id();
			$_SESSION['phonenumber'] = $phonenumber;
			
		
	}
	$stmt->close();
}else{
	echo $con->error;
	exit;
}
//SUCCESS
if($loggedin){
	$location = 'homepageloggedin.php';
}else{
	// FAILURE
	$location = 'badlogauth.php';
}

header("Location: $location");
exit;
?>
