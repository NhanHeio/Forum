<?php
    require 'php_function.php';
    require 'connect.php';
    if(isset($_POST['idButton'])){
        $idButton = $_POST['idButton'];
        if($idButton == "change-to-post"){
            echo '
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
                    <button id="change-to-index" class="change-button btn-cancel">Hủy</button>
                </div>
            </form>
            ';
        }elseif($idButton == "change-to-index"){
            echo '
            <div class="breadcrumbs">
                <ul style="list-style-type: none">
                    <li><a href="index.php">Trang chủ </a><i class="far fa-angle-right"></i></li>
                </ul>
                </div>
                <div class="p-title">
                    <div class="p-title-value"><h3>Forum cộng đồng IT</h3></div>
                    <div class="p-title-actionPage">
                        <button id="change-to-post" class="change-button btn-add"><i class="bolt fal fa-bolt"></i>Bài viết mới</button>
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
                        getDataIndex($_SESSION["index"]);
                    ?>
                    
                </div>
            ';
        }
    }
?>