<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Register</title>
<meta name="description" content="Registration for the eTronics website.">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src= "https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

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
        <img src="newelogo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">    
		</a> 

		
		<li class= "nav-item">
		<a class="nav-link" href="Reactregister.php">Register</a>
		</li>
		
		<li class= "nav-item">
		<a class="nav-link" href="login.php">Login</a>
		</li>
		</ul>

		
	 </nav>

<div id="root" class = "container p-3 text-white bg-secondary"></div>


<script type="text/babel" >

function ValidationMessage(props) {
//displays the error msg for each field
  if (!props.valid) {
    return(
      <div className='error-msg'>{props.message}</div>
    )
  }
  return null;
}
// each field has its validation state set to false, until set criteria are met
class App extends React.Component {
  state = {
    name: '', nameValid: false,
    email: '', emailValid: false,
    phonenumber: '', phonenumberValid: false,
    password: '', passwordValid: false,
    formValid: false,
    errorMsg: {}
  }

  validateForm = () => {
    const {nameValid, emailValid, phonenumberValid, passwordValid} = this.state;
    this.setState({
      formValid: nameValid && emailValid && phonenumberValid && passwordValid
    })
  }

  updatename = (name) => {
    this.setState({name}, this.validatename)
  }

  validatename = () => {
    const {name} = this.state;
    let nameValid = true;
    let errorMsg = {...this.state.errorMsg}

    if (!/^[A-Za-z]+([\ A-Za-z]+)*/.test(name) ) {
      nameValid = false;
      errorMsg.name = 'Name can only have letters, and particular characters'
    } else {nameValid = true}

    this.setState({nameValid, errorMsg}, this.validateForm)
  }

  updateemail = (email) => {
    this.setState({email}, this.validateemail)
  }

  validateemail = () => {
    const {email} = this.state;
    let emailValid = true;
    let errorMsg = {...this.state.errorMsg}

    // checks for format _@_._
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
      emailValid = false;
      errorMsg.email = 'Invalid email format'
    } else {emailValid = true}

    this.setState({emailValid, errorMsg}, this.validateForm)
  }

  updatephonenumber = (phonenumber) => {
    this.setState({phonenumber}, this.validatephonenumber);
  }

  validatephonenumber = () => {
    const {phonenumber} = this.state;
    let phonenumberValid = true;
    let errorMsg = {...this.state.errorMsg}


    if (!/^[0-9\b]+$/.test(phonenumber) ) {
      phonenumberValid = false;
      errorMsg.phonenumber = 'Invalid phone number format, must be only numbers';
    
    } 
    
    else if (phonenumber.length != 10) {
      phonenumberValid = false;
      errorMsg.phonenumber = 'Must be 10 digits'
    } else {phonenumberValid = true}

    this.setState({phonenumberValid, errorMsg}, this.validateForm);
  }

  updatepassword = (password) => {
    this.setState({password}, this.validatepassword)
  }

  validatepassword = () => {
    const {password, phonenumber} = this.state;
    let passwordValid = true;
    let errorMsg = {...this.state.errorMsg}

    if (password.length < 6) {
      passwordValid = false;
      errorMsg.password = 'Password must be at least 6 characters long';

    } else if (!/\d/.test(password)) {
      passwordValid = false;
      errorMsg.password = 'Password must contain a digit';

    } else if (!/[!@#$%^&*]/.test(password)) {
      passwordValid = false;
      errorMsg.password = 'Password must contain special character: !@#$%^&*';
    } else {passwordValid = true}

    this.setState({passwordValid, errorMsg}, this.validateForm);
  }
  
   handleSubmit(event) {
    
    event.preventDefault();
  }

// renders the div/form for registration
  render() {
    return (
 
 <div className='App'>
<!--The onChange attributes of the input field allow for live validation of the field.-->
          <form action='userReg.php' id='js-form' method='post'>
            <div class="form-group align-items-center">
			  <div class= "col-auto">
              <label htmlFor='name'>Name:</label>
              <ValidationMessage valid={this.state.nameValid} message={this.state.errorMsg.name} />
              <input type='text' id='name' name='name' placeholder="Enter name" class="form-control" className='form-field'
              value={this.state.name} onChange={(e) => this.updatename(e.target.value)}/>
			  </div>
            </div>
            <div class="form-group align-items-center">
			  <div class= "col-auto">
              <label htmlFor='email'>Email:</label>
              <ValidationMessage valid={this.state.emailValid} message={this.state.errorMsg.email} />
              <input type='email' id='email' name='email' placeholder="Enter email address" class="form-control" className='form-field'
              value={this.state.email} onChange={(e) => this.updateemail(e.target.value)}/>
			  </div>
            </div>
            <div class="form-group align-items-center">
			  <div class= "col-auto">
              <label htmlFor='phonenumber'>Phone number:</label>
              <ValidationMessage valid={this.state.phonenumberValid} message={this.state.errorMsg.phonenumber} />
              <input type='phone' id='phonenumber' name='phonenumber' placeholder="Enter phone number" class="form-control" className='form-field'
              value={this.state.phonenumber} onChange={(e) => this.updatephonenumber(e.target.value)}/>
			  </div>
            </div>
            <div class="form-group align-items-center">
			  <div class= "col-auto">
              <label htmlFor='password'>Password:</label>
              <ValidationMessage valid={this.state.passwordValid} message={this.state.errorMsg.password} />
              <input type='password' id='password' name='password' placeholder="Enter password" class="form-control" className='form-field' 
              value={this.state.password} onChange={(e) => this.updatepassword(e.target.value)}/>
			  </div>
            </div>
            <div className='form-controls'>
              <button className='button' type='submit' class="btn btn-primary" name='save' id='save' disabled={!this.state.formValid}>Sign Up</button>
            </div>
          </form>

      </div> 
    );
  }
}

ReactDOM.render(
  <App />,
  document.getElementById('root')
);

      

</script>


</body>
</html>