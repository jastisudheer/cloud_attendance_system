<?php
	if(isset($_POST['submit'])) {
		$code = $_POST['code'];
		$secret_code = "mysecretcode"; // Change this to your secret code
		if($code == $secret_code) {
			echo "Attendance recorded!";
		}
		else {
			echo "Invalid code!";
		}
	}
?>
