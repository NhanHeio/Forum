<?php
    require 'connect.php';
    session_start();
    if(isset($_POST["idQuestion"])){
        $idQuestion = $_POST["idQuestion"];
        $sql = "SELECT * FROM `question` WHERE `queID` = '$idQuestion'";
        $result = mysqli_query($conn,$sql);
        $r= mysqli_fetch_assoc($result);
        $_SESSION["voteUp"] = $r['voteUp'];
        $_SESSION["topic"] = $r['topic'];
        $_SESSION["content"] = $r['Content'];
        $_SESSION["idQuestion"] = $r['queID'];
        mysqli_free_result($result);
    }
?>