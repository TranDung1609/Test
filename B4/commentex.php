<?php
session_start();
$sizeErr = "";
$username = '';
if (isset($_FILES["img_cmt"]["name"])) {
    $target_link = 'uploads/';
    $name_img = basename($_FILES["img_cmt"]["name"]);
    $target_file = $target_link . basename($_FILES["img_cmt"]["name"]);
    $size = $_FILES["img_cmt"]["size"];
    $ext = strtolower(pathinfo($target_link . $_FILES["img_cmt"]["name"], PATHINFO_EXTENSION));
    if (file_exists($target_link)) {
        if (in_array($ext, ['jpg', 'png'])) {
            if ($size > 5 * 1024 * 1024) {
                
            } else {
                move_uploaded_file($_FILES["img_cmt"]["tmp_name"], $target_link . $_FILES["img_cmt"]["name"]);
            }
        }
    }
}

include('ketnoi.php');

if(isset($_SESSION['remember'])){
    $username =   $_SESSION['remember'];
    // echo "remember";
}

$get_id = "SELECT id_user FROM amela.users where name_user = ?";
$sql2 = $conn->prepare($get_id);
$sql2->bindValue(1,$username);
$sql2->execute();
$result2 = $sql2->fetchAll();
// print_r($result2);
$idResult = $result2[0]['id_user'];
if(!empty($_POST['content']) || !empty($_POST['img_cmt'])){
    $content = $_POST['content'];
    $img_cmt = $_POST['img_cmt'];

    $insert_cmt = "INSERT INTO comments (comment,comment_img,id_user) VALUES ('$content', '$name_img','$idResult')";

    $statement = $conn->prepare($insert_cmt);
    $statement->execute();
}


$select_cmt = "SELECT  comment, comment_img FROM comments";
$sql = $conn->prepare($select_cmt);
$sql->execute();
$result = $sql->fetchAll();

$get_user = "SELECT name_user,comment,comment_img FROM amela.comments as a INNER JOIN amela.users as b ON a.id_user = b.id_user";

$sql1 = $conn->prepare($get_user);
$sql1->execute();
$result1 = $sql1->fetchAll();


