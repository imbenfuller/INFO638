<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <h1>ISBN CHECKER</h1>
    <?php
    
    function isbn_validator($isbn) {
        //pulling each integer out of the string and multiplying it
        $n1 = substr($isbn, 0, 1) * 10;
        $n2 = substr($isbn, 1, 1) * 9;
        $n3 = substr($isbn, 2, 1) * 8;
        $n4 = substr($isbn, 3, 1) * 7;
        $n5 = substr($isbn, 4, 1) * 6;
        $n6 = substr($isbn, 5, 1) * 5;
        $n7 = substr($isbn, 6, 1) * 4;
        $n8 = substr($isbn, 7, 1) * 3;
        $n9 = substr($isbn, 8, 1) * 2;
        $n10 = substr($isbn, 9, 1) * 1;

        // adding together and dividing by 11, producing remainder
        $validate = ($n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9 + $n10) % 11;

        echo "Checking ISBN: " . $isbn . " for validity...";

        // if remainder is 0 then it passes 
        if ($validate == 0){ 
            echo "<h3>This is a valid IBSN.</h3>";
        } else {
            echo "<h3>This is not a valid IBSN.</h3>";
         }
        }
    isbn_validator("0593186877");

    /* trying to figure out the X portion... 
    if (substr($isbn, 8, 1) == "X") {
        $n9 = 1;
        $n10 = 0;
    }
*/


    ?>

<hr/>
    <h1>Coin Toss </h1>
        <h3>Flipping 1 coin...</h3>
        <?php
        // selects either heads or tails from array
        $toss = array("<img src='heads.png' alt='heads' style='width:50px;height:50px;'/>", "<img src='tails.png' alt='tails' style='width:50px;height:50px;'/>")[random_int(0,1)];
        echo $toss;
        ?>
        <h3>Flipping 3 coins...</h3>
        <?php
        for ($c = 0; $c <= 2; $c++) {
        $toss = array("<img src='heads.png' alt='heads' style='width:50px;height:50px;'/>", "<img src='tails.png' alt='tails' style='width:50px;height:50px;'/>")[random_int(0,1)];
        echo $toss;
        }
        ?>
        <h3>Flipping 5 coins...</h3>
        <?php
        for ($c = 0; $c <= 4; $c++) {
        $toss = array("<img src='heads.png' alt='heads' style='width:50px;height:50px;'/>", "<img src='tails.png' alt='tails' style='width:50px;height:50px;'/>")[random_int(0,1)];
        echo $toss;
        }
        ?>
        <h3>Flipping 7 coins...</h3>
        <?php
        for ($c = 0; $c <= 6; $c++) {
        $toss = array("<img src='heads.png' alt='heads' style='width:50px;height:50px;'/>", "<img src='tails.png' alt='tails' style='width:50px;height:50px;'/>")[random_int(0,1)];
        echo $toss;
        }
        ?>
        <h3>Flipping 9 coins...</h3>
        <?php
        for ($c = 0; $c <= 8; $c++) {
        $toss = array("<img src='heads.png' alt='heads' style='width:50px;height:50px;'/>", "<img src='tails.png' alt='tails' style='width:50px;height:50px;'/>")[random_int(0,1)];
        echo $toss;
        }
        ?>
 <hr/>
    <h1>Coin Toss Part II</h1>
    <h3>How many tosses does it take to land 2 heads in a row? </h3><br>
    <?php

        function cointoss () {
            //produce either 0 or 1 at random
            return mt_rand(0,1); 
        }
        // differentiate between previous toss and current toss
        $previous = null;
        $current = null;

        // loop if current toss does not equal previous toss
        do {
            if ($current !== null) {  
                $previous = $current;  
            }
            $current = cointoss();  
            echo ($current ? "<img src='heads.png' style='width:50px;height:50px;'/>" : "<img src='tails.png' style='width:50px;height:50px;'/>") , "\n";
        } while ($previous + $current != 2); // continues tossing until previous and current = 1, which means heads + heads


    ?>

    </body>
</html>