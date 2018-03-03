<?php
	require_once("db.php");
	require_once("check_input.php");
	require_once("send_sms.php");

	function get_salt($uid) {
		$db = get_db();
		$query = $db->prepare("SELECT salt FROM login WHERE id=$uid");
		$query->execute(array($uid));
		$r = $query->fetch(PDO::FETCH_ASSOC);
		return $r['salt'];
	}

	if(isset($_POST['username'],$_POST['pwd'])) {
		$username = $_POST['username'];
		$pwd = $_POST['pwd'];
		$saltedpwd = md5(get_salt($username).$pwd);

		try {
			/*$db = get_db();
			$query = $db->prepare("SELECT * FROM login WHERE id='$username' AND password='$pwd'");
			$query->execute(array($username,$saltedpwd));
			$r = $query->fetch(PDO::FETCH_ASSOC);*/

			$sql = "SELECT * FROM login WHERE id='$username' AND password='$pwd'";
			$result = $conn->query($sql);

			if($result->num_rows > 0) {	// user successfully logged in
				$r = $result->fetch_assoc();

				session_start();
				$access_level = $r['access_level'];
				$_SESSION['id'] = $r['id'];
				$_SESSION['access_level'] = $access_level;
				
				if($access_level == 0) {
					header("Location: user.php");
				}
				else if($access_level == 1) {
					header("Location: admin.php?flag=0");
				}
			}
			else {	// invalid credentials
				header("Location: login.php?err=1");
			}
		}
		catch(PDOException $e) {
			die("Database error: ".$e->getMessage());
		}
	}
	else {	// user needs to login
		header("Location: login.php");
	}
?>