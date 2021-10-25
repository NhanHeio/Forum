<?php
    require 'connect.php';
    if(isset($_POST["idFlag"])){
        $id = $_POST["idFlag"];
        // echo $id;
        if(substr($id, 0, 3) == "cmt"){
            $ansID = substr($id,9);
            $sql = "SELECT `flag` FROM `answer` WHERE `ansID` = '$ansID'";
            $result = mysqli_query($conn,$sql);
            $r = mysqli_fetch_assoc($result);
            // $userID = $r['userID'];
            $flag = $r['flag'] + 1;
            if($flag < 15){
                $query = mysqli_query($conn,"UPDATE `answer` SET `flag` = '$flag' WHERE `ansID` = '$ansID'");
            }else{
                $query = mysqli_query($conn,"DELETE FROM `answer` WHERE `ansID` = '$ansID'");
            }
            // $query = mysqli_query($conn,"INSERT INTO `flag_detail` VALUES($queID, 'answer', $userID)");
            echo "Flag Successfully!";
            mysqli_free_result($result);
        }else{
            $queID = substr($id,5);
            $sql = "SELECT `flag` FROM `question` WHERE `queID` = '$queID'";
            $result = mysqli_query($conn,$sql);
            $r = mysqli_fetch_assoc($result);
            // $userID = $r['userID'];
            $flag = $r['flag'] + 1;
            $query = mysqli_query($conn,"UPDATE `question` SET `flag` = '$flag' WHERE `queID` = '$queID'");
            // $query = mysqli_query($conn,"INSERT INTO `flag_detail` VALUES($queID, 'question', $userID)");
            echo "Flag Successfully!";
            mysqli_free_result($result);
            // mysqli_free_result($query);
        }
    }
?>