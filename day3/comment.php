<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Bình luận</title>
</head>
<?php
//    include "Handles/Connection.php";
    include "Handles/GetComment.php";
//    if (isset($_SESSION['user_name'])){
//        header("Location:login.php");
//    }
?>
<body>


<div class="comment-container">
    <h1>Bình luận</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Bình luận của bạn:</label><br />
        <textarea name="content" title="Viết bình luận của bạn" placeholder="Bình luận của bạn...."></textarea><br />
        <label>Chọn ảnh: </label>
        <input type="file" name="img_cmt"><br />
        <input type="submit" name="post_cmt" value="Gửi bình luận">
    </form>

    <div class="show-comments">
        <?php
            foreach ($result1 as $key => $item){
                echo "
                <div style='display: flex'>
                    <img src='./UploadComments/".$item['img_description']."' style='width:50px; height:50px; margin: 10px; border-radius: 50%'>
                    <div style='margin: 10px; background-color: #DDD; border-radius: 5px;padding: 10px'>
                        <b>".$item['name']."</b>
                        <h5 style=''>".$item['content']."</h5>
                    </div>
                    
                </div>";
            }
        ?>
    </div>
</div>
</body>
</html>