<?php
    session_start();
    require_once './php/connect.php';
    require './php/php_function.php';
    require './php/php_personal.php';
    $_SESSION['index']="";
    $users = mysqli_query($conn,"SELECT * FROM user WHERE name = '".$_SESSION["name"]."' ");
    $user = mysqli_fetch_assoc($users);
    $userID = $user['UserID'];
    $avatar1= $user['avatar'];
    $birthday=$user['birthday'];
    $phoneNumber=$user['phoneNumber'];
    $roleID = $user['roleID'];
    if(isset($_POST['capnhat']))  {
        $birthday1=$_POST['birthday'];
        $phone=$_POST['phone'];
        $sql4="UPDATE user SET birthday='$birthday1', phoneNumber='$phone' WHERE name ='".$_SESSION["name"]."'";
        mysqli_query($conn,$sql4);
        header("Location: personal.php");
        
  }
?>

<?php
    include 'top.php';
?>
        <div class="grid">
            <div class="row" id="content">
                <!-- <div class="owl-carousel owl-theme advertisement">
                    <img class="item" src="./assets/img/nhan_ads0000.jpg" alt="">
                    <img class="item" src="./assets/img/nghia_ads0000.jpg" alt="">
                    <div class="item"><h1>Quảng cáo 3</h1></div>
                </div> -->
            </div>
        </div>

    <section class='app'>
        <div class="container">
            <div class="body">
                
                <section class='content'>
                    <div class="content__header">
                        <div class="grid_container">
                            <a href="#" class="personal_avatar">
                                <img src="uploads/<?php echo $avatar1 ?>.jpg" alt="">
                                <div><?php echo $avatar1 ?></div>
                            </a>
                            <div class="user_infor">
                                <h2 class="user__name">
                                  <?php echo $_SESSION['name'] ?>
                                </h2>
                                <form method='POST' class="personal_all">
                                <div class="user__infor-item user__time">
                                
                                    <div>
                                    <ion-icon class="personal_icon" name="calendar-sharp" ></ion-icon>
                                         
                                         <input name="birthday" class="personal_birthday"  value ="<?php echo $birthday ?>">
                                    </div>
                                    <div>
                                    <ion-icon class="personal_icon" name="call-sharp"></ion-icon>   
                                    
                                    <input class="personal_phone" name="phone" value ="<?php echo $phoneNumber ?>">
                                    </div>
                                    <button class="personal_capnhat" class='capnhat' id='capnhat' name='capnhat'>Cập nhật</button>
                                </div>
                                </form>
                            </div>
                                <div class="personal_upload">
                                    <form action='php/upload.php' method='post' enctype='multipart/form-data' class="personal_form">
                                        <div class='updateinfo' id='updateinfo'>
                                              Cập nhật ảnh:
                                        </div>
                                        <div class="filetoupload">
                                        <input type='file' name='fileToUpload' id='fileToUpload'>
                                        </div>
                                        <input  class="customcss" type='submit' value='Cập nhật ảnh' name='submit'>
                                    </form> 
                                </div>
                            </div> 
                    </div>
                    
                   <h1 class="personal_allpost"> Tất cả bài viết </h1>
                    <div class="content__pannel">
                        <!-- Question -->
                        <div class="pannel">
                        <?php
                        if($roleID == 1){
                            getDataAdmin();
                        }else{
                            getDataIndex1($userID);
                        }
                        
                        ?>
                        </div>     
                    </div>
                </section>
            </div>
        </div> 
    </section>
    
 
   <?php
        include 'bottom.php';
   ?>
    
 <!--External Js File-->
<script src="./assets/js/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/poper.js/1.14.7/umd/poper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>