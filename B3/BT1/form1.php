<?php 
	$nameErr = $ageErr = $emailErr = $adressErr = $phoneErr = $passwordErr = $jobErr = $genderErr = $commentErr = $imErr ="";
	$name = $age = $email = $adress = $phone = $password = $job = $gender = $comment = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["name"])){
		$nameErr = "<span style='color: red'>Vui lòng điền tên</span>";
		}else{
		$name = test_input($_POST["name"]);
			if(!preg_match("/^[a-zA-Z ]*$/",$name)){
				$nameErr = "<span style='color: red'>Họ tên chỉ có chữ và khoảng trắng</span>";
			}
		}

		if(empty($_POST["age"])){
			$ageErr = "<span style='color: red'>Vui lòng điền tuổi</span>";
		}else {
			$age = test_input($_POST["age"]);
			if(!preg_match("/^[0-9]*$/",$age)){
				$ageErr = "<span style='color: red'>Vui lòng nhập số</span>";
			}
		}

		if(empty($_POST["adress"])){
		$adressErr = "<span style='color: red'>Vui lòng điền địa chỉ</span>";
		}

		if(empty($_POST["phone"])){
			$phoneErr = "<span style='color: red'>Vui lòng điền số điện thoại</span>";
		}else {
			$phone = test_input($_POST["phone"]);
			if(!preg_match("/^[0-9]{10}+$/",$phone)){
				$phoneErr = "<span style='color: red'>Số điện thoại gồm 10 số</span>";
			}
		}

		if(empty($_POST["job"])){
			$jobErr = "<span style='color: red'>Chưa điền nghề nghiệp</span>";
		}

		if(empty($_POST["email"])){
			$emailErr = "<span style='color: red'>Chưa điền email</span>";
		}else{
			$email = test_input($_POST["email"]);
			if (!preg_match("/([a-zA-Z0-9!#$%&’?^_`~-])+@([a-zA-Z0-9-])+(.com)+/",$email)) {
			$emailErr = "<span style='color: red'>Vui lòng điền đúng Email</span>";
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
		if (empty($_POST["gender"])){
    		$genderErr = "<span style='color: red'>Vui lòng chọn giới tính</span>";
  		}else{
    		$gender = test_input($_POST["gender"]);
  		}

  		if(empty($_POST["comment"])){
    		$commentErr = "<span style='color: red'>Vui lòng viết giới thiệu bản thân</span>";
		}else{
    		$comment = test_input($_POST["comment"]);
		}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>