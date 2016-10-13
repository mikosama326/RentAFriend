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

			<table class="maintable">
				<tr>
					<td class="head"></td>
				</tr>
				<tr>
					<td class="main">

			<h1> Sign in </h1>

<center>
<form onsubmit="" method="post">
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

</center>
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
