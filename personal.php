<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
    require './php/php_personal.php';
    $_SESSION['index']="";
    $users = mysqli_query($conn,"SELECT * FROM user WHERE name = '".$_SESSION["name"]."' ");
    $user = mysqli_fetch_assoc($users);
    $avatar1= $user['avatar'];
    $birthday=$user['birthday'];
    $phoneNumber=$user['phoneNumber'];
    if(isset($_POST['capnhat']))  {
        $birthday1=$_POST['birthday'];
        $phone=$_POST['phone'];
        $sql4="UPDATE user SET birthday='$birthday1', phoneNumber='$phone' WHERE name ='".$_SESSION["name"]."'";
        mysqli_query($conn,$sql4);
        header("Location: personal.php");
        
  }
?>
<?php 
    $name1=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/button.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/texteditor.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
<div id="main">
        
        <div class="grid" id="header">
            <div id="nav">
                <ul style="list-style-type: none">
                    <li id="name-forum"><span style="color:white">FORUM IT </span></li>
                    <li><i style="color:white; padding: 0 12px;" class="far fa-grip-lines-vertical"></i></li>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a style="cursor:pointer;" onclick="post();">Bài viết mới</a></li>
                    <li><a href="">Thành viên</a></li>
                </ul>
            </div>
            <div id="nav_right">
                <ul style="list-style-type: none">
                    <?php
                        if(isset($_SESSION["name"])&& $_SESSION['name']){
                            $users3 = mysqli_query($conn,"SELECT * FROM user WHERE name = '".$_SESSION["name"]."' ");
                            $user3 = mysqli_fetch_assoc($users3);
                             $avatar3= $user3['avatar'];
                             $duoi='.jpg';
                             $allname=$avatar3.$duoi;
                            echo'
                            <li class="nav-user-item">
                            <img class="nav-avt" src="uploads/'.$allname.'" alt="avt">
                            <span class="nav-user-name">'.$_SESSION['name'].'</span>
                                <ul class="name-user-hover" style="list-style-type: none;padding: 0;">
                                    <li class="name-user-item" ><a class="name-user-item-link" href="personal.php">Trang cá nhân</a></li>
                                    <li class="name-user-item" ><a class="name-user-item-link" href="./php/logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>';
                        }else{
                            echo'<li><a href="sign.php">Đăng nhập</a></li>';
                        }
                   

                    ?>
                    <li class="search-button"><i class="icon_seach fal fa-search"></i>
                    </li>
                </ul>
                    <div id="search-place" class="class-none">
                        <form action="" method="post" onsubmit="return false">
                            <h5 style="margin:4px">Search</h5>
                            <hr>
                            <input style="display:block" class="search-input" type="text" placeholder="Search..." name="search_topic">
                            <label style="margin-left:10px" for="search_member">By:</label>
                            <input style="display:block" class="search-input" type="text" placeholder="Member" name="search_member">
                            <button id="search" style="float:right; margin-bottom:20px; margin-right:30px" name="submit" class="btn btn-primary">
                                Search
                            </button>
                            <button id="cancel-search" class="btn btn-cancel" style="float:right; margin-bottom:20px; margin-right:30px" >Cancel</button>
                        </form>
                        <div id="search-result">

                        </div>
                    </div>
                    
            </div>
        </div>
        <div class="grid">
            <div class="row" id="content">
                <div class="owl-carousel owl-theme advertisement">
                    <img class="item" src="./assets/img/nhan_ads0000.jpg" alt="">
                    <img class="item" src="./assets/img/nghia_ads0000.jpg" alt="">
                    <div class="item"><h1>Quảng cáo 3</h1></div>
                </div>
            </div>
        </div>

    <section class='app'>
        <div class="container">
            <div class="body">
                
                <section class='content'>
                    <div class="content__header">
                        <div class="content__header-user">
                            <a href="#" class="user__avatar">
                                <img src="uploads/<?php echo $avatar1 ?>.jpg" alt="">
                                <div><?php echo $avatar1 ?></div>
                            </a>
                            <div class='user__infor'>
                                <h2 class="user__name">
                                  <?php echo $_SESSION['name'] ?>
                                </h2>
                                <form method='POST'>
                                <div class="user__infor-item user__time">
                                
                                    <div>
                                    <ion-icon name="calendar-sharp" style ="height: 20px; width:50px;"></ion-icon>
                                         
                                         <input name="birthday" style="border: 0px; background-color: #e5e6e7" value ="<?php echo $birthday ?>">
                                    </div>
                                    <div>
                                    <ion-icon name="call-sharp" style ="height: 20px; width:50px;"></ion-icon>   
                                    
                                    <input name="phone" style="border: 0px;background-color: #e5e6e7" value ="<?php echo $phoneNumber ?>">
                                    </div>
                                    <button style="width: 80px; height: 25px;" class='capnhat' id='capnhat' name='capnhat'>Cập nhật</button>
                                </div>
                                </form>
                                <div class="user__infor-item user__location">
                                    <form action='upload.php' method='post' enctype='multipart/form-data' style="font-size:20px;">
                                        <div class='updateinfo' id='updateinfo'>
                                              Cập nhật ảnh:
                                            <input type='file' name='fileToUpload' id='fileToUpload'>
                                            <input style="width: 130px;" type='submit' value='Cập nhật ảnh' name='submit'>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                   <h1 style="font-size: 30px;"> Tất cả bài viết </h1>
                    <div class="content__pannel">
                        <!-- Question -->
                        <div class="pannel">
                        <?php
                            getDataIndex1($name1);
                        ?>
                        </div>     
                    </div>
                </section>
            </div>
        </div> 
    </section>
    
 
    <div style="margin-top: 230px;" id="footer">
            <div class="row">
                <div class="col-4 footer-authors">
                    <h3 class="footer-heading">Author</h3>
                    <ul style="list-style-type: none;padding-left:0;">
                        <li class="footer-author">Hồ Trung Nhân</li>
                        <li class="footer-author">Võ Văn Khánh</li>
                        <li class="footer-author">Đinh Hiếu Nghĩa</li>
                    </ul>
                </div>
                <div class="col-4 footer-links">
                    <h3 class="footer-heading">Contact</h3>
                    <ul style="list-style-type: none;padding-left:0;">
                        <li><a class="footer-link" href="https://www.facebook.com/nhantrung.ho/">
                            <i class="fab fa-facebook"></i>
                            Facebook
                        </a></li>
                        <li><a class="footer-link" href="https://www.instagram.com/nhantrung_v.i.p/">
                            <i class="fab fa-instagram"></i>
                            Instagram
                        </a></li>
                        <li><a class="footer-link" href="#">
                            <i class="fal fa-envelope"></i>
                            Gmail
                        </a></li>
                    </ul>
                </div>
                <div class="col-4 footer-privacy">
                    <a href="#" class="footer-link">Privacy Policy</a>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Body Left -->
                
                    </div>
</body>
<!-- <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script> -->

</html>