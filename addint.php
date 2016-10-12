
<?php
session_start();
#error_reporting(E_ALL);
#display_errors("stdout");
include(config.php);
?>

<html>

<head>


</head>

<body>

<?php
// Set session variables
include('config.php');
session_start();
//echo "Session variables are set.";
?>


<p style="font-size:50px; ">----------------- Rent-a-friend!!!--------------------------</p>
<p style="font-size:20px; text-indent:60%"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |</p>
<a href="find.php">Find friends!</a>
<br/><br/><br/>

<p style="font-size:30px">User:


<?php

$conn=mysqli_connect($server, $username,$password, $dbname);

$userid=$_SESSION["userid"];
$newint=$_POST['newint'];
$q="select * from $interests where userid='$userid' AND interest='$newint'; ";
$result=mysqli_query($conn, $q);
if(mysqli_num_rows($result)==0)
{
$q="insert into $interests values('$userid','$newint'); ";
$result=mysqli_query($conn, $q);

}
else {

  echo "IDIOT!";
}

//mysqli_close($conn);


?>

</p>

<p style="font-size:30px">
<?php
printf("Interests:<br/>");
$q="select * from $interests where userid='$userid'; ";
if($result=mysqli_query($conn, $q))
{
	while($row=mysqli_fetch_row($result))
	{
		printf("\t%s <br/>", $row[1]);
	}
}
?>
</p>
<form onsubmit="addint.php" method="POST">
  <input type="text" name="newint"/>
  <input type="submit" value="Add Interest!"/>
</form>

</body>




</html>
