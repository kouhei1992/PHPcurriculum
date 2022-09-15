<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try {
        if( $_POST['number'] && is_numeric($_POST['number']) ) { //POSTで送られてきた値が数値の場合の処理

            $numbers = $_POST['number'];
            echo $_POST['number'].'<br>';
            $num = [];
    
            //入力した数字を1つずつ分ける作業
            for ( $i = 0; $i < strlen($numbers); $i++ ) {
                array_push($num, substr($numbers, $i, 1)); //入力した数字を1つずつ配列に格納
            }
    
            //ランダムな数字（0～文字列の長さ-1）を選ぶ
            $rand = mt_rand(0, strlen($numbers)-1);
    
            echo '選ばれた数字は' . $num[$rand].'<br>';
            
            echo date("Y/m/d").'の運勢は<br>';
    
            //選ばれた数字によって運勢が表示される
            switch ($num[$rand]) {
                
                case '0':
                    echo '凶';
                    break;
                
                case '1':
                case '2':
                case '3':
                    echo '小吉';
                    break;
                
                case '4':
                case '5':
                case '6':
                    echo '中吉';
                    break;
    
                case '7':
                case '8':
                    echo '吉';
                    break;
    
                case '9':
                    echo '大吉';
                    break;
                
                default:
                    echo '0~9の数字ではないため、運勢を占うことは出来ません。';
            }
    
        }
        else {
            throw new Exception('0~9までの数字を入力してください。');
        }
    } catch (Exception $e) {
        echo '例外処理が発生しました';
        echo "<br>";
        echo $e -> getMessage();
    }
    
    ?>
</body>
</html>