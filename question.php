<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
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
    <title>Forum IT</title>
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
                                    <li class="name-user-item" ><a class="name-user-item-link" href="./php/logout.php">Đăng xuất</a></li>
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
                    <!--Load question content-->
                <?php

                    echo '<div id="question-space" class="quesitondetail">
                        <div class="vote-area">
                            <i id="vote-up-'.$_SESSION["idQuestion"] .'" style="font-size:50px" class="vote fal fa-angle-up"></i> <br>
                            <span class="vote-up-'.$_SESSION["idQuestion"] .'" style="font-size:20px">'.$_SESSION["voteUp"].'</span><br>
                            <i id="vote-down-'.$_SESSION["idQuestion"] .'" style="font-size:50px" class="vote fal fa-angle-down"></i>
                        </div>
                        <div class="question"><span>'. $_SESSION["topic"] .'</span> </div>
                        <br>
                        <div style="width:max-width; height: fit-content;background-color: #E8E8E8;">
                            '. $_SESSION["content"] .'
                        </div>
                    </div>';
                  

                ?>
                    <h2 class="h2">All comment</h2>
                    <div class="allcomment">
                        <div class="comment_detail">
                            <?php
                                
                                getComment($_SESSION["idQuestion"]);
                            ?>
                            <div>
                                <form action="./php/postcomment.php" method="POST" style="width:max-width">
                                    <textarea name="comment"></textarea>
                                        <div class="button-class">
                                            <button style="margin:10px" name="submit" type="submit"class="btn-submit">Post</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>  
            <!--main content end-->

        </div>
    </div>

    <div class="grid" id="footer">
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
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>

        CKEDITOR.replace('comment');
    </script>
</body>
</html>