<?php
    require 'connect.php';
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        if(substr($id, 0, 3)=="cmt"){
            if(substr($id,9,2)=="up"){
                $ansID = substr($id,12);
                $sql = "SELECT `voteUp` from `answer` WHERE `ansID`='$ansID'";
                $result = mysqli_query($conn,$sql);
                $r = mysqli_fetch_assoc($result);
                $vote = $r["voteUp"] +1;
                echo $vote;
                $query = mysqli_query($conn, "UPDATE `answer` SET `voteUp` = $vote WHERE `ansID`='$ansID'");
                mysqli_free_result($result);
                // mysqli_free_result($query);
                // echo "Vote Up Successfully!";
            }else{
                $ansID = substr($id,14);
                // echo $ansID;
                $sql = "SELECT `voteDown` from `answer` WHERE `ansID`='$ansID'";
                $result = mysqli_query($conn,$sql);
                $r = mysqli_fetch_assoc($result);
                $vote = $r["voteDown"] +1;
                echo $vote;
                $query = mysqli_query($conn, "UPDATE `answer` SET `voteDown` = $vote WHERE `ansID`='$ansID'");
                mysqli_free_result($result);
                // mysqli_free_result($query);
                // echo "Vote Down Successfully!";
            }
        }else{
            if(substr($id,5,2)=="up"){
                $queID = substr($id,8);
                $sql = "SELECT `voteUp` from `question` WHERE `queID`='$queID'";
                $result = mysqli_query($conn,$sql);
                $r = mysqli_fetch_assoc($result);
                $vote = $r["voteUp"] +1;
                echo $vote;
                $query = mysqli_query($conn, "UPDATE `question` SET `voteUp` = $vote WHERE `queID`='$queID'");
                mysqli_free_result($result);
                // mysqli_free_result($query);
                // echo "Vote Up Successfully!";
            }elseif(substr($id,5,4)=="down"){
                $queID = substr($id,10);
                $sql = "SELECT `voteDown` from `question` WHERE `queID`='$queID'";
                $result = mysqli_query($conn,$sql);
                $r = mysqli_fetch_assoc($result);
                $vote = $r["voteDown"] +1;
                echo $vote;
                $query = mysqli_query($conn, "UPDATE `question` SET `voteDown` = $vote WHERE `queID`='$queID'");
                mysqli_free_result($result);
                // mysqli_free_result($query);
                // echo "Vote Down Successfully!";
            }
        }
    }
?>