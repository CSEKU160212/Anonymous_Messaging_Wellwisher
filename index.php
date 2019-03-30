<?php
 require 'script.js';
require 'phpfile.php';

?>

<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="defaultcss.css">
  <title>Well-Wisher</title>

</head>
<body>
 <?php if(isset($_SESSION['user_id'])) {
  echo '<button class="button1 button2" onclick="messagesFunc()">Messages</button>';

    $userid = $_SESSION['user_id'];
    $sqluser = "SELECT `username` from `user` where `id` = '$userid';";
    $result = mysqli_query($connObj, $sqluser);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_array($result);
      echo '<button class="button1 button2" onclick="FuncLogout()">'.$row['username'].' (Log out)</button>';
    }
}
 else
 {
  echo '<button class="button1 button2" onclick="FuncSignin()">Log in</button>
  <button class="button1 button2" onclick="FuncSignup()">Register</button>';
 }
 ?>
   <h1 class="headings">All messages are anonymous. Even the admin will never know.</h1>

<form class="form-style-9" method="POST">
<ul>
<li>
<input type="text" name="field3" class="field-style field-full align-none" placeholder="Username" />
</li>

<li>
<textarea name="field5" class="field-style" placeholder="Message"></textarea>
</li>
<li>
<input type="submit" value="Send Message" />
</li>
</ul>
</form>
<!--
<h7 style="text-align: center;">Total Registered User:
<?php
/* $totalSql = 'SELECT count(`id`) as c FROM `user` where 1;';
$resultTotal = mysqli_query($connObj, $totalSql);
    if(mysqli_num_rows($resultTotal)>0){
      $row = mysqli_fetch_array($resultTotal);
      echo $row['c'];
    }
*/ ?>
</h7>
-->
<footer style="text-align: center;">&copy<?php echo date('Y'); ?></footer>
</body>
</html>
