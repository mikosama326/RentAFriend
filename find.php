
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
echo "Session variables are set.";
?>


<p style="font-size:50px; ">----------------- Rent-a-friend!!!--------------------------</p>
<p style="font-size:20px; text-indent:80%"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |</p>

<br/><br/><br/>

<p style="font-size:30px">Suggested friends:


<?php

$conn=mysqli_connect($server, $username,$password, $dbname);

$userid=$_SESSION["userid"];
//$q="select * from $interests where userid='$userid'; ";
$q = "select distinct i1.userid from Interests i1,Interests i2 where i1.interest=i2.interest AND i1.userid<>i2.userid AND i2.userid='$userid';
";
if($result=mysqli_query($conn, $q))
{
	//fetch one row
	while($row=mysqli_fetch_row($result))
	{
		printf("%s <br />",$row[0]);

	}
	//mysqli_free_result($result);
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

</body>




</html>
