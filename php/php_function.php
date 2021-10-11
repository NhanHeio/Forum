<?php
    
    function getDataIndex(){
        require 'connect.php';
        $sql = "SELECT * FROM `question` ORDER BY voteUp DESC LIMIT 10;";
        $result = mysqli_query($conn, $sql);
        while($r = mysqli_fetch_assoc($result)){
            $author = $r["userID"];
            $queID = $r["queID"];
            $sql1 = "SELECT name from `user` where UserID = $author";
            $result1 = mysqli_query($conn, $sql1);
            $r1 = mysqli_fetch_assoc($result1);
            $sql2 = "SELECT COUNT(*) FROM `answer` WHERE queID = $queID";
            $result2 = mysqli_query($conn, $sql2);
            $r2 = mysqli_fetch_assoc($result2);
            echo'<div class="top-post-content">
                            <a href="">'. $r["topic"] .'</a>
                            <a href="">'. $r1["name"] .'</a>
                            <div class="post-react">
                                <span>'. $r["voteUp"] .' <i class="vote fal fa-angle-up"></i></span>
                                <span>'. $r["voteDown"] .' <i class="vote fal fa-angle-down"></i></span>
                                <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>';
        }
        mysqli_free_result($result);
        mysqli_free_result($result1);
        mysqli_free_result($result2);
    }
?>