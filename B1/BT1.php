<?php 
if(isset($_REQUEST["username"]) || isset($_REQUEST["password"])){
	$a = fopen('ex.txt', 'w');
	fwrite($a,$_REQUEST['username']); 
	fwrite($a,$_REQUEST['password']);
	fclose($a);

	echo "lưu vào file thành công";
}else{


?>

<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="post">
	Username: <input type="text" id="username" name="username" maxlength="15" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" placeholder="Username" required> <br>

	E-Password: <input type="password" id="password" name="password" minlength="6" placeholder="Password" required> <br>
</form>
<form action="abc.php" method="post">
	<input type="submit" name="Submit1" value="Submit" >
</form>
		

</body>
</html>
<?php
}
?>



