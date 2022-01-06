<?php
session_start();
include 'connect.php';

$q = intval($_SESSION['phonenumber']);
  
    
			
//	$query = "SELECT * FROM customers WHERE PhoneNumber = '".$q."'";
    
     
    

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/> -->


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
<link rel="stylesheet" href="background.css">
</style>
</head>

<body>

	<nav class= "navbar navbar-expand-sm navbar-dark bg-dark justify-content-center"> <!-- Makes Navbar Dark -->
    
		<ul class= "navbar-nav">
		
		<li class = "nav-item">
		<a class = "navbar-brand" href="homepageloggedin.php"><h1>eTronics</h1></a>
		</li>
		
		<a class= "navbar-brand" href="homepageloggedin.php">
        <img src="blueSphere.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">    
		</a> 


		</ul>

		
	 </nav>

<div class ="container p-3 text-white bg-secondary justify-content-center">
<h1>Order Page for <?php echo $_SESSION['phonenumber']; ?> </h1>
<?php

$query = "INSERT INTO orders 
(CustomerName, EmailID, PhoneNumber, OrderedProduct, ProductID, ProductPrice)
			SELECT Name, Email, PhoneNumber FROM customers 
			WHERE PhoneNumber =".$_SESSION['phonenumber']"
			UNION ALL
			SELECT NameOfProduct, ProductID, Price FROM mobile_phones 
			WHERE ProductID = ".$_POST['id'];
	
	$result = mysqli_query($con,$query); 
	

	if($result){ 
	
		echo "Product has been ordered!";
		
		
		} else {
			echo"Something went wrong please try again";
		}
?>
</div>
</body>
