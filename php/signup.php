<?php
    function signup(){
    $output="";
	require 'connect.php';
   if(isset($_POST["dangky"])){
   	 $taikhoan=$_POST["taikhoan1"];
   	 $matkhau=$_POST["matkhau1"];
     $email=$_POST["emai1"];
   	 if($taikhoan=="" || $matkhau=="" || $email==""){
   	 	echo "<div class='note'><p style ='color: red;'>Vui lòng nhập đầy đủ thông tin </p></div>";
   	 }
   	 else {
   	 	$sql="select * from users where tai_khoan='$taikhoan'";
   	 	$kt=mysqli_query($conn,$sql);
   	 	if(mysqli_num_rows($kt)>0){
            echo "<div class='note'><p style ='color: red;'> Tài khoản đã được sử dụng </p></div>";
   	 	} 
   	 	else{
            echo "<div class='note'><p style ='color: red;'> Đắng ký thành công </p></div>";
   	 		$sql="INSERT INTO users (tai_khoan, mat_khau, email) VALUES('$taikhoan','$matkhau', '$email')";
   			 mysqli_query($conn,$sql);
   	 		 
   	 	}
            
   	 }
   }
}

?>