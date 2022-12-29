<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Đăng ký</title>
</head>
<?php
include 'Handles/Validation.php';
include 'Handles/Upload.php';

if (isset($name_img)) {
    $link = fopen("Accounts\ $name.txt", 'w');
    fwrite($link, "Tên: $name\rTài khoản: $username\rMật khẩu: $password\rTuổi: $age\rĐịa chỉ: $address\rNghề nghiệp: $job\rGiới tính: $gender\rGiới thiệu: $decription\rAvatar: $name_img");
    fclose($link);
}
?>

<body>
<div class="container">
    <form method="post" action="" enctype="multipart/form-data">
        <h1>Đăng ký</h1><br/>
        <label>Họ tên <a>*</a></label>
        <input type="text" name="name" placeholder="Họ tên.....">
        <p class="error"><?php echo $nameErr; ?></p><br/>
        <label>Tên tài khoản <a>*</a></label>
        <input type="text" name="username" placeholder="Tên tài khoản.....">
        <p class="error"><?php echo $usernameErr; ?></p><br/>
        <label>Mật khẩu <a>*</a></label>
        <input type="text" name="password" placeholder="Mật khẩu.....">
        <p class="error"><?php echo $passwordErr; ?></p><br/>
        <label>Tuổi <a>*</a></label>
        <input type="text" name="age" placeholder="Tuổi......">
        <p class="error"><?php echo $ageErr; ?></p><br/>
        <label>Địa chỉ <a>*</a></label>
        <input type="text" name="address" placeholder="Địa chỉ......">
        <p class="error"><?php echo $addressErr; ?></p><br/>
        <label>Nghề nghiệp <a>*</a></label>
        <input type="text" name="job" placeholder="Nghề nghiệp......">
        <p class="error"><?php echo $jobErr; ?></p><br/>
        <label>Giới tính <a>*</a></label>
        <input type="radio" name="gender" value="Nam" >Nam
        <input type="radio" name="gender" value="Nữ">Nữ
        <input type="radio" name="gender" value="Chưa phải lúc này" checked>Chưa phải lúc này
        <p class="error"><?php echo $genderErr; ?></p><br/>
        <label>Giới thiệu bản thân <a>*</a>:</label><br/>
        <textarea name="decription"></textarea>
        <p class="error"><?php echo $decriptionErr; ?></p><br/>
        <label>Ảnh đại diện <a>*</a></label>
        <input type="file" name="avatar"><br/>
        <p class="error"><?php echo $avatarErr; ?></p>
        <img src="upload/<?php echo $name_img; ?>" class="show-avatar"><br/>
        <input type="submit" name="submit" value="Đăng ký">
        <a href=".\login.php" >Đăng nhập</a>
    </form>
</div>

</body>
</html>
