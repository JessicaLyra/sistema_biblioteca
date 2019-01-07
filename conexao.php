<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$firstname ="Jessica";
	$lastname = "Silva";
	$email = "jessica.lyraoutlook.com";
	
	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('$firstname', '$lastname', '$email')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
	
	?>