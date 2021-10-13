<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <header style="font-size: 50px;"><b>Extracting unique RGB values from list </b></header>
    <hr>
    <div class="quesitondetail">
        <div class="question">Vo van khanh khanh van vo ho trung nhan dinh hieu nghia vo van khanh vo van khanh vo van khanh vo van khanh vo van khanh vo van khanh vo van khanh vo van khanh vo van khanh voa </div>
        <br>
        <button style="width: 20px; height: 20px;" class="up1"><i class="vote fal fa-angle-up"></i></button> <br>
        <p class="stt">1</p>
        <button style="width: 20px; height: 20px;" class="down1"><i class="vote fal fa-angle-down"></i></button>
        <div style="width: 1300px; height: fit-content;background-color: #E8E8E8;">
            
             <!-- <textarea id="textarea1" class="input shadow" name="content-question" style="width: 1300px; height: 200px;
                   background-color: #E8E8E8;">
            khai niem duong cao toc duoc hieu the nao la dung
                 trung vit muon nam
                         vo van khanh
                                 dinh hieu nghia
                                          ho trung nhan
            </textarea> -->
            <p>C&aacute;ch d&ugrave;ng thẻ Ul kh&ocirc;ng c&oacute; k&iacute; hiệu ph&iacute;a trước</p>


        </div>
    </div>
    <h2 class="h2">All comment</h2>
    <div class="allcomment">
        <div class="comment_datel">
            <div class="like">
                <div class="person">
                    <div class="con1">
                    <header> <div>
                        <img src="gallery-1.jpg" width="30px" height="30px">
                        <p>vankhanh</p>
                        </div>
                        <div class="datal">
                            <div class="post-react">
                                 <p>hay phet</p>
                                <span>100 <i class="vote fal fa-angle-up"></i></span>
                                <span>100 <i class="vote fal fa-angle-down"></i></span>
                                <span>100 <i class="fal fa-comment"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>
                    </header>
                    </div>
                </div>
                <div class="reperson">
                     <div class="con1">
                    <header> <div>
                        <img src="gallery-1.jpg" width="30px" height="30px">
                        <p>vankhanh</p>
                        </div>
                        <div class="datal">
                            <div class="post-react">
                                 <p>hay phet</p>
                                <span>100 <i class="vote fal fa-angle-up"></i></span>
                                <span>100 <i class="vote fal fa-angle-down"></i></span>
                                <span><i class="flag fal fa-flag"></i></span>
                            </div>
                        </div>
                    </header>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="POST" style="width:1200px">
            <textarea name="comment" id="textarea1"></textarea>
            <div class="button-class">
                <button name="submit" type="submit"class="btn-submit">Post Your Answer</button>
            </div>
        </form>
    </div>

    <div class="share">
        Know someone who can answer? share a link to this <a href="">Question</a> , <a href="">Twitter</a>, or <a href="">Facebook</a> your answer
    </div>
    <script src="./assets/js/main.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('comment');
    </script>
</body>
</html>