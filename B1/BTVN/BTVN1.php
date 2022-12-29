<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
$nameErr = $ageErr = $emailErr = $adressErr = $phoneErr = $passwordErr = $jobErr ="";
$name = $age = $email = $adress = $phone = $password = $job = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["name"])){

		$nameErr = "<span style='color: red'>Vui lòng điền tên</span>";
	}else {
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
	}else {
		$password = test_input($_POST["password"]);
		if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
			$passwordErr = "<span style='color: red'>Password ít nhất 8 ký tự, có chứa 1 ký tự đặc biệt, chữ thường, chữ số, chữ hoa đầy đủ</span>";
		}
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if(!empty($name) && !empty($phone) && !empty($email) && !empty($password) && $nameErr==false && $emailErr==false && $passwordErr==false && $phoneErr==false){
echo "Họ và Tên : " . $_REQUEST["name"] . "<br>";
echo "tuổi : " . $_REQUEST["age"] . "<br>";
echo "Địa chỉ : " . $_REQUEST["adress"] . "<br>";
echo "Số điện thoại : " . $_REQUEST["phone"] . "<br>";
echo "Nghề nghiệp : " . $_REQUEST["job"] . "<br>";
echo "Email : " . $_REQUEST["email"] . "<br>";
echo "Password : ********" ;
}else{

?>

<form method="post" action="" >


   Tên: <br> <input type="text" id="name" name="name"> 
   <span> <?php echo $nameErr; ?>	</span> <br>

   Tuổi: <br> <input type="text" id="age" name="age"  >
   <span> <?php echo $ageErr; ?>	</span> <br>

   Địa chỉ: <br> <input type="text" id="adress" name="adress">
   <span> <?php echo $adressErr; ?>	</span> <br>

   Số điện thoại: <br> <input type="text" id="phone" name="phone">
   <span> <?php echo $phoneErr; ?>	</span> <br>

   Nghề nghiệp: <br> <input type="text" id="job" name="job">
   <span> <?php echo $jobErr; ?>	</span> <br>

   Email: <br> <input type="email" id="email" name="email">
   <span> <?php echo $emailErr; ?>	</span> <br>

   Password: <br> <input type="Password" id="password" name="password">
   <span> <?php echo $passwordErr; ?>	</span> <br> <br>

    <input type="submit" name="Submit1" value="Submit">    
</form>
<?php 
}
?>
</body>
</html>
