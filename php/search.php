<?php
    require 'connect.php';
    $topic = ($_POST['topic']);
    $member = ($_POST['author']);
    $sql = "SELECT * FROM `question` WHERE (`tags` LIKE '%$topic%') OR (`topic` LIKE '%$topic%') ORDER BY voteUp DESC LIMIT 3;";
    $result = mysqli_query($conn,$sql);
    echo '<p>Search result: </p>';
    while($r = mysqli_fetch_assoc($result)){
        $author = $r["userID"];
        $queID = $r["queID"];
        $sql1 = "SELECT name from `user` where UserID = $author";
        $result1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_assoc($result1);
        echo'
                <a style="text-decoration:none;display:block;width:100%;padding: 5px 0;" class="question-content" id="'. $queID .'" href="question.php?idQuestion='.$queID.'">'. $r["topic"] .'</a>
            ';
    }
    mysqli_free_result($result);
?>