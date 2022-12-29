<?php  
    //Nhúng file kết nối với database
    include('ketnoi.php');      
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
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
    //Lấy dữ liệu từ file dangky.php
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password)
    {
        header("Location:dangky.php");
        exit;
    }    
        // Mã khóa mật khẩu
        // $password = md5($password);
		  $sql = "INSERT INTO users (name_user,
		  password_user
		  )
		  VALUES ('$username', 
				'$password'
				)";
		  $conn->exec($sql);
		  $last_id = $conn->lastInsertId();
          header("Location:dangnhap.php");
		$conn = null;
?>