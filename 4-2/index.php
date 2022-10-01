<?php

require_once('getData.php');

$data = new getData();

$users_row = $data -> getUserData();
$posts_row = $data -> getPostData();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>4章のチェックテスト</title>
</head>
<body>

    <header>
        <div class="header">
            <div class="left">
                <div class="left_img">
                    <img src="logo.png" alt="Y&I group, inc">
                </div>
            </div>
            <div class="right">
                <div class="upper">
                <?php echo 'ようこそ&nbsp' . $users_row['last_name'] . $users_row['first_name'] . '&nbspさん'; ?>
                </div>
                <div class="lower">
                <?php echo '最終ログイン日：' . $users_row['last_login']; ?>
                </div>
            </div>
        </div>
    </header>

    <main>
        <table class="posts_title">
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>

            <?php while ($row = $posts_row -> fetch(PDO::FETCH_ASSOC)) {
                if ($row['category_no'] == 1) {
                    $category = '食事';
                }
                elseif ($row['category_no'] == 2) {
                    $category = '旅行';
                }
                else {
                    $category = 'その他';
                }
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $category . '</td>';
                echo '<td>' . $row['comment'] . '</td>';
                echo '<td>' . $row['created'] . '</td>';
                echo '</tr>';
            } ?>
            
        </table>
    </main>

    <footer>
        Y&I group, inc
    </footer>

</body>
</html>