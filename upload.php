
<?php 
  session_start();
  require_once './php/connect.php';
  require './php/php_function.php';
  $_SESSION['index'];

$users = mysqli_query($conn,"SELECT * FROM user WHERE name = '".$_SESSION["name"]."' ");
      
  $user = mysqli_fetch_assoc($users);

?>
<?php

  function phpAlert($msg) {
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $tymp=substr($target_file,8,-4);
    $sql = " UPDATE user SET avatar='$tymp' WHERE name ='".$user['name']."'";
    mysqli_query($conn,$sql);
   
     header("Location: personal.php");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>