<?php
	session_start();
	require_once("db.php");

	if(isset($_POST['id'], $_POST['email'], $_POST['fName'], $_POST['mName'], $_POST['lName'], $_POST['pwd'], $_POST['pwdx'], $_POST['contactNum'], $_POST['gwa'], $_POST['course'], $_POST['major'], $_POST['year'], $_POST['campus'])) {

		$id = $_POST['id'];
		$email = strtolower($_POST['email']);
		$fName = strtoupper($_POST['fName']);
		$mName = strtoupper($_POST['mName']);
		$lName = strtoupper($_POST['lName']);
		$pwd = $_POST['pwd'];
		$pwdx = $_POST['pwdx'];
		$contactNum = $_POST['contactNum'];
		$gwa = $_POST['gwa'];
		$course = strtoupper($_POST['course']);
		$major = strtoupper($_POST['major']);
		$year = strtoupper($_POST['year']);
		$campus = strtoupper($_POST['campus']);

		if(!is_numeric($contactNum)) {
			header("Location: create_account.php?status=3");	// contact must be number
		}

		if($pwdx == $pwd) {	//passwords match
			$sql = "INSERT INTO students(id, lastName, middleName, firstName, scholarshipCode, email, contactNum, gwa, course, major, campus, year)
					VALUES ('$id', '$lName', '$mName', '$fName', '2', '$email', '$contactNum', '$gwa', '$course', '$major', '$campus', '$year')";

			$sql1 = "INSERT INTO login(id, password, access_level)
						VALUES ('$id', '$pwd', '0')";

			if($conn->query($sql1) === TRUE) {
				if($conn->query($sql) === TRUE) {
					header("Location: create_account.php?status=0");
				}	
				else {
					header("Location: create_account.php?status=1");
				}
			}
			else {
				header("Location: create_account.php?status=1");	
			}
		}
		else {
			header("Location: create_account.php?status=2");
		}

		$conn->close();
	}
?>