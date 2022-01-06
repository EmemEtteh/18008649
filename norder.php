<?php
session_start();

if(isset($_POST['id'])) { 
include 'connect.php';
//variables for insertion
$number = $_SESSION['phonenumber'];
$prodID = $_POST['id'];
$prodname = $_POST['name'];
$prodprice = $_POST['price'];


 

//$Price = array();	
//$NameOfProduct = array();
		
	$query = "SELECT Name, Email FROM customers WHERE PhoneNumber = '".$number."'";
	$result = $con->query($query);
/*$stmt = $con->prepare("SELECT Email, Name from customers WHERE PhoneNumber = '".$number."'");
//$stmt->bind_param('ss', $number);
$stmt->execute();
$stmt->bind_result($Email, $Name);
$stmt->store_result();
echo $Email;
echo $Name;
$stmt->close(); */
//$stmtb = $con->prepare("SELECT Name from customers WHERE PhoneNumber = '".$number."'");
//$stmtb->bind_param('s', $number);
//$stmtb-> execute();
//$stmtb->bind_result($Name);


/*$stmt2 = $con->prepare("SELECT Price, NameOfProduct from mobile_phones WHERE ProductID = '".$prodID."'");
//$stmt2->bind_param('s', $prodID);
$stmt2->execute();
$stmt2->bind_result($Price, $NameOfProduct);
$stmt2->close();
//$stmt2b = $con->prepare("SELECT NameOfProduct from mobile_phones WHERE ProductID = '".$prodID."'");
//$stmt2b->bind_param('s', $prodID);
//$stmt2b-> execute();
//$stmt2b->bind_result($NameOfProduct); */

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc() ) {
//combines the select data from above and the form values from product table and inserts into database
$stmt3 = $con->prepare("INSERT INTO orders 
(PhoneNumber, CustomerName, EmailID, ProductID, OrderedProduct, ProductPrice)
VALUES (?,?,?,?,?,?)");
$stmt3->bind_param("issisd", $number, $row['Name'], $row['Email'], $prodID, $prodname, $prodprice);
$stmt3->execute();
$stmt3->close();
//$stmt3->bind_result($Name, $Email, $number, $NameOfProduct, $Price);

//echo "Product Ordered";
header("Location: homepageloggedin.php");

exit(); 
	} 
	
} else {echo "Could not order product";} 
    
}     
    

?>
