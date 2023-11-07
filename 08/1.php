<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Any content</title>
</head>
<body>
    On this page.
    <?php
        $x = 5;
        print $x;
        print($x);
        echo $x; // <-- I prefer this. :)
        echo($x);

        if ($x == 4){
            echo "x is 4";
        } else {
            echo "<br> <h1>x is not 4</h1> <br>";
        }

        for ($i = 0; $i <= 9; $i++)
            echo ($i);

        $t = [8, 6, 2, 3];

        for ($i = 0; $i < count($t); $i++)
            echo "<br>" . $t[$i] . "<br>";

        foreach($t as $i){
            echo "<br>" . $i . "<br>";
        }

        $u = [
            'a' => 3,
            'b' => 4
        ];

        echo $u['a'];

        $zero = 0;
        function isEven($n){
            // return $n % 2 === $zero; <- the function cannot see $zero
            return $n % 2 === 0;
        }

        echo isEven(5) ? 'true' : 'false';

        // EXERCISES
        // ARRAY OF NUMBERS
        // 1.) filter the even elements - find array functions :)
        // 2.) calculate the square of each element - find array functions :)
        // 3.) display it as a list (ul - li) - try alternative syntax

        $t = [5, 2, 3, 7, 9, 4, 6];

        $filtered = [];
        foreach($t as $x){
            if ($x % 2 === 0){
                // array_push($filtered, $x);
                $filtered[] = $x;
            }   
        }
        print_r($filtered);

        print_r(array_filter($t, 'isEven'));

        print_r(array_map(function($x) {
            return $x * $x;
        }, $t));

        echo "<ul>";
        foreach($t as $i){
            echo "<li>" . $i ."</li>";
        }
        echo "</ul>";
    ?>

    Some static again.
    <?php

    ?>
</body>
</html>