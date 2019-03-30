<script language="javascript" type="text/javascript">

function funcPassword(){
  alert("Password is required.");
}

function username() {
    alert("Username is required!");
  }

function funcTotal()
{
  alert("Username or Password can't be empty.");
}

function userAlreadyExist() {
	alert("This username is already taken. Choose another one please.");
}

function confError(){
	alert("Please enter same password.");
}

function namelen() {
	alert("Username must be less than 100 character.");
}

function FuncSignSuccess() {
	alert("Successfully created a user. Now you can Log in.");
	window.location.href='login.php';
}
function FuncHome() {
	window.location.href='index.php';
}
function FuncSignin() {
	window.location.href='login.php';
}
 </script>
