<?php
	function get_db() {
		$db_name="bsurosar_thesis";
		$host="localhost";
		$username="bsurosar";
		$password="nJb5T3p77u";
		$db=new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$username,$password);
		return $db;
	}

	$db_name="bsurosar_thesis";
	$host="localhost";
	$username="bsurosar";
	$password="nJb5T3p77u";

	$conn = new mysqli($host, $username, $password, $db_name);
	if($conn->connect_error) {
		die("Connection failed: ".$conn->connect_error);
	}
?>