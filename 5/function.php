<?php

//セッションにuser_nameの値がなければlogin.phpにリダイレクト
function check_user_logged_in() {
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}

//不正防止
function redirect_main_unless_parameter($param) {
    if (empty($param)) {
        header("Location: main.php");
        exit;
    }
}

?>