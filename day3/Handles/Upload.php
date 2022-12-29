<?php
$sizeErr = "";
if (isset($_FILES["avatar"]["name"])) {
    $target_link = 'Uploads/';
    $name_img = basename($_FILES["avatar"]["name"]);
    $target_file = $target_link . basename($_FILES["avatar"]["name"]);
    $size = $_FILES["avatar"]["size"];
    $ext = strtolower(pathinfo($target_link . $_FILES["avatar"]["name"], PATHINFO_EXTENSION));
    if (file_exists($target_link)) {
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            if ($size > 3 * 1024 * 1024) {
                $sizeErr = "kích thước ảnh không lớn hơn 3MB";
            } else {
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_link . $_FILES["avatar"]["name"]);
            }
        }
    }
}


$host = "localhost";
$dbname = "training";
$username_db = "root";
$password_db = "";
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username_db, $password_db);
//    echo "kết nối thành công";
} catch (PDOException $e) {
    echo "Thất bại";
}

if(isset($_POST['name']) || isset($_POST['username']) || isset($_POST['password']) || isset($_POST['age']) || isset($_POST['addresses']) || isset($_POST['job']) || isset($_POST['gender']) || isset($_POST['decription']) || isset($_POST['avatar'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $job = $_POST['job'];
    $gender = $_POST['gender'];
    $description = $_POST['decription'];
    $avatar = $_POST['avatar'];
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert = "INSERT INTO users (user_name, password,name, age, address, job, gender, description, avatar) VALUES ('$name', '$password','$username','$age','$address','$job','$gender','$description','$name_img')" ;

    $statement = $conn->prepare($insert);
    $statement->execute();
}


