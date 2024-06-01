<?php
	$conn = new mysqli("localhost","root","","cart_s");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>