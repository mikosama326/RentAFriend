
<?php
session_start();
#error_reporting(E_ALL);
#display_errors("stdout");
?>

<html>

<head>


</head>

<body>

<?php
// Set session variables
$_SESSION["userid"] = "srija";
echo "Session variables are set.";
?>


<p style="font-size:50px; ">----------------- Rent-a-friend!!!--------------------------</p>
<p style="font-size:20px; text-indent:80%"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |</p>

<br/><br/><br/>

<p style="font-size:30px">User: 


<?php

$conn=mysqli_connect('localhost', 'root', 'onegai123', 'rentafriend');

$username=$_SESSION["userid"];
$q="select * from user_details where userid='$username'; ";
if($result=mysqli_query($conn, $q))
{
	//fetch one row
	while($row=mysqli_fetch_row($result))
	{
		printf("%s %s <br/>", $row[1], $row[2]);
		printf("Age: %s<br/>", $row[3]);
		printf("City: %s", $row[4]);
		
	}
	//mysqli_free_result($result);
}

//mysqli_close($conn);


?>

</p>

<p style="font-size:30px">
<?php
printf("Interests:<br/>");
$q="select * from interests where userid='jess'; ";
if($result=mysqli_query($conn, $q))
{
	while($row=mysqli_fetch_row($result))
	{
		printf("\t%s <br/>", $row[1]);
	}
}
?>
</p>

</body>




</html>
