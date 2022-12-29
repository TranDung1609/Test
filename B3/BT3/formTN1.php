<?php 
 $commentErr ="";
 $comment = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["comment"])) {
    $commentErr = "<span style='color: red'>Vui lòng viết giới thiệu bản thân</span>";
  } else {
    $comment = $_POST["comment"];
  }

}

?>