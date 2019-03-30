<?php 
require 'createanewuser.php';
 ?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="defaultcss.css">
  	<title>Well-Wisher_create_a_new_user</title>
</head>
<body>
	<button class="button1 button2" onclick="FuncHome()">Home</button>
  <button class="button1 button2" onclick="FuncSignin()">Log In</button>

<h1 style="text-align: center; margin-top: 50px;">Create a new user</h1>

<form class="form-style-9" method="POST">
<ul>
	<li>
		<input type="text" name="field3" class="field-style field-full align-none" placeholder="Username" />
	</li>

	<li>
		<input type="password" name="field5" class="field-style field-full align-none" placeholder="Password" />
	</li>

	<li>
		<input type="password" name="field6" class="field-style field-full align-none" placeholder="Confirm Password" />
	</li>

	<li>
		<input type="submit" value="Submit" />
	</li>
</ul>
</form>
<footer style="text-align: center;">&copy<?php echo date('Y'); ?></footer>
</body>
</html>
