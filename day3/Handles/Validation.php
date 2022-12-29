<?php
    $nameErr = $ageErr = $addressErr = $jobErr = $genderErr = $decriptionErr = $avatarErr = "";
    $name = $age = $address = $job = $gender = $decription = "";
    $flag = false;
if (isset($_POST['name']) || isset($_POST['age']) || isset($_POST['address']) || isset($_POST['job']) ||isset($_POST['gender']) || isset($_POST['decription']) || isset($_POST['avatar'])) {
    if (empty($_POST['name'])) {
        $nameErr = "Bạn chưa nhập tên";
    } else {
        if (!preg_match('/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/', $_POST['name'])) {
            $nameErr = "Tên chỉ chứa ký tự từ a-z";
        } else {
            $name = $_POST['name'];
        }
    }

    if (empty($_POST['age'])) {
        $ageErr = "Bạn chưa nhập tuổi";
    } else {
        if (!preg_match('/^([0-9]*)$/', $_POST['age'])) {
            $ageErr = "Tuổi chỉ là số từ 0-9";
        } else {
            $age = $_POST['age'];
        }
    }

    if (empty($_POST['address'])) {
        $addressErr = "Bạn chưa nhập địa chỉ";
    } else {
        $address = $_POST['address'];
    }

    if (empty($_POST['job'])) {
        $jobErr = "Bạn chưa nhập nghề nghiệp";
    } else {
        $job = $_POST['job'];
    }

    if (empty($_POST['gender'])) {
        $gendersErr =  "Vui lòng chọn giới tính";
    } else {
        $gender = $_POST['gender'];
    }
    if (empty($_POST['decription'])) {
        $decriptionErr =  "Vui lòng giới thiệu";
    } else {
        $decription = $_POST['decription'];
    }


}


$usernameErr = $passwordErr = "";
$username = $password = "";
if(isset($_POST['username']) || isset($_POST['password'])){
    if(empty($_POST['username'])){
        $usernameErr = "Bạn chưa nhập tài khoản";
    }else{
        if(!preg_match('/^[a-zA-Z0-9]/', $_POST['username'])){
            $usernameErr = "Tài khoản chỉ có ký tự từ a-z và 0-9";
        }else{
            $username = $_POST['username'];
        }
    }

    if(empty($_POST['password'])){
        $passwordErr = "Bạn chưa nhập mật khẩu";
    }else{
        if (!preg_match('/^([A-Z]){1}([\w_\.!@#$%^&*()]+)/', $_POST['password'])) {
            $passwordErr = "Mật khẩu phải viết hoa chữ cái đầu, chứa sô từ 0-9 và ít nhất một ký tự đặc biệt";
        }
        if (strlen($_POST['password']) < 8) {
            $passwordErr = "Mật khẩu ít nhất có 8 ký tự";
        } else {
            $password = $_POST['password'];
        }
    }

}