<?php
$host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
$dbname = "training"; //tên database sẽ kết nối đến
$username_db = "root"; //username để kết nối đến database
$password_db = ""; // mật khẩu để kết nối đến database
$conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username_db, $password_db);

//$select = "SELECT user_name, password FROM training.users where user_name=? and password=?";
//$sql = $conn->prepare($select);
////$sql = $conn->query($select);
//$sql->bindValue(1,$_POST['username']);
//$sql->bindValue(2,$_POST['password']);
//
//$sql->execute();
//$selected = $sql ->fetchAll();
//print_r($selected);

//print_r($selected);
if (isset($_POST['username']) || isset($_POST['password'])){
    $select = "SELECT user_name, password FROM training.users where user_name=? and password=?";
    $sql = $conn->prepare($select);
    $sql->bindValue(1,$_POST['username']);
    $sql->bindValue(2,$_POST['password']);

    $sql->execute();
    $selected = $sql ->fetchAll();
    if ($_POST['username'] === $selected[0]['user_name'] && $_POST['password'] === $selected[0]['password']) {
        $_SESSION['user_name'] = $selected['user_name'];
        header("Location:comment.php");
    } else {
    }
}

