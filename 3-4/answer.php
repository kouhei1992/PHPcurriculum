<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];

$err = false;

if ( empty($_POST['port']) || empty($_POST['language']) || empty($_POST['command']) ) {
  $err = true;
}
else {
  $q1 = $_POST['port'];
  $q2 = $_POST['language'];
  $q3 = $_POST['command'];
}

$answer = explode("@", $_POST['answer']);

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function answer($q, $a) {
  if( $q == $a ) {
    echo '正解！';
  }
  else {
    echo '残念・・・';
  }
}


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
  <?php if ( $err ) { ?>
  <form action="question.php" method="post">
    <p>選択されていない項目があります。</p>
    <input type="hidden" name="my_name" value="<?php echo $my_name; ?>">
    <input type="submit" name="back" class="button" value="戻る">
  </form>
  <?php } else { ?>
  <p><?php echo $my_name; ?>さんの結果は・・・？</p>
  
  <p>①の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <p><?php answer($q1, $answer[0]); ?></p>

  <p>②の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <p><?php answer($q2, $answer[1]); ?></p>

  <p>③の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <p><?php answer($q3, $answer[2]); ?></p>
  <?php } ?>

</body>
</html>