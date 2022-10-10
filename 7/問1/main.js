let numbers = [2, 5, 12, 13, 15, 18, 22];

function isEven(num) {

    for ( let i = 0; i < num.length; i++ ) {
        if ( num[i] % 2 == 0 ) {
            console.log(num[i] + 'は偶数です');
        }
    }

}

isEven(numbers);