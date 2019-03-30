<?php
$page = $_SERVER['PHP_SELF'];
$sec = "20";
?>
<?php
	session_start();
	require 'message_script.js';
	require 'conn.php';
	if (!isset($_SESSION['user_id'])) {
		echo '<script type="text/javascript">
                 redirect();
            </script>';
	}
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  	<link rel="stylesheet" type="text/css" href="defaultcss.css">
  	<title>Well-Wisher_all_messages</title>
<style>
.card {
    box-shadow: 0px 4px 5px 5px rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 75%;
    margin: auto;
}

.card:hover {
    box-shadow: 6px 5px 10px 8px rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}
.container p, h4, b{
    text-align: center;
}
</style>
</head>
<body>
	<button class="button1 button2" onclick="FuncHome()">Home</button>
  <?php
  $userid = $_SESSION['user_id'];
    $sqluser = "SELECT `username` from `user` where `id` = '$userid';";
    $result = mysqli_query($connObj, $sqluser);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_array($result);
      echo '<button class="button1 button2" onclick="FuncLogout()">'.$row['username'].' (Log out)</button>';
    }
?>
<h1 style="text-align: center; margin-top: 15px;">All Messages</h1>

	<?php
		$userid = $_SESSION['user_id'];
		$sql = "SELECT `dateTime`, `message` FROM `message` where id = '$userid' order by(dateTime) desc;";
		$res = mysqli_query($connObj, $sql);
		if (mysqli_num_rows($res)>0) {
			while ($row = mysqli_fetch_array($res)) {
				$date = $row['dateTime'];
				$msg = $row['message'];
		 		echo '<div class="card">';
		 		echo '<div class="container">';
    			echo "<h4><b>".$date."</b></h4>";
    			echo "<p>".$msg."</p>";
  				echo '</div></div><br><br>';
		 }
		}
		else {
			echo "<h3>No message found.</h3>";
		}

	?>
	<footer style="text-align: center;">&copy<?php echo date('Y'); ?></footer>
</body>
</html>
