<?php
    require_once 'connect.php';
    if(isset($_POST['idQuestion'])){
        $idQuestion = substr($_POST['idQuestion'],3);
        $sql = "DELETE FROM `question` WHERE queID = '$idQuestion';";
        $execute = mysqli_query($conn,$sql);
    }
?>