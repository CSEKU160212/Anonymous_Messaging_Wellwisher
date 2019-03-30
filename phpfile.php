<?php
session_start();
$_SESSION['sessionid'] = 1;
 require 'conn.php';

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$userIp = getUserIP();

	$nameErr = $comErr = "";
$name = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["field3"]) && empty($_POST['field5'])) {
     echo '<script type="text/javascript">
                 funcTotal();
            </script>';
  }
  else if (empty($_POST["field3"])) {
     echo '<script type="text/javascript">
                 name();
            </script>';
  } 
   else if (empty($_POST["field5"])) {
    echo '<script type="text/javascript">
                 message();
            </script>';
  } 

      $comment = trim(nl2br($_POST['field5']));
      $name = $_POST['field3'];
 
 if (!empty($name) && !empty($comment)) {
    date_default_timezone_set("Asia/Dhaka");
    $time =  date("h:i:sa");
    $date = date("Y.m.d");
    $date_time = "Date: ".$date.", Time: $time";
  
  	$sql = "SELECT `id` FROM `user` WHERE username='$name';";
    $res = mysqli_query($connObj,$sql);
    $row=mysqli_fetch_array($res);
    if($row>0){
      $id = $row['id'];
      $sql2 = "INSERT INTO `message`(`dateTime`, `id`, `message`,`senderIp`) VALUES ('$date_time','$id','$comment','$userIp');";
      if (mysqli_query($connObj, $sql2)) {

        echo '<script type="text/javascript">
                 FuncSuccess();
            </script>';
        
      }
      else{
        echo '<script type="text/javascript">
                 FuncFailed();
            </script>';
      }
    }
    else{
      echo '<script type="text/javascript">
                 notFoundUserName();
            </script>';
    }
  }
}
 ?>
