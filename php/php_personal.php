<?php
    
    function getDataIndex1($name1){
    
            
            require 'connect.php';
            $sql1= "SELECT * FROM user WHERE name = '$name1'";
            $result1 = mysqli_query($conn, $sql1);
            $r1 = mysqli_fetch_assoc($result1);
            $id = $r1['UserID'];
            $sql = "SELECT * FROM question where userID = '$id'";
            $result = mysqli_query($conn, $sql);
               while( $r = mysqli_fetch_assoc($result)){
                $author = $r["userID"];
                $queID = $r["queID"];
                $voteUp = $r["voteUp"];
                $voteDown = $r["voteDown"];
                $flag = $r["flag"];
                echo'<div class="top-post-content" style="width: 1000px; ">
                                <a class="question-content;"  id="'. $queID .'" style="width:33.33%; font-size: 15px; color: #0d6efd;" href="">'. $r["topic"] .'</a>
                                <a style="width:33.33%;text-align:center;" href=""></a>
                                <div style="width:50%;text-align:center; margin-top: 20px;  font-size: 15px;" class="post-react" >
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .' </span><i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .' </span><i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r["flag"] .' <i class="fal fa-comment"></i></span>
                                </div>
                     </div>';
            }
           
            mysqli_free_result($result);
           
        
    }