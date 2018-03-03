<?php
	session_start();
	require_once("db.php");

	//if(isset($_POST['id'], $_POST['email'], $_POST['fName'], $_POST['mName'], $_POST['lName'], $_POST['pwd'], $_POST['contactNum'], $_POST['gwa'], $_POST['course'], $_POST['major'], $_POST['year'])) {

		$sql = "SELECT * FROM students 
		            INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode
		            INNER JOIN login ON students.id = login.id
		            WHERE students.id='$_SESSION[id]'";
        $result = $conn->query($sql);

      	if($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()) {

				if(empty($_POST['id'])) {
					$id = $row['id'];
				}
				else {
					$id = $_POST['id'];
				}

				if(empty($_POST['email'])) {
					$email = $row['email'];
				}
				else {
					$email = strtolower($_POST['email']);
				}

				if(empty($_POST['fName'])) {
					$fName = $row['firstName'];
				}
				else {
					$fName = strtoupper($_POST['fName']);
				}

				if(empty($_POST['mName'])) {
					$mName = $row['middleName'];
				}
				else {
					$mName = strtoupper($_POST['mName']);
				}

				if(empty($_POST['lName'])) {
					$lName = $row['lastName'];
				}
				else {
					$lName = strtoupper($_POST['lName']);
				}

				if(empty($_POST['pwd'])) {
					$pwd = $row['password'];
				}
				else {
					$pwd = $_POST['pwd'];
				}

				if(empty($_POST['contactNum'])) {
					$contactNum = $row['contactNum'];
				}
				else {
					$contactNum = $_POST['contactNum'];
				}

				if(empty($_POST['gwa'])) {
					$gwa = $row['gwa'];
				}
				else {
					$gwa = $_POST['gwa'];
				}
				
				if(empty($_POST['course'])) {
					$course = $row['course'];
				}
				else {
					$course = strtoupper($_POST['course']);
				}

				if(empty($_POST['major'])) {
					$major = $row['major'];
				}
				else {
					$major = strtoupper($_POST['major']);
				}

				if(empty($_POST['campus'])) {
					$campus = $row['campus'];
				}
				else {
					$campus = strtoupper($_POST['campus']);
				}

				if(empty($_POST['year'])) {
					$year = $row['year'];
				}
				else {
					$year = strtoupper($_POST['year']);
				}
			}

			$sql = "UPDATE students SET 
				id = '$id',
				lastName = '$lName',
				middleName = '$mName',
				firstName = '$fName',
				email = '$email',
				contactNum = '$contactNum',
				gwa = '$gwa',
				course = '$course',
				major = '$major',
				year = '$year',
				campus = '$campus'
				WHERE id = '$_SESSION[id]'";

			if($conn->query($sql) === TRUE) {
				header("Location: user.php?flag=1&status=0");
			}
			else {
				header("Location: user.php?flag=1&status=1");
			}

			$conn->close();
		}
	//}	
?>