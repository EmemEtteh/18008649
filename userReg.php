
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronic_company";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//variables for query usage
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$password = $_POST['password'];


	$query = "INSERT INTO customers (Name, Email, PhoneNumber, Password)
	VALUES (?,?,?,?)"; 
	
	
	if($stmt = $con->prepare($query)){
		$stmt->bind_param("ssss", $name, $email, $phonenumber, $password);
		$stmt->execute();
		$stmt->close();
		
		header(" login.php");
		exit;
	}
		
?>
