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

  <?php
  $conn=mysqli_connect($server, $username,$password, $dbname);
  $profileid = $_GET['id'];
  printf("<h2>%s</h2>",$profileid);
  $q = "select * from $userdetails where userid='$profileid';";
  $userid=$_SESSION["userid"];
  if($result=mysqli_query($conn, $q))
  {
  	//fetch one row
  	while($row=mysqli_fetch_row($result))
  	{
  		printf("Name: %s %s <br/>", $row[1], $row[2]);
  		printf("Age: %s<br/>", $row[3]);
  		printf("City: %s", $row[4]);
  	}
  }
  ?>

  </p>

<h3>Interests:</h3>
  <?php
  $q="select * from $interests where userid='$profileid'; ";
  if($result=mysqli_query($conn, $q))
  {
  	while($row=mysqli_fetch_row($result))
  	{
  		printf("\t%s <br/>", $row[1]);
  	}
  }
  echo "<br /><a href='sendmessage.php?to=$profileid'>Message me!</a>";
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
</body>
</html>
