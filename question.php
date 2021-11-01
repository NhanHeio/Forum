<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
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
                    <!--Load question content-->
                <?php
                    // load_question($_GET("idQuestion"));
                    if(isset($_GET["idQuestion"])){
                        $id = $_GET["idQuestion"];
                    }
                    load_question($id);
                    // echo '<div id="question-space" class="quesitondetail">
                    //     <div class="vote-area">
                    //         <i id="vote-up-'.$_SESSION["idQuestion"] .'" style="font-size:50px" class="vote fal fa-angle-up"></i> <br>
                    //         <span class="vote-up-'.$_SESSION["idQuestion"] .'" style="font-size:20px">'.$_SESSION["voteUp"].'</span><br>
                    //         <i id="vote-down-'.$_SESSION["idQuestion"] .'" style="font-size:50px" class="vote fal fa-angle-down"></i>
                    //     </div>
                    //     <div class="question"><span>'. $_SESSION["topic"] .'</span> </div>
                    //     <br>
                    //     <div style="width:max-width; height: fit-content;background-color: #E8E8E8;">
                    //         '. $_SESSION["content"] .'
                    //     </div>
                    // </div>';
                  

                ?>
                    <h2 class="h2">All comment</h2>
                    <div class="allcomment">
                        <div class="comment_detail">
                            <?php
                                
                                getComment($_GET["idQuestion"]);
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

        CKEDITOR.replace('comment');
    </script>
</body>
</html>