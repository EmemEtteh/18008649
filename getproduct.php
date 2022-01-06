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
<?php

include 'connect.php';



if(!empty($_POST["PTID"])){ 
    // Gets data based on the product type ID
    $query = "SELECT DISTINCT Company FROM mobile_phones WHERE PTID = ".$_POST['PTID']; 
    $result = $con->query($query); 
     
    if($result->num_rows > 0){ 

        while($row = $result->fetch_array()){  
            echo '<option value="'.$row['Company'].'">'.$row['Company'].'</option>'; 

        } 
    }else{ 
        echo '<option value="">Products not available</option>'; 
    } 
}

else if(!empty($_POST["Company"])){ 

$q = strval($_POST['Company']);
    // Gets data based on Company 
    $query2 = "SELECT * FROM mobile_phones WHERE Company = '".$q."' ORDER BY Price"; 
    $result2 = mysqli_query($con,$query2); 
     
    // Generate HTML of state options list 
    if($result2->num_rows > 0){ 

        while($row = $result2->fetch_assoc()){  
			echo "<table class='table table-striped table-hover text-center text-justify'>";
			echo "<tr>";
			echo "<td>" . '<img src="data:image/png ; base64 ,' . base64_encode($row['Image']) . '" />' . "</td>";
			echo "<td><h1 class='display-3'>" . $row['NameOfProduct'] . "</h1></td>";
			echo "<td><h1 class='display-4'>" . $row['Price'] . "</h1></td>";
			echo "<td>" . '<button type="button" disabled >Buy</button>' . "</td>";
			echo "<td>" . "</tr>" . "</td>";
			echo "</tr>";
			echo "</table>";

        } 
    }else{ 
        echo "Company not available"; 
    }  
} 


	  

?>
</head>

</html>