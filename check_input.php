<?php
	function check_input($r) {	// avoids sql injection
		$r = trim($r);
		$r = strip_tags($r);
		$r = stripslashes($r);
		$r = htmlentities($r);
		$r = mysql_real_escape_string($r);
		//$r = mysqli_real_escape_string($r);
		return $r;
	}
?>