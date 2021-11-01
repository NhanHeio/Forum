<?php
    // require_once 'pagination.class.php';
    require 'php_function.php';
    require 'connect.php';
    $per_page_record = 10;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start_from = ($page-1)*$per_page_record;
    if(isset($_POST["nameCategory"])){
        $_SESSION["nameCategory"] = $_POST["nameCategory"];
        if($_SESSION["nameCategory"] == 'category-all-post'){
            $sql = "SELECT * FROM `question` WHERE flag <= 15 ORDER BY voteUp DESC LIMIT $start_from, $per_page_record";
            $result0 = mysqli_query($conn, $sql);
            while($r = mysqli_fetch_assoc($result0)){
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
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>
                            ';
            }
            $query = "SELECT COUNT(*) FROM question";
        $rs_result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($rs_result);
        $sum = $row['0'];
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
        }elseif($_SESSION["nameCategory"] == 'category-new-post'){
            $sql = "SELECT * FROM `question` WHERE flag <= 15 ORDER BY `queID` DESC LIMIT $start_from, $per_page_record ;";
            $result0 = mysqli_query($conn, $sql);
            for($i=1;$i<=10;$i++){
                $r = mysqli_fetch_assoc($result0);
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
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
            }
            
        }elseif($_SESSION["nameCategory"] == 'category-hot-post'){
            $sql = "SELECT * FROM `question` WHERE flag <= 15 ORDER BY voteUp DESC LIMIT $start_from, $per_page_record ;";
            $result0 = mysqli_query($conn, $sql);
            for($i=1;$i<=10;$i++){
                $r = mysqli_fetch_assoc($result0);
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
                                    <span class="vote-up-'.$queID .'">'. $r["voteUp"] .'</span> <i id="vote-up-'.$queID .'" class="vote vote-up fal fa-angle-up"></i>
                                    <span class="vote-down-'.$queID .'">'. $r["voteDown"] .'</span> <i id="vote-down-'.$queID .'" class="vote vote-down fal fa-angle-down"></i>
                                    <span>'. $r2["COUNT(*)"] .' <i class="fal fa-comment"></i></span>
                                    <span><i id="flag-'.$queID.'" class="flag fal fa-flag"></i></span>
                                </div>
                            </div>';
                }
        }else{
            $sql = "SELECT * FROM `user` ORDER BY `UserID` LIMIT $start_from, $per_page_record";
            $result0 = mysqli_query($conn,$sql);
            $temp =mysqli_num_rows($result0);
            $i_max = ($temp < 10) ? $temp : 10;
            for($i=1;$i<=$i_max;$i++){
                $r = mysqli_fetch_assoc($result0);
                $userID = $r["UserID"];
                $sql1 = "SELECT COUNT(*) FROM `question` WHERE `userID` = $userID";
                $result1 = mysqli_query($conn,$sql1);
                $result2 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result0)>=1){

                    $r1 = mysqli_fetch_assoc($result1);
                    echo'<div class="top-post-content">
                                    <a class="question-content" style="width:50%" >'. $r["name"] .'</a>
                                    <div style="width:50%" class="post-react">
                                        <span>'. $r1["COUNT(*)"] .' Post</i></span>
                                    </div>
                                </div>';
                }else{
                    echo'<div class="top-post-content">
                                    <a class="question-content" style="width:50%" >'. $r["name"] .'</a>
                                    <div style="width:50%" class="post-react">
                                        <span>0 Post</i></span>
                                    </div>
                                </div>';
                }
            }
        }
        
            //     $i=0;
            //     $page_num = 1;
            //     do{
            //         echo '
            //         <li class="page-item page-item-active">
            //             <a class="page-item-link">'.$page_num.'</a>
            //         </li>';
            //         $page_num++;
            //         $i++;
            //     }while($i<=$page);
            // echo '
            //     <li class="page-item">
            //         <a href="" class="page-item-link">
            //             <i class="page-item-icon fas fa-angle-right"></i>
            //         </a>
            //     </li>
            // </ul>
            // ';
            mysqli_free_result($result0);
            mysqli_free_result($result1);
            mysqli_free_result($result2);
    }
?>