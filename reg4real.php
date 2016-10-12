<html>
<head>
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
       }
       else {
         $msg = "Userid already exists.";

    echo"$msg";
     }
    }
  }
  ?>
</head>
<body>
<h3>Sign up!</h3>
	<form onsubmit="reg4real.php" method="post">
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

</body>
</html>
