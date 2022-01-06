
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="description" content="Login to the eTronics website.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/> -->
<!-- stylesheet for bootstrap, as well as respective scripts-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  



</head>
<body>

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
<!--This div contains a form for the login, and 'posts' the data to the sessionauthen.php-->
<div class ="container p-3 text-white bg-secondary">
	<form action="sessionauthen.php" method = "post">
	  <div class="form-group align-items-center">
		<div class= "col-auto">
		<label for="phone">Phone number:</label>
		<input type="phone" name="phonenumber" class="form-control" placeholder="Enter phone number" id="phonenumber">
		</div>
	  </div>
	  <div class="form-group align-items-center">
		<div class= "col-auto">
		<label for="pwd">Password:</label>
		<input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
		</div>
	  </div>
	  <div class="form-group form-check align-items-center">
	  </div>
	  <button type="submit" value="login" class="btn btn-primary" id="check">Submit</button>
	</form>
</div>


</body>
</html>