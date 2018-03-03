<?php
	session_start();
	require_once("db.php");

	if(isset($_POST['message'])) {

		require_once("check_input.php");

		$message = $_POST['message'];

		$sql = "UPDATE announcement SET description = '$message'";

		if($conn->query($sql) === TRUE) {
			header("Location: admin.php?flag=3&status=0");
		}
		else {
			header("Location: admin.php?flag=3&status=1");
		}

		$conn->close();
	}	
?>