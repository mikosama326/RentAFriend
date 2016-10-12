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

		<div class="nav">
<p style="font-size:20px;text-align:center;"> <a href="homepage.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |
<a href="sendmessage.php">Send a Message!</a> <a href="find.php">Find friends!</a></p>
</div>
<p style="font-size:30px">Messages:


<?php
include('config.php');
session_start();
$userid = $_SESSION['userid'];
$conn=mysqli_connect($server, $username,$password, $dbname);


$q="select * from $messages where Receiver='$userid'; ";
printf("<br/><br/><br/>");
printf("<table border=3 width=900>
<tr>
<th>Sender</th>
<th>Message</th>
</tr>");



if($result=mysqli_query($conn, $q))
{
	//fetch one row
	while($row=mysqli_fetch_row($result))
	{
		printf("<tr><td>%s</td>                            ", $row[0]);
		printf("<td>%s</td></tr>", $row[2]);
	}
	printf("</table>");
	//mysqli_free_result($result);
}

//mysqli_close($conn);


?>

</p>



</body>




</html>
