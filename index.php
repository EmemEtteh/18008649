<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage of the eTronics' site, home to electronics!</title>
  <meta name="description" content="eTronics' provides a selection of various phones and laptops, from big name companies.">

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

<script>
//this readies a function, and gets data from another file. Check getproduct2.php
$(document).ready(function(){
    $('#productTypes').on('change', function(){
        var ProdTypeID = $(this).val();
        if(ProdTypeID){
            $.ajax({
                type:'POST',
                url:'getproduct2.php',
                data:'PTID='+ProdTypeID,
                success:function(html){
                    $('#products').html(html);
                //    console.log(products);
				
				 
                },
				error: function () {
				//	console.log(ProdTypeID)
				}
            }); 
        }
    });
//this one does a similar thing but is dependent on the previous function
    $('#products').on('change', function(){
        var Comp = $(this).val();
        if(Comp){
            $.ajax({
                type:'POST',
                url:'getproduct2.php',
                data:'Company='+Comp,
                success:function(html){
                
					$('#txtHint').html(html);
				//     console.log(textHint);
                },
				error: function () {
				//	console.log(Comp)
				}
            }); 
        }
    });	
	
	
});


</script>

</head>

<?php

//The server and database details need to be changed
include 'getproduct.php';

$query = "SELECT * FROM product_type"; 
$result = $con->query($query);
?>



<body>
<!--navigation bar to go to the homepage or login/register pages-->
	<nav class= "navbar navbar-expand-sm navbar-dark bg-dark justify-content-center"> <!-- Makes Navbar Dark -->
    
		<ul class= "navbar-nav">
		
		<li class = "nav-item">
		<a class = "navbar-brand" href="homepage.php"><h1>eTronics</h1></a>
		</li>
		
		<a class= "navbar-brand" href="homepage.php">
        <img src="blueSphere.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">    
		</a> 

		
		<li class= "nav-item">
		<a class="nav-link" href="Reactregister.php">Register</a>
		</li>
		
		<li class= "nav-item">
		<a class="nav-link" href="login.php">Login</a>
		</li>
		</ul>

		
	 </nav>
	
<!--contaainer for the dropdowns, with data for the above functions to use-->
	<div class ="container p-3 text-white bg-secondary justify-content-center">
		<form class = "justify-content-center">
			<select id="productTypes" name="productTypes" class= "custom-select-lg mb-3">
				
				  <div class= "container dropdown-menu d-flex justify-content-center">
					<option value="">Select Product type:</option>
					<?php
					if($result->num_rows > 0){ 
						while($row = $result->fetch_assoc()){  
						echo '<option value="'.$row['PTID'].'">'.$row['ProductType'].'</option>'; 
						}
						} else {
							echo '<option value="">Product Type  not available</option>';
						}
					?>
				  </div>
			</select>
			<select id="products" name="products" class= "custom-select-lg mb-3">
				  <div class= "container dropdown-menu d-flex justify-content-center">
					<option value="">Select Company/Brand:</option>
				  </div>
			</select>
		</form>
	</div>
<!--Table will be displayed here using php file-->	
	<div class = "container p-3 ">
		<div class="table-responsive">
			<div id="txtHint"></div>
		</div>
	</div>
	
	
	
	
</body>
</html>
