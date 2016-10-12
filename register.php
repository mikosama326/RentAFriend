<html>
	<head>
		<title>Rent A Friend -  the lonliness buster! Register now!</title>
		<style>
		body {background-color: #1299FF;}
		h1 {border: 3px dashed #000000;display:inline;}
		</style>

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

	</head>
	<body>
	<h1>Rent A Friend</h1>
	<h2>Coming soon to a browser near you!</h2>

<h3>Sign in!</h3>
<form onsubmit="verify()">
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

<h3>Sign up!</h3>
	<form onsubmit="verify()">
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
