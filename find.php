<html>

<head>
  <link rel="stylesheet" href="index.css" />
  <?php
  include('config.php');
  session_start();
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
        <a href="sendmessage.php">Send a Message</a> | <a href="find.php">Find friends</a> | <a href="addint.php"> Add an Interest</a>

        </div>

<h3>Suggested friends:</h3>
<table class="messages">
  <tr>
    <th>Username</th>
    <th>Common interests</th>
  </tr>
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
    //TODO: also print which interests are in common
    printf("<tr><td>");
    printf("<a href='profile.php?id=%s'>%s</a>",$row[0],$row[0]);
    printf("</td><td>");
    $intq = "select i1.interest from Interests i1,Interests i2 where i1.userid='$userid' AND i2.userid='$row[0]' AND i1.interest=i2.interest;";
    if($yay=mysqli_query($conn, $intq))
    {
      while($wokay=mysqli_fetch_row($yay))
        printf("%s  ",$wokay[0]);
    }
    printf("</td></tr>");
	}
}
?>
</table>
<h3>Your Interests:</h3>
<?php
$q="select * from $interests where userid='$userid'; ";
if($result=mysqli_query($conn, $q))
{
	while($row=mysqli_fetch_row($result))
	{
		printf("\t%s <br/>", $row[1]);
	}
}
?>

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
