<html>
<!--TODO: make it print something when the content is inserted-->
<head>

<script type="text/javascript" src="verification.js"></script>

  <?php
  include('config.php');
  $msg = "";
  if(isset($_POST["userid"]))
  {
    $userid = $_POST['userid'];
    $conn=mysqli_connect($server,$username,$password,$dbname);

    $q="select * from $accounts where userid='$userid'; ";
    if($result=mysqli_query($conn, $q))
    {
      if (mysqli_num_rows($result)==0) {
          $pass = $_POST['password'];
          $q = "insert into $accounts values('$userid','$pass');";
          mysqli_query($conn, $q);
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $age = $_POST['age'];
          $city = $_POST['city'];
          $area = $_POST['area'];
          $q = "insert into $userdetails values('$userid','$fname','$lname','$age','$city','$area');";
          mysqli_query($conn, $q);
          $msg = "You've successfully registered!";
       }
       else {
         $msg = "Userid already exists.";
       }
    }
  }
  ?>
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
          <center>
    <h1> Become a friend </h1>

    <h3>Sign up!</h3>

<?php
echo $msg;
?>

    	<form action="reg4real.php" onsubmit="return verify();" method="post" name="signup">
    <table>
        <tr>
          <td>Userid:</td>
            <td><input type="text" name="userid" required/> </td>
          </tr>
        <tr>
          <td>Password: </td>
          <td><input type="password" name="password" required /> </td>
        </tr>
    <tr>
        <td>First Name:</td>
        <td> <input type="text" name="fname" id="fname" required/> </td>
      </tr>

    <tr>
        <td>Last Name</td>
        <td><input type="text" name="lname" /> </td>
      </tr>
    <tr>
        <td>Age: </td>
        <td>  <input type="text" name="age" id="age"/> </td>
    </tr>

    <tr>
        <td>Email id:</td>
        <td> <input type="text" name="emailid" id="emailid" required/> </td>
      </tr>

      <tr>
          <td>Phone:</td>
          <td> <input type="text" name="phone" id="phone" /> </td>
        </tr>

    <tr>
        <td>City: </td>
        <td><input type="text" name="city" required /> </td>
    </tr>

    <tr>
        <td>Area: </td>
        <td><input type="text" name="area" /> </td>
    </tr>
    <tr>
        <td><input type="submit" value="Submit!" /> </td>
    </tr>
    </table>
    </form>


          </center>

<a href="index.php"> << Back </a>

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
