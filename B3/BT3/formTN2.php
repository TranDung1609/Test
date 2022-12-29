<?php
$imErr= "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Kiểm tra kích thước
if ($_FILES["fileToUpload"]["size"] > 5242880) {
  // echo "Ảnh không được vượt quá 5MB.";
  $uploadOk = 0;
}
 
//Kiểm tra định dạng
if($imageFileType != "jpg" && $imageFileType != "png") {
  // echo "Ảnh phải định dạng .JPG hoặc .PNG.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  $imErr= "<span style='color: red'>Ảnh phải  nhỏ hơn 5MB và có định dạng .JPG và .PNG</span>";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " Đã được tải lên.";
    $image= $_FILES["fileToUpload"]["name"];
  }
}
?>