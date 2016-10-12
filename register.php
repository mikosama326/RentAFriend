<html>
	<head>
		<title>Rent A Friend -  the lonliness buster! Register now!</title>
		<link rel="stylesheet" href="index.css" />

    <script type="text/javascript">

    //the client-side checking goes here....
    verify=function()
    {
    //  alert("Yo!! Shwishore 5ever");
    var email=document.getElementById("emailid").value;
    //alert("This is what I got"+email);
    var email_valid=email.search(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
    if(email_valid!=0)
    {alert("Invalid Email ID!! >:\( )");}

    var phone=document.getElementById('phone').value;
    if(phone.length>0){
    var phone_valid=phone.search(/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/);
    if(phone_valid!=0)
    alert("Invalid phone!!");
  }



    }

    </script>


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
			//fetch one row
			//$msg = $msg.$result[0];
			while($row=mysqli_fetch_row($result))
			{
				if(!$row) {
					$msg = "Invalid Userid<br/>";
				}
				if($row[1]==$_POST['password'])
				{
					session_start();
					$_SESSION['userid'] = $_POST['userid'];
					header("Location: homepage.php",0);
				}
				else {
					$msg = "Invalid password.<br/>";
				}
	}
}
else {
	$msg = "Invalid Userid<br/>";
}

}

?>
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
		<div class="main">
<h3>Sign in!</h3>
<form onsubmit="register.php" method="post">
<table>
  <tr>
    <td>Userid: </td>
    <td>  <input type="text" name="userid" /> </td>
  </tr>
  <tr>
   <td>Password:</td>
  <td><input type="password" name="password" /> </td>
</tr>
<tr>
    <td><input type="submit" value="Login" /> </td>
</tr>

</table>
</form>

<?php
	echo $msg;
?>

</div>
</center>
	</body>
</html>
