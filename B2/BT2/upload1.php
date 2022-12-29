<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Kiểm tra kích thước
if ($_FILES["fileToUpload"]["size"] > 5242880) {
  echo "Ảnh không được vượt quá 5MB.";
  $uploadOk = 0;
}
 
//Kiểm tra định dạng
if($imageFileType != "jpg" && $imageFileType != "png") {
  echo "Ảnh phải định dạng .JPG hoặc .PNG.";
  $uploadOk = 0;
}

//Kiểm tra xem tệp hình ảnh là hình ảnh thật hay hình ảnh giả mạo
if(isset($_POST["submit"]) && $_POST['name']==1) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
  //kiểm tra tệp đã tồn tại chưa
  if (file_exists($target_file)) {
  echo "Xin lỗi. Ảnh đã tồn tại";
  $uploadOk = 0;
}

//nếu mọi thứ đều ổn, hãy thử tải tệp lên
}else {
  if ($uploadOk == 1) {
  	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $image= $_FILES["fileToUpload"]["name"];
    echo "Tải ảnh lên thành công";
  } 
}

if ($uploadOk == 0) {
  echo "Ảnh không được tải lên.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " Đã được tải lên.";
    $image= $_FILES["fileToUpload"]["name"];
  }
}
?>