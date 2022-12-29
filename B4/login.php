<?php
    //Nhúng file kết nối với database
    include('ketnoi.php');      
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
    $password = md5($password);

   if (isset($_POST['username']) || isset($_POST['password'])){
    $select = "SELECT name_user, password_user FROM amela.users where name_user=? and password_user=?";
    $sql = $conn->prepare($select);
    $sql->bindValue(1,$_POST['username']);
    $sql->bindValue(2,$_POST['password']);

    $sql->execute();
    $selected = $sql ->fetchAll();
    if ($_POST['username'] === $selected[0]['name_user'] && $_POST['password'] === $selected[0]['password_user']) {
        $_SESSION['name_user'] = $selected['name_user'];
        header("Location:comment.php");
    } else {
        // header("Location:dangnhap.php");
    }
}
?>