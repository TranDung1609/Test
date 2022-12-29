<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Trang đăng lý</title>
    </head>
    <body>
        <h1>Trang đăng ký thành viên</h1>
        <form action="xuly.php" method="POST">
                Tên đăng ký : <br>
                <input type="text" name="username" size="50" />
                <!-- <p class="error"><?php echo $usernameErr; ?> --><br>
                Mật khẩu : <br>
                <input type="text" name="password" size="50" />
                <!-- <p class="error"><?php echo $passwordErr; ?></p> --><br><br>
            <input type="submit" name="dangky" value="Đăng ký" />
            <br><br>
            <a href='dangnhap.php' class="button" title='Đăng nhập'>Đăng nhập</a> 
        </form>
    </body>
</html>
