<?php
$err = false;

if( empty( $_POST['my_name'] ) ) {
  $err = true;
}
else {
  $my_name = $_POST['my_name'];
}

$port = [80, 22, 21, 20];
$language = ["php", "Python", "JAVA", "HTML"];
$command = ["join", "select", "insert", "update"];
$ans = [80, "HTML", "select"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>第３章のチェックテスト課題</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if( $err ) { ?>
    <p>名前が入力されていません。</p>
    <form action="index.html" method="post">
      <input type="submit" name="back" class="button" value="戻る">
    </form>
    <?php } else { ?>
    <p class="entry_name">お疲れ様です<?php echo $my_name; ?>さん</p>

    <form action="answer.php" method="post">
        <!-- 次のページでも名前の情報を表示できるように -->
        <input type="hidden" name="my_name" value="<?php echo $my_name; ?>">
        <input type="hidden" name="answer" value="<?php echo implode("@", $ans); ?>">
        
        <h2>①ネットワークのポート番号は何番？</h2>
        <?php foreach ( $port as $key => $value ): ?>
        <input type="radio" name="port" value="<?php echo $port[$key] ?>">
        <?php echo '<span class="radio">' . $value . '</span>'; ?>
        <?php endforeach; ?>

        <h2>②Webページを作成するための言語は？</h2>
        <?php foreach ( $language as $key => $value ): ?>
        <input type="radio" name="language" value="<?php echo $language[$key] ?>">
        <?php echo '<span class="radio">' . $value . '</span>'; ?>
        <?php endforeach; ?>

        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <?php foreach ( $command as $key => $value ): ?>
        <input type="radio" name="command" value="<?php echo $command[$key] ?>">
        <?php echo '<span class="radio">' . $value . '</span>'; ?>
        <?php endforeach; ?>
        <br>
        <input type="submit" class="button" value="回答する">

    </form>
    <?php } ?>
    
</body>
</html>


