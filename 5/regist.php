<?php

require_once('db_connect.php');

require_once('function.php');

session_start();

// セッションにuser_nameの値がなければlogin.phpにリダイレクト
check_user_logged_in();

$errorMessage_title = '';
$errorMessage_date = '';
$errorMessage_stock = '';

if (!empty($_POST)) {
    // タイトルが入力されていない場合の処理
    if (empty($_POST["title"])) {
        $errorMessage_title = 'タイトルが未入力です。';
    }
    // 発売日が入力されていない場合の処理
    if (empty($_POST["date"])) {
        $errorMessage_date = '発売日が未入力です。';
    }
    // 在庫数が入力されていない場合の処理
    if (empty($_POST["stock"]) && $_POST["stock"] != 0) {
        $errorMessage_stock = '在庫数が未入力です。';
    } elseif ($_POST["stock"] <= 0) {
        $errorMessage_stock = '在庫数の値が正しくありません。';
    }

    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST["stock"])) {
        //ログイン名とパスワードのエスケープ処理
        $title = $_POST['title'];
        $date = $_POST['date'];
        $stock = $_POST['stock'];

        // ログイン処理開始
        $pdo = db_connect();

        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = 'INSERT INTO books (title, date, stock) VALUES(:title, :date, :stock)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
            header("Location: books_comp.php");
            exit();
        } catch (PDOException $e) {
            echo 'データベースエラー' . $e->getMessage();
            die();
        }
    }    
}

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
    <h1>本 登録画面</h1>
    <form action="" method="post">
        <?php if($errorMessage_title) { echo '<span class="err">' . $errorMessage_title . '</span>'; }  ?>
        <input type="text" name="title" placeholder="タイトル"><br>
        <?php if($errorMessage_date) { echo '<span class="err">' . $errorMessage_date . '</span>'; } ?>
        <input type="text" name="date" placeholder="発売日">
        <h2>在庫数</h2>
        <?php if($errorMessage_stock) { echo '<span class="err">' . $errorMessage_stock . '</span>'; } ?>
        <input type="number" name="stock" placeholder="選択してください">
        <input type="submit" name="signUp" value="登録">
    </form>
</body>
</html>