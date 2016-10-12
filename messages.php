<html>

<head>


</head>

<body>
<p style="font-size:50px; ">----------------- Rent-a-friend!!!--------------------------</p>
<p style="font-size:20px; text-indent:80%"> Home | Sign out | Messages |</p>

<br/><br/><br/>

<p style="font-size:30px">Messages: 


<?php

$conn=mysqli_connect('localhost', 'root', 'onegai123', 'rentafriend');


$q="select * from Messages where receiver='kkp'; ";
printf("<br/><br/><br/>");
printf("<table border=3 width=900>
<tr>
<th>Sender</th>
<th>Message</th>
</tr>");



if($result=mysqli_query($conn, $q))
{
	//fetch one row
	
	while($row=mysqli_fetch_row($result))
	{
		printf("<tr><td>%s</td>                            ", $row[0]);
		printf("<td>%s</td></tr>", $row[2]);
		
		
	}
	printf("</table>");
	//mysqli_free_result($result);
}

//mysqli_close($conn);


?>

</p>



</body>




</html>
