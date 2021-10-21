<?php
    require 'php_function.php';
    require 'connect.php';
    if(isset($_POST["nameCategory"])){
        $nameCategory = $_POST["nameCategory"];
        if($nameCategory == 'category-all-post'){
            $sql = "SELECT * FROM `question` ORDER BY voteUp DESC;";
            $result = mysqli_query($conn, $sql);
            for($i=1;$i<=10;$i++){
                $r = mysqli_fetch_assoc($result);
                $author = $r["userID"];
                $queID = $r["queID"];
                $sql1 = "SELECT name from `user` where UserID = $author";
                $result1 = mysqli_query($conn, $sql1);
                $r1 = mysqli_fetch_assoc($result1);
                $sql2 = "SELECT COUNT(*) FROM `answer` WHERE queID = $queID";
                $result2 = mysqli_query($conn, $sql2);
                $r2 = mysqli_fetch_assoc($result2);
                echo'<div class="top-post-content">
                                <a class="question-content" id="'. $queID .'" style="width:33.33%" href="">'. $r["topic"] .'</a>
                                <a style="width:33.33%;text-align:center;" href="">'. $r1["name"] .'</a>
                                <div style="width:33.33%;text-align:center;" class="post-react">
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>
                            ';
            }
        }elseif($nameCategory == 'category-new-post'){
            $sql = "SELECT * FROM `question` ORDER BY `queID` DESC;";
            $result = mysqli_query($conn, $sql);
            for($i=1;$i<=10;$i++){
                $r = mysqli_fetch_assoc($result);
                $author = $r["userID"];
                $queID = $r["queID"];
                $sql1 = "SELECT name from `user` where UserID = $author";
                $result1 = mysqli_query($conn, $sql1);
                $r1 = mysqli_fetch_assoc($result1);
                $sql2 = "SELECT COUNT(*) FROM `answer` WHERE queID = $queID";
                $result2 = mysqli_query($conn, $sql2);
                $r2 = mysqli_fetch_assoc($result2);
                echo'<div class="top-post-content">
                                <a class="question-content" id="'. $queID .'" style="width:33.33%" href="">'. $r["topic"] .'</a>
                                <a style="width:33.33%;text-align:center;" href="">'. $r1["name"] .'</a>
                                <div style="width:33.33%;text-align:center;" class="post-react">
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
            }
            
        }elseif($nameCategory == 'category-hot-post'){
            $sql = "SELECT * FROM `question` ORDER BY voteUp DESC;";
            $result = mysqli_query($conn, $sql);
            for($i=1;$i<=10;$i++){
                $r = mysqli_fetch_assoc($result);
                $author = $r["userID"];
                $queID = $r["queID"];
                $sql1 = "SELECT name from `user` where UserID = $author";
                $result1 = mysqli_query($conn, $sql1);
                $r1 = mysqli_fetch_assoc($result1);
                $sql2 = "SELECT COUNT(*) FROM `answer` WHERE queID = $queID";
                $result2 = mysqli_query($conn, $sql2);
                $r2 = mysqli_fetch_assoc($result2);
                echo'<div class="top-post-content">
                                <a class="question-content" id="'. $queID .'" style="width:33.33%" href="">'. $r["topic"] .'</a>
                                <a style="width:33.33%;text-align:center;" href="">'. $r1["name"] .'</a>
                                <div style="width:33.33%;text-align:center;" class="post-react">
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
                }
        }else{
            $sql = 'SELECT * FROM `user` ORDER BY `UserID` ';
            $result = mysqli_query($conn,$sql);
            $temp =mysqli_num_rows($result);
            $i_max = ($temp < 10) ? $temp : 10;
            for($i=1;$i<=$i_max;$i++){
                $r = mysqli_fetch_assoc($result);
                $userID = $r["UserID"];
                $sql1 = "SELECT COUNT(*) FROM `question` WHERE `userID` = $userID";
                $result1 = mysqli_query($conn,$sql1);
                $result2 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result)>=1){

                    $r1 = mysqli_fetch_assoc($result1);
                    echo'<div class="top-post-content">
                                    <a class="question-content" style="width:50%" href="">'. $r["name"] .'</a>
                                    <div style="width:50%" class="post-react">
                                        <span>'. $r1["COUNT(*)"] .' Post</i></span>
                                    </div>
                                </div>';
                }else{
                    echo'<div class="top-post-content">
                                    <a class="question-content" style="width:50%" href="">'. $r["name"] .'</a>
                                    <div style="width:50%" class="post-react">
                                        <span>0 Post</i></span>
                                    </div>
                                </div>';
                }
            }
        }
        $sum = mysqli_num_rows($result);
        $page = $sum / 10;
        echo '
            <ul class="page home-product-page">
                <li class="page-item">
                    <a href="" class="page-item-link">
                        <i class="page-item-icon fas fa-angle-left"></i>
                    </a>
                </li>';
                $i=0;
                $page_num = 1;
                do{
                    echo '
                    <li class="page-item page-item-active">
                        <a class="page-item-link">'.$page_num.'</a>
                    </li>';
                    $page_num++;
                    $i++;
                }while($i<=$page);
            echo '
                <li class="page-item">
                    <a href="" class="page-item-link">
                        <i class="page-item-icon fas fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            ';
            mysqli_free_result($result);
            mysqli_free_result($result1);
            mysqli_free_result($result2);
    }
?>