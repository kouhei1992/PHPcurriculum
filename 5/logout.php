<?php

require_once('function.php');

// セッション開始
session_start();

//セッションにuser_nameの値がなければlogin.phpにリダイレクト
check_user_logged_in();

// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 class="logout_title">ログアウト画面</h1>
    <p class="logout_mes">ログアウトしました</p class="logout_mes">
    <p class="logout_a"><a href="login.php">ログイン画面に戻る</a></p>
</body>
</html>