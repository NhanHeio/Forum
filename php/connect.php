<?php 
	$conn = mysqli_connect("localhost", "root", "", "forum") or die('Ket noi that bai');
	if(!$conn){
		echo "Database connect" . mysqli_connect_error();
	} 
?>