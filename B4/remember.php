<?php
session_start();
if(isset($_POST['username'])){
    if (!empty($_POST["remember"]) ) {
        setcookie("username", $_POST["username"], time()+ 1296000);
    } else {
        $_SESSION["remember"] = $_POST["username"];
    }
    if(!empty($_POST["remove"])){
        setcookie("username", $_POST["username"], time()+ -1);
        unset($_SESSION["remember"]);
    }
}
