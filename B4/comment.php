<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bình luận</title>
</head>
<?php
    include "commentex.php";
?>
<body>
<div class="comment-container">
    <h1>Bình luận</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Bình luận của bạn:</label><br />
        <textarea name="content" title="Viết bình luận của bạn" placeholder="Bình luận của bạn...."></textarea><br><br />
        <label>Chọn ảnh: </label>
        <input type="file" name="img_cmt"><br /><br>
        <input type="submit" name="post_cmt" value="Gửi bình luận">
    </form>

    <div class="show-comments">
        <?php
            foreach ($result1 as $key => $item){
                echo "
                <div style='display: flex'>
                    
                    <div style='margin: 10px; background-color: #DDD; border-radius: 5px;padding: 10px'>
                        <b>".$item['name_user']."</b>
                        <h5 style=''>".$item['comment']."</h5>
                    </div>
                    <img src='./uploads/".$item['comment_img']."' style='width:50px; height:50px; margin: 10px'><br>
                </div>";
            }
        ?>
    </div>
</div>
</body>
</html>