<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Đăng nhập</title>
</head>
<?php
include 'Handles/Remember.php';
include 'Handles/Validation.php';
include 'Handles/Connection.php';
?>
<body>

<div class="login-container">
    <form action="" method="post">
        <h1>Đăng nhập</h1>
        <div class="rows">
            <label>Tên đăng nhập <a>*</a></label>
            <input type="text" name="username" placeholder="Tên đăng nhập.....">
        </div>
        <p class="error"><?php echo $usernameErr?></p>
        <div class="rows">
            <label>Mật khẩu <a>*</a></label>
            <input type="text" name="password" placeholder="Mật khẩu.....">
        </div>
        <p class="error"><?php echo $passwordErr?></p>
        <input type="checkbox" name="remember"> <a>Lưu thông tin đăng nhập</a><br />
        <input type="submit" name="remove" value="logout">
        <input type="submit" name="submit" value="Đăng nhập">
    </form>
</div>
</body>
</html>
