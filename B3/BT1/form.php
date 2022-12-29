<?php
  require "form1.php";
  require "form2.php";
if (!empty($name) && !empty($gender) && $nameErr == false && $genderErr == false &&$uploadOk == 1) {
    echo "Họ và Tên : ".$_REQUEST["name"]."<br>";
    echo "tuổi : ".$_REQUEST["age"]."<br>";
    echo "Địa chỉ : ".$_REQUEST["adress"]."<br>";
    echo "Nghề nghiệp : ".$_REQUEST["job"]."<br>";
    echo "Giới tính : ".$_REQUEST["gender"]."<br>";
    echo "Giới thiệu : ".$_REQUEST["comment"]."<br>";
    echo "Avartar : ".$_FILES["fileToUpload"]["name"]."<br>";
    echo "<img src='".$target_file."' width='300'>";
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
  Tên: <br> <input type="text" id="name" name="name"> 
  <span> <?php echo $nameErr; ?>    </span> <br>
  Tuổi: <br> <input type="text" id="age" name="age"  >
  <span> <?php echo $ageErr; ?>    </span> <br>
  Địa chỉ: <br> <input type="text" id="adress" name="adress">
  <span> <?php echo $adressErr; ?>    </span> <br>
  Nghề nghiệp: <br> <input type="text" id="job" name="job">
  <span> <?php echo $jobErr; ?>    </span> <br>
  Giới tính:
  <input type="radio" name="gender" value="Nữ">Nữ
  <input type="radio" name="gender" value="Nam">Nam
  <input type="radio" name="gender" value="Khác">Khác
  <span class="error"> <?php echo $genderErr; ?> </span>
  <br> 
  Giới thiệu: <br><textarea name="comment" rows="5" cols="40"></textarea> <br>
  Avartar: <input type="file" name="fileToUpload" id="fileToUpload">
  <span class="error"> <?php echo $imErr; ?> </span> <br><br>
  <input type="submit" name="Submit1" value="Submit">    
</form>
</body>
</html>
    <?php
}//end if

