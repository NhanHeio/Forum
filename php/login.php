<?php
    function login(){
		session_start();
        require 'connect.php';
    if(isset($_POST["dangnhap"])){
    	$email=$_POST["email"];
    	$matkhaudangnhap=$_POST["matkhau"];
    	$sql="select * from `user` where mail='$email' and password='$matkhaudangnhap'";
    	
    	$result=mysqli_query($conn,$sql);
    	$r = mysqli_fetch_assoc($result);
		$userID = $r['UserID'];
		$name = $r['name'];
		$avt = $r['avatar'];
    	if(mysqli_num_rows($result)!=0){
			$_SESSION["userID"] = $userID;
            $_SESSION["name"]= $name;
			$_SESSION["avt"]= $avt;
			header('Location:index.php');
    	}
    	else{
           
            echo("Đăng nhập thất bại");
    	}
		mysqli_free_result($result);
    }
    }
?>