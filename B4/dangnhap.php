<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<?php 
include 'remember.php';
include 'login.php';
?>
<body> 
<form action='' class="dangnhap" method='POST'> 
Tên đăng nhập : <br>
<input type='text' name='username' /> <br>
Mật khẩu : <br>
<input type='password' name='password' /> <br>
<input type="checkbox" name="remember"> <a>Lưu thông tin đăng nhập</a><br><br>

<input type="submit" name="remove" value="Đăng xuất"><br><br>
<input type='submit' name="submit" id="submit" value='Đăng nhập' /> 
<br><br>
<a href='dangky.php' class="button" title='Đăng ký'>Đăng ký</a> 
<form> 
</body> 
</html>