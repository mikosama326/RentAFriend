<html>

<head>
	<link rel="stylesheet" href="index.css" />
	<?php
	// Set session variables
	include('config.php');
	session_start();
	echo "Session variables are set.";
	?>
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
<a href="find.php">Find friends </a> | <a href="addint.php"> Add an Interest</a>

</div>

	<h1> Welcome! </h1>

<h3>User details</h3>
<p>User:
	<?php
	$conn=mysqli_connect($server, $username,$password, $dbname);
	$userid=$_SESSION["userid"];
	$q="select * from $userdetails where userid='$userid'; ";
	if($result=mysqli_query($conn, $q))
	{
		while($row=mysqli_fetch_row($result))
		{
			printf("%s %s <br/>", $row[1], $row[2]);
			printf("Age: %s<br/>", $row[3]);
			printf("City: %s", $row[4]);

		}
	}
	?>
</p>

<h3>Interests</h3>
<p>
	<?php
	$q="select * from $interests where userid='$userid'; ";
	if($result=mysqli_query($conn, $q))
	{
		while($row=mysqli_fetch_row($result))
		{
			printf("%s <br/>", $row[1]);
		}
	}
	?>
</p>
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
