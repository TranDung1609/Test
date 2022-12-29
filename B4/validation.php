<?php
$usernameErr = $passwordErr = "";
$username = $password = "";
if(isset($_POST['username']) || isset($_POST['password'])){
    if(empty($_POST["name"])){
        $nameErr = "<span style='color: red'>Vui lòng điền tên</span>";
        }else{
        $name = test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                $nameErr = "<span style='color: red'>Họ tên chỉ có chữ và khoảng trắng</span>";
            }
        }

    if(empty($_POST["password"])){
            $passwordErr = "<span style='color: red'>Chưa điền mật khẩu</span>";
        }else{
            $password = test_input($_POST["password"]);
            if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
                $passwordErr = "<span style='color: red'>Password ít nhất 8 ký tự, có chứa 1 ký tự đặc biệt, chữ thường, chữ số, chữ hoa đầy đủ</span>";
            }
        }

}