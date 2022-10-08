<?php

require_once('db_connect.php');

session_start();

$errorMessage_name = '';
$errorMessage_pass = '';
$errorMessage = '';

if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        $errorMessage_name = 'ユーザー名が未入力です。';
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["password"])) {
        $errorMessage_pass = 'パスワードが未入力です。';
    }

    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        //ログイン名とパスワードのエスケープ処理
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);

        // ログイン処理開始
        $pdo = db_connect();

        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'データベースエラー' . $e->getMessage();
            die();
        }

        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // 入力された値と引っ張ってきた値が同じか判定
            if (password_verify($pass, $row['password'])) {
                // セッションに値を保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                // main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                $errorMessage = 'ユーザー名かパスワードに誤りがあります。';
            }
        } else {
            $errorMessage = 'ユーザー名かパスワードに誤りがあります。';
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
    <title>ログイン画面</title>
</head>
<body>
    <div class="login_title">
        <h1>ログイン画面</h1>
        <div class="regist"><a href="signUp.php">新規ユーザー登録</a></div>
    </div>
    <form action="login.php" method="post">
        <?php if($errorMessage_name) { echo '<span class="err">' . $errorMessage_name . '</span>'; }  ?>
        <input type="text" name="name" class="input" placeholder="ユーザー名"><br>
        <?php if($errorMessage_pass) { echo '<span class="err">' . $errorMessage_pass . '</span>'; } ?>
        <input type="password" name="password" class="input" placeholder="パスワード">
        <?php if($errorMessage) { echo '<span class="err">' . $errorMessage . '</span>'; } ?>
        <input type="submit" name="signUp" value="ログイン">
    </form>
</body>
</html>