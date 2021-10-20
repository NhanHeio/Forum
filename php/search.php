<?php
    require 'connect.php';
    $topic = addslashes($_GET['search_topic']);
    $member = addslashes($_GET['search_member']);
    $sql = "SELECT * FROM `question` WHERE (`tags` LIKE '%$topic%') OR (`topic` LIKE '%$topic%') ORDER BY voteUp DESC;";
    $result = mysqli_query($conn,$sql);
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
                            <a style="width:33.33%" href="">'. $r1["name"] .'</a>
                            <div style="width:33.33%" class="post-react">
                                <span>'. $r["voteUp"] .' <i class="vote fal fa-angle-up"></i></span>
                                <span>'. $r["voteDown"] .' <i class="vote fal fa-angle-down"></i></span>
                                <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>';
        }
?>