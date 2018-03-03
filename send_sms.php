<?php
	function itexmo($number, $id) {
		require_once("db.php");

		$sql = "SELECT * FROM announcement";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();

		  	$message = $row['description'];
		  	$apicode = $row['api_code'];
		  	$url = $row['api_url'];
		}
		
		//$message = "test message";
		//$apicode = "TR-BSU-R845667_IF7PP";
		//$url = "https://www.itexmo.com/php_api/api.php";

		$ch = curl_init();

		$itexmo = http_build_query(array('1' => $number, '2' => $message, '3' => $apicode));

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_CAINFO, "cacert.pem");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $itexmo);
		$res = curl_exec ($ch);

		curl_close ($ch);
	//}
	
	//function update_record($id) {
		//require_once("db.php");

		$sql = "UPDATE students SET scholarshipCode = 1 WHERE studentNum = '$id'";

		if($conn->query($sql) === TRUE) {
			header("Location: admin.php?flag=2");
		}
		else {
			header("Location: admin.php?flag=1");
		}

		$conn->close();
	}

	if(isset($_GET['num'], $_GET['id'])) {
		itexmo($_GET['num'], $_GET['id']);
		//update_record($_GET['id']);
	}
?>