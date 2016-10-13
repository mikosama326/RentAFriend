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

					<h3>Messages:</h3>

					<?php
					include('config.php');
					session_start();
					$userid = $_SESSION['userid'];
					$conn=mysqli_connect($server, $username,$password, $dbname);

					$q="select * from $messages where Receiver='$userid'; ";
					?>

					<table class="messages">
					<tr>
					<th>Sender</th>
					<th>Message</th>
					</tr>

					<?php
					if($result=mysqli_query($conn, $q))
					{
						//fetch one row
						while($row=mysqli_fetch_row($result))
						{
							printf("<tr><td>%s</td>                            ", $row[0]);
							printf("<td>%s</td></tr>", $row[2]);
						}
					}
					?>
					</table>

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
