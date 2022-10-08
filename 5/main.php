<?php

require_once('db_connect.php');

require_once('function.php');

// セッション開始
session_start();

//セッションにuser_nameの値がなければlogin.phpにリダイレクト
check_user_logged_in();

$pdo = db_connect();

try {
    $sql = 'SELECT * FROM books';
    $stmt = $pdo -> query($sql);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>在庫一覧</title>
</head>
<body>
    <div class="main">
        <h1 class="main_title">在庫一覧画面</h1>
        <div class="main_button">
            <div class="books_regist"><a href="regist.php">新規登録</a></div>
            <div class="logout" name="logout"><a href="logout.php">ログアウト</a></div>
        </div>
    </div>
    <table class="main_table">
        <tr>
            <th width="200">タイトル</th>
            <th width="220">発売日</th>
            <th width="90">在庫数</th>
            <th width="90"></th>
        </tr>

        <!-- データベースから在庫一覧を表示 -->
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo date("Y/m/d",strtotime($row['date'])); ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td class="delete"><a href="delete.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
        <?php } ?>
    </table>
</html>