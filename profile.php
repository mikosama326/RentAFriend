<html>
<body>

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
  <p style="font-size:20px; text-indent:10%"> <a href="home.php">Home</a> | <a href="logout.php">Sign out</a> | <a href="messages.php">Messages</a> |</p>
  <a href="find.php">Find friends!</a> <a href="addint.php"> Add an Interest</a>
  <br/><br/><br/>

  <p style="font-size:30px">User:

  <?php

  $conn=mysqli_connect($server, $username,$password, $dbname);

  $profileid = $_GET['id'];
  $q = "select * from $userdetails where userid='$profileid';";
  $userid=$_SESSION["userid"];
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
  $q="select * from $interests where userid='$profileid'; ";
  if($result=mysqli_query($conn, $q))
  {
  	while($row=mysqli_fetch_row($result))
  	{
  		printf("\t%s <br/>", $row[1]);
  	}
  }
  echo "<a href='sendmessage.php?to=$profileid'>Message me!</a>";
  ?>

  </p>

  </body>




  </html>
</body>
</html>
