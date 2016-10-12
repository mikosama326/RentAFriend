<html>
	<head>
		<title>Rent A Friend -  the lonliness buster!</title>
		<style>
		body {background-color: #1299FF;}
		h1 {border: 3px dashed #000000;display:inline;}
		</style>
		<?php #MySQLi
$servername = "localhost";
$username = "root";
$password = "onegai123";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "SELECT * from Test;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Thing1: " . $row["thing1"]. " - Thing2: " . $row["thing2"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
$version = "2.4";
?>
	</head>
	<body>
	<h1>Rent A Friend</h1>
	<h2>Coming soon to a browser near you!</h2>

	<?php
	echo("Hello. The fact that you can see this means that the PHP parser is working. Yay! :)");
	?>

	</body>
</html>

