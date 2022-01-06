<?php


//This page is the homepage but with extra functionality, i.e. being able to order products
include 'connect.php';


session_start();
if (!isset($_SESSION['id'])) {
	header("Location: login.php");
	exit;
}
?>
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


include 'getproduct2.php';

$query = "SELECT * FROM product_type"; 
$result = $con->query($query);
?>
<body>

	<nav class= "navbar navbar-expand-sm navbar-dark bg-dark justify-content-center"> <!-- Makes Navbar Dark -->
    
		<ul class= "navbar-nav">
		
		<li class = "nav-item">
		<a class = "navbar-brand" href="homepageloggedin.php"><h1>eTronics</h1></a>
		</li>
		
		<li class= "nav-item">
		<a class= "navbar-brand" href="homepageloggedin.php">
        <img src="blueSphere.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">    
		</a> 
		</li>
		
		<li class= "nav-item">
		<a class="nav-link" href="Reactregister.php">Register</a>
		</li>
		
		<li class= "nav-item">
		<a class="nav-link" href="logout.php">Logout</a>
		</li>
		
		<li class= "nav-item">
		<span class = "navbar-text">
		Welcome to the site <?php echo ($_SESSION['phonenumber']) ?> 
		</span>
		</li>
		
		</ul>


		
	 </nav>
	 

	<div class ="container p-3 text-white bg-secondary justify-content-center">
		<form>
			<select id="productTypes" name="productTypes" class= "custom-select-lg mb-3">
				
				  <div class= "dropdown-menu d-flex justify-content-center">
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
				  <div class= "dropdown-menu d-flex justify-content-center">
					<option value="">Select Company/Brand:</option>
				  </div>
			</select>
		</form>
	</div>
	
	<div class = "container p-3 ">
		<div class="table-responsive">
			<div id="txtHint"></div>
		</div>
	</div>
	
	
</body>
</html>
