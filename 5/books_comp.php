<?php

require_once('function.php');

session_start();

//セッションにuser_nameの値がなければlogin.phpにリダイレクト
check_user_logged_in();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>本の登録完了</title>
</head>
<body>
    <p class="comp_title">本の登録が完了しました</p>
    <div class="comp_button">
        <p class="button_re"><a href ="regist.php">続けて登録</a></p>
        <p class="button_next"><a href ="main.php">在庫一覧</a></p>
    </div>
</body>
</html>