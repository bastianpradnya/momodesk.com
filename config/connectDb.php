<?php
	$servername = "localhost";
	$usrname = "root";
	$paswd = "";

	// Membuat connection
	$conn = new mysqli($servername, $usrname, $paswd);
	if ($conn->connect_error) { // Check connection
	    die("Connection failed: " . $con->connect_error);
	}

	$dbname = "momodsk";
	$dbselect = mysqli_select_db($conn, $dbname);
	if($dbselect == TRUE){ //cek dB
	}else{
		// create Db Name
		$sql = "CREATE DATABASE ".$dbname;
		if ($conn->query($sql) == TRUE) {
		    echo "Database created successfully <br>";
		    echo "<h3>Please Refresh the page to installing Table Atribute</h3> <br>";
		} else {
		    echo "Error creating database: " . $conn->error;
		}	
	}
?>