<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
    $_SESSION['index']="";
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
  
                            echo'
                            <li class="nav-user-item">
                            <img class="nav-avt" src="./assets/img/'.$_SESSION['avt'].'.jpg" alt="avt">
                            <span class="nav-user-name">'.$_SESSION['name'].'</span>
                                <ul class="name-user-hover" style="list-style-type: none;padding: 0;">
                                    <li class="name-user-item" ><a class="name-user-item-link" href="personal.html">Trang cá nhân</a></li>
                                    <li class="name-user-item" ><a class="name-user-item-link" href="./php/logout.php">Đăng xuất</a></li>
                                </ul>
                            </li>';
                        }else{
                            echo'<li><a href="sign.php">Đăng nhập</a></li>';
                        }
                   

                    ?>
                    <li class="search-button"><i class="icon_seach fal fa-search"></i>
                
                    <div class="search_space">
                        <form action="php/search.php" method="get">
                            <h5 style="margin:4px">Search</h5>
                            <hr>
                            <input style="display:block" class="search-input" type="text" placeholder="Search..." name="search_topic">
                            <label style="margin-left:10px" for="search_member">By:</label>
                            <input style="display:block" class="search-input" type="text" placeholder="Member" name="search_member">
                            <button id="search" style="float:right; margin-bottom:20px; margin-right:30px" name="submit" class="btn btn-primary">
                                Search
                            </button>
                        </form>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="grid">
            <div class="row" id="content">
                <div class="owl-carousel owl-theme advertisement">
                    <img class="item" src="./assets/img/nhan_ads0000.jpg" alt="">
                    <img class="item" src="./assets/img/nghia_ads0000.jpg" alt="">
                    <div class="item"><h1>Quảng cáo 3</h1></div>
                </div>

                <div class="col-2 content-category">
                    <h3 class="category-heading"><i class="category-icon fal fa-list"></i> Danh mục</h3>
                    <ul style="list-style-type: none;" class="category-list">
                        <li class="category-item">
                            <a id="category-all-post" class="category-item-link">Tất cả bài viết</a>
                        </li>
                        <li class="category-item">
                            <a id="category-new-post" class="category-item-link">Bài viết mới</a>
                        </li>
                        <li class="category-item">
                            <a id="category-hot-post" class="category-item-link">Bài viết tiêu biểu</a>
                        </li>
                        <li class="category-item">
                            <a id="category-member" class="category-item-link">Thành viên</a>
                        </li>
                        
                    </ul>
                </div> 
                <!-- Conten-category end-->
                 <div id="main-content" class="col-8 content-main">
                    <div class="breadcrumbs">
                        <ul style="list-style-type: none">
                            <li><a href="index.php">Trang chủ </a><i class="far fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="p-title">
                        <div class="p-title-value"><h3>Forum cộng đồng IT</h3></div>
                        <div class="p-title-actionPage">
                            <button onclick="post();" class="btn-add"><i class="bolt fal fa-bolt"></i>Bài viết mới</button>
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
                    <div id="index_load" class="top-post">
                        <div class="top-post-title">
                            <span class="p-admin-noti-title">
                            Bài viết đáng chú ý</span>
                        </div>
                        <?php
                            getDataIndex($_SESSION['index']);
                        ?>
                        
                    </div>
                    
                </div>  
                <!--main content end-->

                 <div id="post-question" class="col-8 class-none"> 
                    <div class="breadcrumbs">
                        <ul style="list-style-type: none; list-style: none; ;display:inline">
                            <li style="display:inline" ><a href="index.php">Trang chủ </a><i class="far fa-angle-right"></i></li>
                            <li style="display:inline"><a href="">Bài viết mới </a><i class="far fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Bài viết mới</h1>
                    <form action="./php/postquestion.php" method="post">   
                        <h6>Tiêu đề</h6>
                        <input class="input-1" name="title-question" type="text">
                        <h6>Nội dung</h6>
                        <textarea id="ckeditor-post"
                                    class="input shadow"
                                    name="content-question"
                                    ></textarea>
                        <h6>Tags</h6>
                        <span style="display: block">Thêm tối đa 5 tag cho câu hỏi (Ngăn cách bằng dấu phẩy ,)</span>
                        <input class="input-1" name="tag-question" type="text" placeholder="Tags">
                        <div class="button-class">
                            <button name="submit" type="submit"class="btn-submit">Submit</button>
                            <button onclick="cancel();" class="btn-cancel">Hủy</button>
                        </div>
                    </form>
                </div>
                <!--Post quetion end -->
                

            </div>
        </div>

        <div id="footer">
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
    <!--External Js File-->
    <script src="./assets/js/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/poper.js/1.14.7/umd/poper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor-post');
    </script>
</body>
</html>