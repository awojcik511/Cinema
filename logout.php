<?php
		session_start();
		$_SESSION = array();
		session_destroy();
		
		$polacz=mysqli_connect('localhost','root','','kino1');
		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		$sql = 'DELETE FROM session';
			mysqli_query($polacz,$sql);
		header('Location: repertuar.php');
?>
