<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="./assets/css/css.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>IT</title>
</head>
<?php  include "./php/signup.php" ?>
<?php  include "./php/login.php" ?>
<body>
    <script src="./assets/js/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/poper.js/1.14.7/umd/poper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <div id="main">
        <div id="header">
            <div id="nav">
                <ul style="list-style-type: none">
                    <li><span style="color:white">FORUM IT </span></li>
                    <li><i style="color:white; padding: 0 12px;" class="far fa-grip-lines-vertical"></i></li>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="">Bài viết mới</a></li>
                    <li><a href="">Thành viên</a></li>
                </ul>
            </div>
            <div id="nav_right">
                <ul style="list-style-type: none">
                    <li><a href="">Đăng nhập</a></li>
                    <!--<li><a href="">Đăng ký</a></li>
                     <li>
                        <img class="nav-avt" src="./assets/img/avatar.jpg" alt="avt">
                    </li>
                    <li class="nav-user-item">Hồ Trung Nhân
                        <ul class="name-user-hover" style="list-style-type: none;padding: 0;">
                            <li class="name-user-item" ><a class="name-user-item-link" href="#">Trang cá nhân</a></li>
                            <li class="name-user-item" ><a class="name-user-item-link" href="#">Đăng xuất</a></li>
                        </ul>
                    </li> -->
                    <li><i class="icon_seach fal fa-search"></i></li>
                </ul>
            </div>
        </div>
          <div class="row" id="content">
            <div class="owl-carousel owl-theme advertisement">
                <div class="item"><h1>Quảng cáo 1</h1></div>
                <div class="item"><h1>Quảng cáo 2</h1></div>
                <div class="item"><h1>Quảng cáo 3</h1></div>
                <div class="item"><h1>Quảng cáo 4</h1></div>
            </div>
            </div>
            <div class="row" id="content">
                
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Đăng nhập</span>
                            <span onclick="register()">Đăng ký</span>
                            <hr id="Indicator">
                        </div>
                        <div class="note"><p><?php signup(); ?></p></div>
                       <div class="note"><p><?php login(); ?></p></div>
                        <form action="" method="POST" id="LoginForm">
                            <input name="email" id="email" type="email" placeholder="Email">
                            <input name="matkhau" id="matkhau" type="password" placeholder="Mật khẩu">
                            <button name="dangnhap" type="submit" class="btn">Đăng nhập</button>
                            <a href="">Forgot password</a>
                        </form>
    
                        <form action="" method="POST" id="RegForm">
                            <input name="name" type="text" placeholder="Họ và tên">
                            <input name="emai1" type="email" placeholder="Email">
                            <input name="matkhau1" type="password" placeholder="Mật khẩu">
                            <button name="dangky" id="dangky" type="submit" class="btn">Đăng ký</button>
                        </form>
    
                    </div>
                </div>
            </div>

                
            </div>
               
            <br><br><br><br>
        

        <div id="footer">
            <div class="row">
                <div class="col-4">
                    <h3 class="footer-heading">Author</h3>
                    <ul style="list-style-type: none;padding-left:0;">
                        <li class="footer-author">Hồ Trung Nhân</li>
                        <li class="footer-author">Võ Văn Khánh</li>
                        <li class="footer-author">Đinh Hiếu Nghĩa</li>
                    </ul>
                </div>
                <div class="col-4">
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
                <div class="col-4">
                    <a href="#" class="footer-link">Privacy Policy</a>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        }
        else {
            MenuItems.style.maxHeight = "0px";
        }
    }

</script>
<!-- ------------------- js for Account form-------------- -->

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";

    }
    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }

</script>
</html>