<?php
session_start();
$sizeErr = "";
$username = '';
if (isset($_FILES["img_cmt"]["name"])) {
    $target_link = 'UploadComments/';
    $name_img = basename($_FILES["img_cmt"]["name"]);
    $target_file = $target_link . basename($_FILES["img_cmt"]["name"]);
    $size = $_FILES["img_cmt"]["size"];
    $ext = strtolower(pathinfo($target_link . $_FILES["img_cmt"]["name"], PATHINFO_EXTENSION));
    if (file_exists($target_link)) {
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            if ($size > 3 * 1024 * 1024) {
                $sizeErr = "kích thước ảnh không lớn hơn 3MB";
            } else {
                move_uploaded_file($_FILES["img_cmt"]["tmp_name"], $target_link . $_FILES["img_cmt"]["name"]);
            }
        }
    }
}

$host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
$dbname = "training"; //tên database sẽ kết nối đến
$username_db = "root"; //username để kết nối đến database
$password_db = ""; // mật khẩu để kết nối đến database
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username_db, $password_db);
//    echo "kết nối thành công";
} catch (PDOException $e) {
    echo "Thất bại";
}
if(isset($_SESSION['remember'])){
    $username =   $_SESSION['remember'];
    echo "remember";
}

$get_id = "SELECT id FROM training.users where user_name = ?";

$sql2 = $conn->prepare($get_id);
$sql2->bindValue(1,$username);
$sql2->execute();
$result2 = $sql2->fetchAll();
print_r($result2);
$idResult = $result2[0]['id'];
if(isset($_POST['content']) || isset($_POST['img_cmt'])){
    $content = $_POST['content'];
    $img_cmt = $_POST['img_cmt'];

    $insert_cmt = "INSERT INTO comments (content,img_description,user_id) VALUES ('$content', '$name_img','$idResult')";

    $statement = $conn->prepare($insert_cmt);
    $statement->execute();
}


$select_cmt = "SELECT  content, img_description FROM comments";
$sql = $conn->prepare($select_cmt);
$sql->execute();
$result = $sql->fetchAll();

$get_user = "SELECT name,content,img_description FROM training.comments as c INNER JOIN training.users as u ON c.user_id = u.id";

$sql1 = $conn->prepare($get_user);
$sql1->execute();
$result1 = $sql1->fetchAll();


