<html>
<head>
  <link rel="stylesheet" href="index.css" />
  <?php
  session_destroy();
  header('Refresh: 5;url=index.php');
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

          You have been successfully logged out. Redirecting you back to the main page in 5 seconds...

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
