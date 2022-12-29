<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký thành viên</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="nền tảng, nen tang, học web, html5, html, css, js, hoc web can ban, học web căn bản" />
  <meta name="description" content="Cung cấp nền tảng kiến thức căn bản về lập trình web HTML5, CSS3, JS" />
</head>
<body>
  <?php
        // đếm số lần truy cập
    $count_page = ("log.txt");
    $hits = file($count_page);
    $hits[0] ++;

    $fp = fopen($count_page , "w");
    fputs($fp , "$hits[0]");
    fclose($fp);
    echo "Số lượt truy cập:". $hits[0] . "";

    ?>

  <?php
           // Code PHP xử lý validate
           $name = $tuoi = $diachi = $sodienthoai = $nghenghiep = $email = $matkhau = "";
           $error_name = $error_sodienthoai = $error_email = $error_matkhau ="";

           if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Kiểm tra định dạng dữ liệu 
            if (empty($_POST['txtHoTen'])){
                $error_name = "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span>";
                $name = 0;
            }else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $error_name = "<span style='color:red;'>Chỉ điền chữ cái và khoảng trắng.</span>";
                $name = 0;
              }else{
                $name = 1;
              }
            if (empty($_POST['txtSoDienThoai'])){
                $error_sodienthoai = "<span style='color:red;'>Error: bạn chưa nhập số điện thoại.</span>";
            }else{
              $sodienthoai = test_input($_POST['txtSoDienThoai']);
              if(!preg_match('/^[0-9]{10}+$/', $sodienthoai)){
                $error_sodienthoai = "Số điện thoại Nhập 10 số trở lên xxxxxxxxxx";
              }
            }
            if (empty($_POST['txtMatKhau'])){
                $error_matkhau = "<span style='color:red;'>Error: Bạn chưa nhập mật khẩu.</span>";
            }else{
              $matkhau = test_input($_POST['txtMatKhau']);
              if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $matkhau)){
                $error_matkhau = "Mật khẩu ít nhất 8 ký tự, có chứa 1 ký tự đặc biệt, chữ thường, chữ số, chữ hoa";
              }
            }
            if (empty($_POST['txtEmail'])){
                $error_email = "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span>";
            }else{
              $email = test_input($_POST['txtEmail']);

              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Invalid email";
              }
            }
          }  
          
          function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        ?>
  <?php
  if (!empty($name) && !empty($sodienthoai) && !empty($email) && !empty($matkhau)){
            $sdt =$_POST['txtSoDienThoai'];
           $file_sdt = $sdt.'.txt';
            if (file_exists($file_sdt)) {
              $myfile = fopen($file_sdt, "w") or die("Unable to open file!");
              $txt = " Tên: ".$_POST["txtHoTen"]."\n Tuổi: ".$_POST["numTuoi"]."\n Địa chỉ: ".$_POST["txtDiaChi"]."\n Số điện thoại: ".$_POST["txtSoDienThoai"]."\n Nghề nghiệp: ".$_POST["txtNgheNghiep"]."\n Email: ".$_POST["txtEmail"]."\n Password: ********";
              fwrite($myfile, $txt);
              fclose($myfile);
            }else{
              $myfile = fopen($file_sdt, "x") or die("Unable to open file!");
              $txt = " Tên: ".$_POST["txtHoTen"]."\n Tuổi: ".$_POST["numTuoi"]."\n Địa chỉ: ".$_POST["txtDiaChi"]."\n Số điện thoại: ".$_POST["txtSoDienThoai"]."\n Nghề nghiệp: ".$_POST["txtNgheNghiep"]."\n Email: ".$_POST["txtEmail"]."\n Password: ********";
              fwrite($myfile, $txt);
              fclose($myfile);
            }
              
          }else{
            ?>
  <h1>Đăng ký Thành viên</h1>

  <form name="frmDangKyThanhVien" id="frmDangKyThanhVien" method="post" action="#" enctype="multipart/form-data">
    <table border="1" width="800px" cellspacing="0" cellpadding="10px">
      <!-- Họ tên row - Start -->
      <tr>
        <td width="100px">
          <label for="txtHoTen">Họ tên:</label>
        </td>
        <td>
          <input type="text" name="txtHoTen" id="txtHoTen" value="" 
            placeholder="Vui lòng nhập Họ tên" autofocus="autofocus" title="Nhập họ tên phải viết hoa toàn bộ" />
            <?php echo $error_name; ?>
        </td>
      </tr>
      <!-- Họ tên row - End -->

      <!-- Banner row - Start -->
      <tr>
        <td width="100px">
          <label for="txtBanner">Ảnh Banner</label>
        </td>
        <td>
          <input type="file" id="myfile" name="myfile">
        </td>
      </tr>
      <!-- Banner row - End -->

      <!-- Tuổi row - Start -->
      <tr>
        <td>
          <label for="numTuoi">Tuổi:</label>
        </td>
        <td>
          <input type="number" name="numTuoi" id="numTuoi" min="15" max="80" step="1" value="20" />
        </td>
      </tr>
      <!-- Tuổi row - End -->

      <!-- Địa chỉ row - Start -->
      <tr>
        <td width="100px">
          <label for="txtDiaChi">Địa chỉ:</label>
        </td>
        <td>
          <input type="text" name="txtDiaChi" id="txtDiaChi" value="" 
            placeholder="Vui lòng nhập Địa Ch" autofocus="autofocus" title="Nhập Địa chỉ phải viết hoa toàn bộ" />

        </td>
      </tr>
      <!-- Địa chỉ row - End -->

      <!-- Nhập số Điện thoại row - Start -->
      <tr>
        <td>
          <label for="txtSoDienThoai">Số điện thoại:</label>
        </td>
        <td>
          <input type="tel" name="txtSoDienThoai" id="txtSoDienThoai"  title="Định dạng là nhập là: Nhập 10 số trở lên xxxxxxxxxx" />
            <?php echo $error_sodienthoai; ?>

        </td>
      </tr>
      <!-- Nhập số Điện thoại row - End -->

      <!-- Nghề nghiệp row - Start -->
      <tr>
        <td width="100px">
          <label for="txtNgheNghiep">Nghề nghiệp:</label>
        </td>
        <td>
          <input type="text" name="txtNgheNghiep" id="txtNgheNghiep" value="" 
            placeholder="Vui lòng nhập Nghề nghiệp" autofocus="autofocus" title="Nhập Nghề nghiệp phải viết hoa toàn bộ" />
        </td>
      </tr>
      <!-- Nghề nghiệp row - End -->
      
      <!-- Email liên hệ row - Start -->
      <tr>
        <td>
          <label for="txtEmail">Email có thể liên hệ:</label>
        </td>
        <td>
          <input type="email" name="txtEmail" id="txtEmail" required="true" />
            <?php echo $error_email; ?>

        </td>
      </tr>
      <!-- Email liên hệ row - End -->
      
      <!-- Mật khẩu row - Start -->
      <tr>
        <td>
          <label for="txtMatKhau">Mật khẩu:</label>
        </td>
        <td>
          <input type="password" name="txtMatKhau" id="txtMatKhau" value="" 
            placeholder="Vui lòng nhập Mật khẩu" maxlength="32" />
            <?php echo $error_matkhau; ?>

        </td>
      </tr>
      <!-- Mật khẩu row - End -->
      

      <!-- Nút bấm row - Start -->
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="btnDangKy" id="btnDangKy" value="Đăng ký" />
        </td>
      </tr>
      <!-- Nút bấm row - End -->

    </table>
  </form>

</body>

</html>
  <?php
}
?>

