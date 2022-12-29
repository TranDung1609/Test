<?php 
	$name = $password = $check = "";
	$nameErr = $passwordErr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["name"])){
			$nameErr = "<span style='color: red'>Vui lòng điền tên</span>";
		}else{
			$name = $_POST["name"];
			if(!preg_match("/^[a-zA-Z ]*$/",$name)){
				$nameErr = "<span style='color: red'>Họ tên chỉ có chữ và khoảng trắng</span>";
			}
		}

		if(empty($_POST["password"])){
			$passwordErr = "<span style='color: red'>Chưa điền mật khẩu</span>";
		}else{
			$password = $_POST["password"];
			if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
				$passwordErr = "<span style='color:red'>Password ít nhất 8 ký tự, có chứa 1 ký tự đặc biệt, chữ thường, chữ số, chữ hoa đầy đủ</span>";
			}
		}
	}
?>
<?php 
	if(!empty($name) && !empty($password) && $nameErr==false && $passwordErr==false){
		$name=$_POST['name'];
		$password=$_POST['password'];
		$a_check = (isset($_POST['check']));
		if ($a_check==1){
			$a = fopen('tt.txt', 'a');
			fwrite($a, "Tên : $name\rMật khẩu : $password \r\r");
			fclose($a);
	        echo "lưu vào file thành công";
		}else{
			echo "Họ và Tên : " .$_REQUEST["name"]."<br>";
			echo "Mật khẩu : " .$_REQUEST["password"]."<br>";
		}
	}else{
?>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">

	Tên: <br> <input type="text" id="name" name="name"> 
	<span> <?php echo $nameErr; ?>	</span> <br>

	Mật khẩu: <br> <input type="Password" id="password" name="password">
	<span> <?php echo $passwordErr; ?>	</span> <br> <br>

	Lưu thông tin đăng nhập:<input type="checkbox" name="check" value="1"><br>

	<input type="submit" name="Submit1" value="Submit" >
</form>
</body>
</html>
<?php
}
?>



