<?php 

require_once('db_connect.php');

$errorMessage_name = '';
$errorMessage_pass = '';

if(isset($_POST['signUp'])) {
    if (empty($_POST['name'])) {
        $errorMessage_name = 'ユーザー名が未入力です。';
    }
    if (empty($_POST['password'])) {
        $errorMessage_pass = 'パスワードが未入力です。';
    }

    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $pdo = db_connect();

        try {
            $sql = 'INSERT INTO users (name, password) VALUES(:name, :password)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password_hash);
            $stmt->execute();
            header("Location: signUp_comp.php");
        } catch(PDOException $e) {
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
    <title>新規登録</title>
</head>
<body>
    <h1>ユーザー登録画面</h1>
    <form action="" method="post">
        <?php if($errorMessage_name) { echo '<span class="err">' . $errorMessage_name . '</span>'; }  ?>
        <input type="text" name="name" class="input" placeholder="ユーザー名"><br>
        <?php if($errorMessage_pass) { echo '<span class="err">' . $errorMessage_pass . '</span>'; } ?>
        <input type="password" name="password" class="input" placeholder="パスワード">
        <input type="submit" name="signUp" value="新規登録">
    </form>
</body>
</html>