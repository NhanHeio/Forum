<?php
    
    function getDataIndex($index){
        $per_page_record = 10;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $start_from = ($page-1)*$per_page_record;
        if($index == ""){

            require 'connect.php';
            $sql = "SELECT * FROM `question` WHERE flag <= 15 ORDER BY voteUp DESC LIMIT $start_from, $per_page_record ;";
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
                                <a class="question-content" id="'. $queID .'" href="question.php?idQuestion='.$queID.'" >'. $r["topic"] .'</a>
                                <a class="question-author" >'. $r1["name"] .'</a>
                                <div class="post-react">
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .' </span><i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .' </span><i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
            }
            $query = "SELECT COUNT(*) FROM question";
            $rs_result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($rs_result);
            $sum = $row['0'];
            if($sum == 0 ){
                echo 'No question';
            }else{
                $total_pages = ceil($sum / $per_page_record);
                $page_link = "";
                echo '<ul class="page home-product-page">';
                echo '
                        <li class="page-item">';
                        if($page>=2){
                            echo '
                                <a href="index.php?page='.($page-1).'" class="page-item-link">
                                    <i class="page-item-icon fas fa-angle-left"></i>
                                </a>
                            </li>';
                        }
        
                        for ($i=1; $i<=$total_pages; $i++) {   
                            if ($i == $page) {   
                                $page_link = "<li class='page-item page-item-active'>
                                                <a href='index.php?page=".$i."' class='page-item-link'>".$i."</a>
                                            </li>";
                            }               
                            else  {
                                $page_link = "<li class='page-item'>
                                                <a href='index.php?page=".$i."' class='page-item-link'>".$i."</a>
                                            </li>";
                            }   
                            echo $page_link;
                        };
                        if($page<$total_pages){
                            echo '
                                <li class="page-item">
                                    <a href="index.php?page='.($page+1).'" class="page-item-link">
                                        <i class="page-item-icon fas fa-angle-right"></i>
                                    </a>
                                </li>';
                        }
                        echo '</ul>';
                    mysqli_free_result($result);
                    mysqli_free_result($result1);
                    mysqli_free_result($result2);
            }
        }
        // elseif($index == ""){

        // }
    }

    function load_question($id){
        require 'connect.php';
        // session_start();
        // if(isset($_GET["idQuestion"])){
            $idQuestion = $id;
            $sql = "SELECT * FROM `question` WHERE `queID` = '$idQuestion'";
            $result = mysqli_query($conn,$sql);
            $r= mysqli_fetch_assoc($result);
            // $_SESSION["voteUp"] = $r['voteUp'];
            // $_SESSION["topic"] = $r['topic'];
            // $_SESSION["content"] = $r['Content'];
            // $_SESSION["idQuestion"] = $r['queID'];
            echo '<div id="question-space" class="quesitondetail">
                        <div class="vote-area">
                            <i id="vote-up-'.$idQuestion .'" style="font-size:50px" class="vote fal fa-angle-up"></i> <br>
                            <span class="vote-up-'.$idQuestion .'" style="font-size:20px">'.$r["voteUp"].'</span><br>
                            <i id="vote-down-'.$idQuestion .'" style="font-size:50px" class="vote fal fa-angle-down"></i>
                        </div>
                        <div class="question"><span>'. $r["topic"] .'</span> </div>
                        <br>
                        <div style="width:max-width; height: fit-content;background-color: #E8E8E8; padding: 20px;">
                            '. $r["Content"] .'
                        </div>
                    </div>';
            mysqli_free_result($result);
        // }
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
                                    <img src="uploads/'.$r["avatar"].'.jpg" alt="Picture" width="30px" height="30px">
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