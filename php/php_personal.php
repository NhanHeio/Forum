<?php
    
    function getDataIndex1($id){
    
            
            require 'connect.php';
            $sql1= "SELECT * FROM user WHERE UserID = '$id'";
            $result1 = mysqli_query($conn, $sql1);
            $r1 = mysqli_fetch_assoc($result1);
            
            $sql = "SELECT * FROM question where userID = '$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while( $r = mysqli_fetch_assoc($result)){
                 $author = $id;
                 $queID = $r["queID"];
                 $voteUp = $r["voteUp"];
                 $voteDown = $r["voteDown"];
                 $flag = $r["flag"];
                 echo'<div class="top-post-content" style="width: 1000px; ">';
                 if($flag <=15){
                     echo'<a class="question-content;"  id="'. $queID .'" style="width:33.33%; font-size: 15px; color: #0d6efd;" href="question.php?idQuestion='.$queID.'">'. $r["topic"] .'</a>
                     <button id="btn'. $queID .'" class="btn btn-delete" style="background-color: red; height:80%;">Xóa</button>';     
                 }else{
                     echo'<a class="question-content;"  id="'. $queID .'" style="width:33.33%; font-size: 15px; color: #0d6efd;" href="question.php?idQuestion='.$queID.'">'. $r["topic"] .'</a>
                     <a  class="question-content;" style=" font-size: 15px; color: red;"><b>Bài viết sẽ không hiển thị với người khác do bị báo cáo quá nhiều.</b></a>
                     <button id="btn'. $queID .'" class="btn btn-delete" style="background-color: red; height:80%;">Xóa</button>'; 
                 }  
                 echo'</div>';
            }
            }else{
                echo'<p>Chưa có bài viết</p>';
            }
           
            mysqli_free_result($result);
           
        
    }

    function getDataAdmin(){
    
            
        require 'connect.php';
        
        $sql = "SELECT * FROM question";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while( $r = mysqli_fetch_assoc($result)){
             
             $queID = $r["queID"];
             $voteUp = $r["voteUp"];
             $voteDown = $r["voteDown"];
             $flag = $r["flag"];
             echo'<div class="top-post-content" style="width: 1000px; ">';
             if($flag <=15){
                 echo'<a class="question-content;"  id="'. $queID .'" style="width:33.33%; font-size: 15px; color: #0d6efd;" href="question.php?idQuestion='.$queID.'">'. $r["topic"] .'</a>
                 <button id="btn'. $queID .'" class="btn btn-delete" style="background-color: red; height:80%;">Xóa</button>';     
             }else{
                 echo'<a class="question-content;"  id="'. $queID .'" style="width:33.33%; font-size: 15px; color: #0d6efd;" href="question.php?idQuestion='.$queID.'">'. $r["topic"] .'</a>
                 <a  class="question-content;" style=" font-size: 15px; color: red;"><b>Bài viết sẽ không hiển thị với người khác do bị báo cáo quá nhiều.</b></a>
                 <button id="btn'. $queID .'" class="btn btn-delete" style="background-color: red; height:80%;">Xóa</button>'; 
             }  
             echo'</div>';
        }
        }else{
            echo'<p>Chưa có bài viết</p>';
        }
       
        mysqli_free_result($result);
       
    
}