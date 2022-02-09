<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Code Homework #1</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {background-color: #EDEAE4; }
            h1   {font-family: sans-serif; color: #28282A; font-size: 23px; font-weight: 800; margin-left: 100px;}
            h2   {font-family: sans-serif; color: #28282A; font-size: 19px; font-weight: 200; margin-left: 100px;}
            p    {font-family: sans-serif; color: #28282A; font-size: 15px; font-weight: 100; margin-left: 100px;}

        </style>
    </head>
    <body>
        <header>
        <h2>CODE HOMEWORK ONE / PREPARED BY B. FULLER / INFO 638 WEB DEVELOPMENT </h2>
        <br>
        </header>

        <!--  Challenge one -->

        <h1>CHALLENGE ONE <br> CORRECT CHANGE</h1>
        <?php
        // declare variable for input
        $changedue = 42444;
        echo "<p>Your change is \$" . $changedue/100 . ". <br>";

        // declaring values for bills and coins
        $dollar = floor($changedue / 100);
        $coins = $changedue - ($dollar * 100);
        $quarter = floor($coins / 25);
        $dime = floor(($coins - ($quarter * 25)) / 10);
        $nickel = floor(($coins - ($quarter * 25) - ($dime * 10)) / 5);
        $penny = floor(($coins % 5) / 1);

        // printing the change due
        if ($changedue > 0) {
            echo "You are due back " . $dollar . " dollar(s), " . $quarter . " quarter(s), " . $dime . " dime(s), " . $nickel . " nickel, and " . $penny . " cent(s).</p>";

        };

        ?>
        <br>
        <br />

        <!-- Challenge two -->
        <h1>CHALLENGE TWO <br> 99 BOTTLES OF BEER</h1>
        <?php
        //declare number of bottles to start
        $bottlenumber = 9;

        //write loop with song lyrics
        for ($bottlenumber = 9; $bottlenumber > 0; $bottlenumber--)
             {
                echo "<p>" . $bottlenumber . " bottles of beer on the wall, " . $bottlenumber . " bottles of beer! <br> Take one down and pass it around, " . ($bottlenumber - 1) . " bottles of beer! </p>";
            }
         ?>
    </body>
</html>
