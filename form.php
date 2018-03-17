<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Calligraffitti|Coming+Soon" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="fav.ico"/>

	<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div id="body3">
	<div class="page">
		<div id="searchBar">
			<form method="get" id="searchForm">
				<button type="button" id="about" onclick="location.href='index.php';"><i class="fas fa-times-circle"></i></button>
			</form>
		</div>	
			
	</div>


	<div id="signinup">

	<div id='signChoice'>
				<h1>Choose an option:</h1>
				<hr>
				<h4><a onclick='showSignUp();' style='cursor: pointer;text-decoration: underline;'>Sign Up</a> 
					or 
					<a onclick='showSignIn();' style='cursor: pointer;text-decoration: underline;'>Sign In</a></h4>
			</div>

			<div id='signupdiv' style='display: none;'>	
				<h1><a onclick='showSignOptions();'><i class='fas fa-arrow-left'></i></a> &nbsp;&nbsp; Sign up</h1>
				<hr>
				<form method='post' id='signup' autocomplete='off'>
					
					<table>
						<tr>
							<td>User name: </td>
							<td><input id='user' type='text' name='user' placeholder='User Name' autocomplete='off' required></td>
						</tr>
						
						<tr>
							<td>Password: </td>
							<td><input id='pass' type='password' name='pass' placeholder='Password' required
								pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' autocomplete='new-password' 
								title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' ></td>
							</tr>
						
						<tr>
							<td>E mail: </td>
							<td><input id='email' type='email' name='email' placeholder='E-Mail' autocomplete='off' required></td>
						</tr>
						
						<tr>
							<td>Age: </td>
							<td><input id='age' type='number' name='age' placeholder='Age' autocomplete='off' required></td>
						</tr>
						
						<tr>
							<td>Sex: </td>
							<td><select name='sex' required>
									<option value='Female'>Female</option>
									<option value='Male'>Male</option>
								</select></td>
						</tr>
						
						<tr>
							<td>Profile Image: </td>
							<td><input id='img' type='link' name='img' placeholder='Profile Image' autocomplete='off' required></td>
						</tr>
						
						<tr>
							<td><button id='submitSignUp'>Sign Up</button></td>
							<td></td>
						</tr>
					</table>
					

				</form><br>
			</div>


			<div id='signindiv' style='display: none;'>	
				<h1><a onclick='showSignOptions();'><i class='fas fa-arrow-left'></i></a> &nbsp;&nbsp; Sign in</h1>
				<hr>
				<form method='post' id='signin' action="signin.php">
					
					<table>
						<tr>
							<td>E mail: </td>
							<td><input id='emailIN' type='email' name='emailIN' placeholder='E-Mail' required></td>
						</tr>
						
						<tr>
							<td>Password: </td>
							<td><input id='passIN' type='password' name='passIN' placeholder='Password' required autocomplete='new-password'></td>
						</tr>
						
						<tr>
							<td><button id='submitSignIn'>Sign In</button></td>
							<td></td>
						</tr>
					</table>
					

				</form><br>
			</div>

		<span id="respond"></span>
	</div>
</div>



	<script>
var signup = document.getElementById("signup");
var submitSignUp = document.getElementById("submitSignUp");

var signupdiv = document.getElementById("signupdiv");
var signindiv = document.getElementById("signindiv");
var signChoice = document.getElementById("signChoice");

submitSignUp.onclick = function () {
  // Form is invalid!
  if (!signup.checkValidity()) {
    // Create the temporary button, click and remove it
    const tmpSubmit = document.createElement('button')
    signup.appendChild(tmpSubmit)
    tmpSubmit.click()
    signup.removeChild(tmpSubmit)

  } else {
    addUsr();
  }
  return false;
}


function addUsr(){
	var url = "signup.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("form").serialize(), // serializes the form's elements.
           success: function(data)
           {
           	if(data=="New user added successfully")
               	$( '#respond' ).html("New user added successfully"); // show response from the php script.               	
            else 
            	$( '#respond' ).html(data);

           }
         });

    return false;
}

function showSignUp(){
	signupdiv.style.display = "initial";
	signChoice.style.display = "none";
}

function showSignIn(){
	signindiv.style.display = "initial";
	signChoice.style.display = "none";
}

function showSignOptions(){
	signChoice.style.display = "initial";
	signindiv.style.display = "none";
	signupdiv.style.display = "none";
}

	</script>
</body>
</html>