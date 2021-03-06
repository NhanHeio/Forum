<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/css/reset.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- <link rel="stylesheet" href="./assets/css/button.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.green.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/texteditor.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Forum IT</title>
</head>
<body>
    
    <div id="main">
        
        <div class="grid" id="header">
            <div id="nav">
                <ul style="list-style-type: none">
                    <li id="name-forum"><span style="color:white">FORUM IT </span></li>
                    <li><i style="color:white; padding: 0 12px;" class="far fa-grip-lines-vertical"></i></li>
                    <li><a href="index.php">Trang ch???</a></li>
                    <li><a style="cursor:pointer;" onclick="post();">B??i vi???t m???i</a></li>
                    <li><a href="">Th??nh vi??n</a></li>
                </ul>
            </div>
            <div id="nav_right">
                <ul style="list-style-type: none">
                    <?php
                        if(isset($_SESSION["name"])&& $_SESSION['name']){                            
                            echo'
                            <li class="nav-user-item">
                            <img class="nav-avt" src="uploads/'.$_SESSION['avt'].'" alt="avt">
                            <span class="nav-user-name">'.$_SESSION['name'].'</span>
                                <ul class="name-user-hover" style="list-style-type: none;padding: 0;">
                                    <li class="name-user-item" ><a class="name-user-item-link" href="personal.php">Trang c?? nh??n</a></li>
                                    <li class="name-user-item" ><a class="name-user-item-link" href="./php/logout.php">????ng xu???t</a></li>
                                </ul>
                            </li>';
                        }else{
                            echo'<li><a href="sign.php">????ng nh???p</a></li>';
                        }
                   

                    ?>
                    <li class="search-button"><i class="icon_seach fal fa-search"></i>
                    </li>
                </ul>
                    <div id="search-place" class="class-none">
                        <form action="" method="post" onsubmit="return false">
                            <h5 style="margin:4px">Search</h5>
                            <hr>
                            <input style="display:block" class="search-input" type="text" placeholder="Search..." name="search_topic">
                            <label style="margin-left:10px" for="search_member">By:</label>
                            <input style="display:block" class="search-input" type="text" placeholder="Member" name="search_member">
                            <button id="search" style="float:right; margin-bottom:20px; margin-right:30px" name="submit" class="btn btn-primary">
                                Search
                            </button>
                            <button id="cancel-search" class="btn btn-cancel" style="float:right; margin-bottom:20px; margin-right:30px" >Cancel</button>
                        </form>
                        <div id="search-result">

                        </div>
                    </div>
                    
            </div>
        </div>
        
