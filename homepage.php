
<?php
session_start();
#error_reporting(E_ALL);
#display_errors("stdout");
include(config.php);
?>

<html>

<head>
<link rel="stylesheet" href="index.css" />

</head>

<body>
<center>
<?php
// Set session variables
include('config.php');
session_start();
echo "Session variables are set.";
?>

<div class="head">
	<table>
		<tr>
			<td>
	<img src="logo.png" width="192px" height="144px"/>
</td><td>
	<h1>Rent A Friend</h1>
<h2>Coming soon to a browser near you!</h2>
</td></tr></table>
</div>

<div class="nav">
<p style="font-size:20px;text-align:center;"> <a href="homepage.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |
<a href="find.php">Find friends!</a> <a href="addint.php"> Add an Interest</a></p>
<br/><br/><br/>
</div>
<div class="main">
<p style="font-size:30px">User:


<?php

$conn=mysqli_connect($server, $username,$password, $dbname);

$userid=$_SESSION["userid"];
$q="select * from $userdetails where userid='$userid'; ";
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
</div>
</center>
</body>




</html>
