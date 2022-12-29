<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

include "formTN1.php";
include "formTN2.php";

if(!empty($fileToUpload) &&!empty($comment) && $commentErr==false &&$uploadOk == 1){
	

echo "Nội dung : " . $_REQUEST["comment"] . "<br>";
echo "<img src='".$target_file."' width='300'>";

}

?>
<form action="" method="post" enctype="multipart/form-data">


   Nội dung: <textarea name="comment" rows="5" cols="40"></textarea> 
   <span> <?php echo $commentErr; ?>	</span> <br>

   Avartar: <input type="file" name="fileToUpload" id="fileToUpload">
   <span class="error"> <?php echo $imErr; ?> </span> <br><br>

    <input type="submit" name="Submit1" value="Submit">    
</form>
</body>
</html>
