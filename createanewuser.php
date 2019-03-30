<?php
session_start();
if ($_SESSION['sessionid']!=1) {
	header("Location: index.php");
}

 require 'conn.php';
 require 'script_signup.js';
$username = $password = $confPass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["field3"]) && empty($_POST['field5']) && empty($_POST['field6'])) {
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
  } else if (empty($_POST["field6"])) {
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
if (isset($_POST['field6'])) {
	$confPass = $_POST['field6'];
}

 if (!empty($username) && !empty($password) && !empty($confPass)) {
    $username = trim($username);
  	$sql = "SELECT `id` FROM `user` WHERE username='$username';";
    $res = mysqli_query($connObj,$sql);
    $row=mysqli_fetch_array($res);
    if($row>0){
    	echo '<script type="text/javascript">
                 userAlreadyExist();
            </script>';
    }
    else{
      if ($password!=$confPass) {
      	echo '<script type="text/javascript">
                 confError();
            </script>';
      }
      if (strlen($username)>99) {
      	echo '<script type="text/javascript">
                 namelen();
            </script>';
      }
      else{
	      $password = md5($password);
	      $sql2 = "INSERT INTO `user`(`username`,`password`) VALUES ('$username','$password');";
	      if (mysqli_query($connObj, $sql2)) {
	        echo '<script type="text/javascript">
	                 FuncSignSuccess();
	            </script>';

      }
  }
    }
}
}
?>
