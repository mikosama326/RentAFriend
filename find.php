
<?php
session_start();
include(config.php);
?>

<html>

<head>
<link rel="stylesheet" href="index.css" />

</head>

<body>

<center>

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

<?php
// Set session variables
include('config.php');
session_start();
echo "Session variables are set.";
?>

<div class="nav">
<p style="font-size:20px;text-align:center;"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |
<a href="find.php">Find friends!</a></p>
</div>

<p style="font-size:30px">Suggested friends:<br />


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
		printf("<a href='profile.php?id=%s'>%s</a> <br />",$row[0],$row[0]);

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
</center>
</body>




</html>
