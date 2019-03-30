<script language="javascript" type="text/javascript">
  function message() {
    alert("Message is required!");
    window.location.href='index2.php';
  }
  function name() {
    alert("Username is required!");
    window.location.href='index2.php';
  }
  function notFoundUserName() {
    alert("No username found!");
    window.location.href='index2.php';

  }
  function FuncFailed() {
    alert("Message Sending failed!");
    window.location.href='index2.php';
  }
  function FuncSuccess() {
    alert("Message send successfully.\nThanks for sending message.");
    window.location.href='index2.php';
  }

function FuncSignin(){
  window.location.href='login.php';
}


function FuncSignup(){
  window.location.href='create_a_new_user.php';
}

function funcTotal(){
   alert("Username or Message can't be empty.");
    window.location.href='index2.php';
}

function FuncLogout(argument) {
   window.location.href='logout.php';
}

function messagesFunc() {
   window.location.href='messages.php';
}
</script>