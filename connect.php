<?php 
	$conn = mysqli_connect("localhost", "root", "", "forum");
	if(!$conn){
		echo "Database connect" . mysqli_connect_error();
	} 
?>