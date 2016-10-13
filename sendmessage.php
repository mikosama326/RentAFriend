<html>

<head>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <center>

		<table class="maintable">
			<tr>
				<td class="head"></td>
			</tr>
			<tr>
				<td class="main">

					<div class="nav">

					<a href="homepage.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |
					<a href="sendmessage.php">Send a Message</a> | <a href="find.php">Find friends</a> | <a href="addint.php"> Add an Interest</a>

					</div>

          <h3>Send a message:</h3>

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
      echo "You are idiot. This user doesn't exist.";
    }
  }

  #check message length
  $msg = $_POST['msg'];
  if(strlen($msg) > 140)
    echo "You are blabbermouth...K.I.S.S. Your message is too long.";

  #now it works yes
  $q = "insert into $messages values('$userid','$towhom','$msg');";
  $result=mysqli_query($conn, $q);
  printf("Sent msg to $towhom. It contained this: $msg.<br />");
}
?>


<form onsubmit="sendmessage.php" method="POST" id="sendmsg">
  To: <?php
  if(isset($_GET['to']))
    $to = $_GET['to'];
  else
    $to = "";
  echo "<input type='text' name='to' value='$to'/>"
?> <br />
  <p>Message:</p>
  <textarea form="sendmsg" name="msg" rows="10" cols="80">Enter message here...</textarea><br /><br />
  <input type="submit" value="Send!" /><br />
</form>


				</td>
			</tr>
			<tr>
				<td class="foot">
					This site is just a prototype. Don't take us too seriously.
				</td>
			</tr>
		</table>

	</center>

</body>




</html>
