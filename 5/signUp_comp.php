<?php

//新規登録ページからの遷移以外はログインページへリダイレクト
if (empty($_SERVER['HTTP_REFERER'])) {
    header("Location: login.php");
} 

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>登録完了</title>
</head>
<body>
    <p class="comp_title">登録が完了しました</p>
    <p class="logout_a"><a href ="login.php">ログイン</a></p>
</body>
</html>