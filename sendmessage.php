<html>

<head>


</head>

<body>
<p style="font-size:50px; ">----------------- Rent-a-friend!!!--------------------------</p>
<p style="font-size:20px; text-indent:60%"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |</p>
<a href="find.php">Find friends!</a>
<br/><br/><br/>
<p style="font-size:30px">Send a message:


<?php
include('config.php');
session_start();
$userid = $_SESSION['userid'];
$conn=mysqli_connect($server, $username,$password, $dbname);

if(isset($_POST['to']))
{
  #check if you're sending to someone who exists
  $towhom = $_POST['to'];
  $q = "select * from $accounts where userid='$towhom';";

  if($result=mysqli_query($conn, $q))
  {
  	$row=mysqli_fetch_row($result);
    if($row[0] != $_POST['to'])
    {
      echo "You are idiot.";
    }
  }

  #check message length
  $msg = $_POST['msg'];
  if(strlen($msg) > 140)
    echo "You are blabbermouth...K.I.S.S.";

  #now it works yes
  $q = "insert into $messages values('$userid','$towhom','$msg');";
  $result=mysqli_query($conn, $q);
  printf("Sent msg to $towhom. It contained this: $msg.<br />");
}

?>

</p>

<form onsubmit="sendmessage.php" method="POST" id="sendmsg">
  <input type="submit" value="Send away!" /> <br />
  To: <?php
  $to = $_GET['to'];
  echo "<input type='text' name='to' value='$to'/>" ?> <br />
</form>
Message:<br />
<textarea form="sendmsg" name="msg" rows="10" cols="80">Enter message here...</textarea>


</body>




</html>
