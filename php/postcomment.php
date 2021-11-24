<?php
    session_start();
    require_once('connect.php');
?>
<?php
    if(isset($_POST['submit'])){
        
        if(isset($_SESSION["name"])){
            $queID = $_POST["idQuestion"];
            $userID = $_SESSION['userID'];
            $content = mysqli_real_escape_string($conn,$_POST['comment']);
            if(!empty($content)){
                $sql = "INSERT INTO `answer`(`queID` ,`userID`, `content`,`voteUp`, `voteDown`) VALUES ('$queID', '$userID', '$content', 0, 0)";
                $excute = mysqli_query($conn,$sql);
                if(!$excute){
                    header("Location:../index.php?failedToUpload");
                    exit();
                }else{
                    header("Refresh:0");
                    exit();
                }
                // echo $sql;
            }else{
                header("Refresh:0");
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