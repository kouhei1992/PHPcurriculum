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

    //書き込み処理
    $testFile = "test.txt";
    $contents = "こんにちは！";

    if( is_writable($testFile) ) {
        // echo "writable";
        $fp = fopen($testFile, "a"); //対象のファイルを開く
        fwrite($fp, $contents); //対象のファイルに書き込む
        fclose($fp); //ファイルを閉じる

        echo "finish writing!!"; // 書き込みした旨の表示
    }
    else {
        echo "not writable";
        exit;
    }

    //読み込み処理
    $test_file = "test2.txt";

    if ( is_readable($test_file) ) {
        $fp = fopen($test_file, "r"); //対象のファイルを開く
        
        //開いたファイルから1行ずつ読み込む
        while($line = fgets($fp)) {
            echo $line.'<br>'; //改行コード込みで1行ずつ出力
        }
        
        fclose($fp); //ファイルを閉じる
    }
    else {
        echo "not readable!";
        exit;
    }

    ?>
</body>
</html>