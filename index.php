<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$con=mysqli_connect("localhost","yourUsername","yourPassword","dreams");
 
	if (mysqli_connect_errno()) {
		echo "database connection failed";
	}


	if ($_POST['HandshakeKey'] == "wufooHandshakeKey") {
		$name = mysqli_real_escape_string($con, $_POST['Field1']);
		$miles = mysqli_real_escape_string($con, $_POST['Field2']);
		$EntryId = mysqli_real_escape_string($con, $_POST['EntryId']);

		$sql="INSERT INTO totalMilesDB (name, miles, EntryId)
		VALUES ('$name', '$miles', '$EntryId')";
		
		if (!mysqli_query($con,$sql)) { die('Error: ' . mysqli_error($con)); }
		mysqli_close($con);
	}

	else {
		echo 'Ah ah ah, you didnt say teh magic word!';
	}
}

?>
