<script type="text/javascript">
	function FuncHome() {
		window.location.href='login.php';
	}
	function FuncSignup() {
		window.location.href='create_a_new_user.php';
	}
	function funcTotal() {
		alert("Username or password can't be empty.");
	}
	function funcPassword(){
  		alert("Password is required.");
	}
	function username() {
    	alert("Username is required!");
  	}
  	function NoUserFunc() {
  	 	alert("Please enter right username and password.");
  	 }
	function redirect (){
   	document.location = 'messages.php'; 
	 }
</script>

<?php session_start();
if ($_SESSION['sessionid']!=1) {
	header("Location: index.php");
}

require 'conn.php';
 require 'script_signup.js';
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["field3"]) && empty($_POST['field5'])) {
     echo '<script type="text/javascript">
                 funcTotal();
            </script>';
  }
  else if (empty($_POST["field3"])) {
   		echo '<script type="text/javascript">
                 username();
            </script>';
  }
   else if (empty($_POST["field5"])) {
   		echo '<script type="text/javascript">
                 funcPassword();
            </script>';
  }

if (isset($_POST['field3'])) {
	$username = $_POST['field3'];
}
if (isset($_POST['field5'])) {
	$password = $_POST['field5'];
}

 if (!empty($username) && !empty($password)) {
 	$password = md5($password);
  	$sql = "SELECT `id` FROM `user` WHERE username='$username' and password='$password';";
    $res = mysqli_query($connObj, $sql);
    $row=mysqli_fetch_array($res);
    if($row>0){
    	$_SESSION['user_id'] = $row['id'];
	echo '<script type="text/javascript">
                 redirect();
            </script>';
    	
    }
    else
    {
    	echo '<script type="text/javascript">
                 NoUserFunc();
            </script>';
    }
}
}

?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="defaultcss.css">
    <title>Well-Wisher_login_to_see_message</title>
</head>
<body>

<button class="button1 button2" onclick="FuncHome()">Home</button>
  <button class="button1 button2" onclick="FuncSignup()">Register</button>

<h1 style="text-align: center;">Log in</h1>
<form class="form-style-9" method="POST">
<ul>
<li>
<input type="text" name="field3" class="field-style field-full align-none" placeholder="Username" />
</li>

<li>
<input type="password" name="field5" class="field-style field-full align-none" placeholder="Password" />
</li>
<li>
<input type="submit" value="Log in" />
</li>
</ul>
</form>

<footer style="text-align: center;">&copy<?php echo date('Y'); ?></footer>
</body>
</html>
