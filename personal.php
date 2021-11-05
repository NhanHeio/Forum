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
                                    <form action='php/upload.php' method='post' enctype='multipart/form-data' style="font-size:20px;">
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