<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/texteditor.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>Forum IT</title>
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
