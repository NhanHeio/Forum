<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
    $_SESSION['index']="";
?>
<?php
    include 'top.php';
?>
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

<?php
    include 'bottom.php';
?>

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