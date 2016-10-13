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
          $userid=$_SESSION["userid"];
          if(isset($_POST['newint'])) {
          $newint=$_POST['newint'];
          $q="select * from $interests where userid='$userid' AND interest='$newint'; ";
          $result=mysqli_query($conn, $q);
          if(mysqli_num_rows($result)==0)
          {
          $q="insert into $interests values('$userid','$newint'); ";
          $result=mysqli_query($conn, $q);
          }
          else {
            echo "IDIOT!";
          }
        }
          ?>

          </p>

          <h3>Interests:</h3>
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
          <p>
          <form onsubmit="addint.php" method="POST">
            <input type="text" name="newint"/>
            <input type="submit" value="Add Interest!"/>
          </form>
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
