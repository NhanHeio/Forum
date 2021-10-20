<?php
    
    function getDataIndex($index){
        if($index == ""){

            require 'connect.php';
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
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .' </span><i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .' </span><i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
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
    }
    function getComment($queID){
        require 'connect.php';
        $sql = "SELECT * FROM `answer` WHERE `queID` = '$queID'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                $author = $row["userID"];
                $ansID = $row["ansID"];
                $content = $row["content"];
                $voteUp = $row["voteUp"];
                $voteDown = $row["voteDown"];
                $sql2 = "SELECT * FROM `user` WHERE `UserID` = '$author'";
                $result2 = mysqli_query($conn, $sql2);
                $r = mysqli_fetch_assoc($result2);
                echo '<div class="like">
                        <div class="person">
                            <div class="con1">
                                <div>
                                    <img src="gallery-1.jpg" alt="Picture" width="30px" height="30px">
                                    <span>'. $r["name"] .'</span>
                                </div>
                                <div class="datal">
                                    <div class="post-react">
                                        '. $content .'
                                        <span class="cmt-vote-up-'.$ansID .'">'. $voteUp .'</span> <i id="cmt-vote-up-'.$ansID .'" class="vote vote-up fal fa-angle-up"></i>
                                        <span class="cmt-vote-down-'.$ansID .'">'. $voteDown .'</span> <i id="cmt-vote-down-'.$ansID .'" class="vote vote-down fal fa-angle-down"></i>
                                        <span><i id="cmt-flag-'.$ansID.'" class="flag fal fa-flag"></i></span>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                    </div>';
                    mysqli_free_result($result2);
            }
        }else{
            echo '<div class="like" >
                    <div class="person">
                        <div class="con1">
                            <span>No comment!</span>
                         </div>
                    </div>
                </div>';
        }
        mysqli_free_result($result);
    }
?>