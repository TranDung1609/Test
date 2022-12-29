
<!DOCTYPE html>
<html>
<body>

<form action="upload1.php" method="post" enctype="multipart/form-data">
  Chọn ảnh: <input type="file" name="fileToUpload" id="fileToUpload">

  <div class="btn-group" data-toggle="buttons">   
        <input type="radio" name="name" value="1" id="option1" >Ghi đè    
        <input type="radio" name="name" value="0" id="option2">Thêm file
    </div>

  <input type="submit" value="Upload ảnh" name="submit">

</form>
</body>
</html>
