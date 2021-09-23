<?php
    function login(){
        require 'connect.php';
    if(isset($_POST["dangnhap"])){
    	$taikhoandangnhap=$_POST["taikhoan"];
    	$matkhaudangnhap=$_POST["matkhau"];
    	$sql="select * from users where tai_khoan='$taikhoandangnhap' and mat_khau='$matkhaudangnhap'";
    	
    	$kt=mysqli_query($conn, $sql);
    	        $r = mysqli_fetch_array($kt);
    	if(mysqli_num_rows($kt)!=0){
            echo "<div class='note'><p style ='color: red;'> thanh cong </p></div>";
    	}
    	else{
           
            echo "<div class='note'><p style ='color: red;'> that bai </p></div>";
    	}
    }
    }
?>