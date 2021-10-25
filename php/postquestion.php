<?php
    session_start();
?>
<?php
    if(isset($_POST['submit'])){
        require_once('connect.php');
        if(isset($_SESSION["name"])){
            $userID = $_SESSION['userID'];
            $title = mysqli_real_escape_string($conn,$_POST['title-question']);
            $content = mysqli_real_escape_string($conn,$_POST['content-question']);
            $tags = mysqli_real_escape_string($conn,$_POST['tag-question']);
            if(!empty($tags) || !empty($title) || $content ){
                $sql = "INSERT INTO `question`(`userID`, `topic`, `Content`, `tags`, `voteUp`, `voteDown`, `flag`) VALUES ( $userID,'$title', '$content', '$tags', 0, 0, 0)";
                $excute = mysqli_query($conn,$sql);
                if(!$excute){
                    header("Location:../index.php?failedToUpload");
                    exit();
                }else{
                    echo "Successfully submitted";
                    echo '<hr><a href="../index.php">Về trang chủ</a>';
                    exit();
                }
            }else{
                echo "Vui lòng nhập đầy đủ nội dung";
                header("Location:../index.php");
                exit();
            }
        }else{
            echo "Chưa đăng nhập";
            echo '<hr><a href="../sign.php">Đăng nhập</a>';
        }
    }else{
        header("Location:../index.php?invalidRequest");
        exit();
    }
?>