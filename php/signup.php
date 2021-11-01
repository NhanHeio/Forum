<?php
    function signup(){
	require 'connect.php';
   if(isset($_POST["dangky"])){
   	 $name=$_POST["name"];
   	 $mail=$_POST["emai1"];
     $matkhau=$_POST["matkhau1"];
   	 if($name=="" || $mail=="" || $matkhau==""){
   	 	echo "<div class='note'><p style ='color: red;'>Vui lòng nhập đầy đủ thông tin </p></div>";
   	 }
   	 else {
   	 	$sql="select * from `user` where mail ='$mail'";
   	 	$kt=mysqli_query($conn,$sql);
   	 	if(mysqli_num_rows($kt)>0){
            echo "<div class='note'><p style ='color: red;'> Tài khoản đã được sử dụng </p></div>";
   	 	} 
   	 	else{
            echo "<div class='note'><p style ='color: red;'> Đắng ký thành công </p></div>";
   	 		$sql="INSERT INTO `user`(roleID, name,birthday, mail, password, phoneNumber, avatar) VALUES(2,'$name','2021-01-01','$mail', '$matkhau',0,'Not update')";
   			mysqli_query($conn,$sql);
			// header("Location: index.php");
   	 	}
		mysqli_free_result($kt);
		// mysqli_free_result($result);
   	 }
   }
}

?>