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
    
    $fruits = ["apple" => "りんご", "orange" => "みかん", "peach" => "もも"];

    function calcPrice($price, $num) {
        $total = $price * $num;
        return $total;
    }

    foreach ( $fruits as $key => $value ) {
        if( $key == 'apple' ) {
            $total_price = calcPrice(150, 2);
        }
        elseif ( $key == 'orange' ) {
            $total_price = calcPrice(50, 3);
        }
        else {
            $total_price = calcPrice(300, 10);
        }
        echo $value . 'は' . $total_price . '円です。 <br>';
    }

    ?>
</body>
</html>