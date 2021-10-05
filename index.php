﻿<?php
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
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/texteditor.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>Document</title>
</head>
<body>
    
    <div id="main">
        
        <div class="grid" id="header">
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
                    <?php
                        if(isset($_SESSION["name"])){
  
                            echo '<li>
                                <img class="nav-avt" src="./assets/img/'.$_SESSION['avt'].'.jpg" alt="avt">
                            </li>
                            <li class="nav-user-item">'.$_SESSION['name'].'
                                <ul class="name-user-hover" style="list-style-type: none;padding: 0;">
                                    <li class="name-user-item" ><a class="name-user-item-link" href="personal.html">Trang cá nhân</a></li>
                                    <li class="name-user-item" ><a class="name-user-item-link" href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>';
                        }else{
                            echo'<li><a href="sign.php">Đăng nhập</a></li>';
                        }
                   

                    ?>
                    <li><i class="icon_seach fal fa-search"></i></li>
                </ul>
            </div>
        </div>
        <div class="grid">
            <div class="row" id="content">
                <div class="owl-carousel owl-theme advertisement">
                    <div class="item"><h1>Quảng cáo 1</h1></div>
                    <div class="item"><h1>Quảng cáo 2</h1></div>
                    <div class="item"><h1>Quảng cáo 3</h1></div>
                    <div class="item"><h1>Quảng cáo 4</h1></div>
                </div>


                <div class="col-2 content-category">
                    <h3 class="category-heading"><i class="category-icon fal fa-list"></i> Danh mục</h3>
                    <ul style="list-style-type: none;" class="category-list">
                        <li class="category-item">
                            <a href="#" class="category-item-link">Tất cả bài viết</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-item-link">Bài viết mới</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-item-link">Bài viết tiêu biểu</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-item-link">Thành viên</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-item-link">Thành viên mới</a>
                        </li>
                    </ul>
                </div> <!-- Conten-category end-->
                 <div id="main-content" class="col-8 content-main">
                    <div class="breadcrumbs">
                        <ul style="list-style-type: none">
                            <li><a href="">Trang chủ </a><i class="far fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="p-title">
                        <div class="p-title-value"><h3>Forum cộng đồng IT</h3></div>
                        <div class="p-title-actionPage">
                            <button onclick="post()" class="btn-add"><i class="bolt fal fa-bolt"></i>Bài viết mới</button>
                        </div>
                    </div>
                    <div class="admin-noti">
                        <div class="admin-noti-title">
                            <span class="p-admin-noti-title">
                                Thông báo từ Ban quản trị Forum
                            </span>
                        </div>
                        <div class="admin-noti-content">
                            <a href="">Nội quy của Forum</a>
                            <a href="">Hồ Trung Nhân</a>
                        </div>
                        <div class="admin-noti-content">
                            <a href="">Hướng dẫn đăng bài</a>
                            <a href="">Hồ Trung Nhân</a>
                        </div>
                    </div>
                    <div class="top-post">
                        <div class="top-post-title">
                            <span class="p-admin-noti-title">
                            Bài viết đáng chú ý</span>
                        </div>
                        <div class="top-post-content">
                            <a href="">Bài viết số 1</a>
                            <a href="">Hồ Trung Nhân</a>
                            <div class="post-react">
                                <span>100 <i class="vote fal fa-angle-up"></i></span>
                                <span>100 <i class="vote fal fa-angle-down"></i></span>
                                <span>100 <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>
                        <div class="top-post-content">
                            <a href="">Bài viết số 2</a>
                            <a href="">Võ Văn Khánh</a>
                            <div class="post-react">
                                <span>100 <i class="vote fal fa-angle-up"></i></span>
                                <span>100 <i class="vote fal fa-angle-down"></i></span>
                                <span>100 <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>
                        <div class="top-post-content">
                            <a href="">Bài viết số 3</a>
                            <a href="">Đinh Hiếu Nghĩa</a>
                            <div class="post-react">
                                <span>100 <i class="vote fal fa-angle-up"></i></span>
                                <span>100 <i class="vote fal fa-angle-down"></i></span>
                                <span>100 <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>
                    </div>
                </div>  
                <!--main content end-->

                 <div id="post-question" class="col-8 class-none"> 
                    <div class="breadcrumbs">
                        <ul style="list-style-type: none; list-style: none; ;display:inline">
                            <li style="display:inline" ><a href="index.html">Trang chủ </a><i class="far fa-angle-right"></i></li>
                            <li style="display:inline"><a href="">Bài viết mới </a><i class="far fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Bài viết mới</h1>
                    <h6>Tiêu đề</h6>
                    <input class="input-1" name="title-question" type="text">
                    <div class="flex-box">
                        <button class="btn-text" type="button"
                            onclick="f1()"
                            class=" shadow-sm btn btn-outline-secondary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Bold Text">
                            <i class="far fa-bold"></i>
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f2()"
                            class="shadow-sm btn btn-outline-success"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Italic Text">
                            <i class="far fa-italic"></i>
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f3()"
                            class=" shadow-sm btn btn-outline-primary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Left Align">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f4()"
                            class="btn shadow-sm btn-outline-secondary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Center Align">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f5()"
                            class="btn shadow-sm btn-outline-primary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Right Align">
                            <i class="fas fa-align-right"></i>
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f6()"
                            class="btn shadow-sm btn-outline-secondary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Uppercase Text">
                            Upper Case
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f7()"
                            class="btn shadow-sm btn-outline-primary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Lowercase Text">
                            Lower Case
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f8()"
                            class="btn shadow-sm btn-outline-primary"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Capitalize Text">
                            Capitalize
                        </button>
                        <button class="btn-text" type="button"
                            onclick="f9()"
                            class="btn shadow-sm btn-outline-primary side"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Tooltip on top">
                            Clear Text
                        </button>
                    </div>
                    <h6>Nội dung</h6>
                    <div class="flex-box">
                        <textarea id="textarea1"
                                class="input shadow"
                                name="name"
                                rows="15"
                                cols="150">
                            </textarea>
                    </div>
                    <h6>Tags</h6>
                    <span style="display: block">Thêm tối đa 5 tag cho câu hỏi (Ngăn cách bằng dấu phẩy ,)</span>
                    <input class="input-1" name="tag-question" type="text" placeholder="Tags">
                    <div class="button-class">
                        <button class="btn-submit">Submit</button>
                        <button onclick="cancel();" class="btn-cancel">Hủy</button>
                    </div>
                </div>
                <!--Post quetion end -->
                

            </div>
        </div>

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
    <!--External Js File-->
    <script src="./assets/js/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/poper.js/1.14.7/umd/poper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/texteditor.js"></script>
</body>
</html>