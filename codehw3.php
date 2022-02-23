<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body {background-color: #EDEAE4; }
            h1   {font-family: sans-serif; color: #28282A; font-size: 23px; font-weight: 800; margin-left: 100px;}
            h2   {font-family: sans-serif; color: #28282A; font-size: 19px; font-weight: 200; margin-left: 100px;}
            p    {font-family: sans-serif; color: #28282A; font-size: 15px; font-weight: 100; margin-left: 100px;}
            .results {font-family: sans-serif; color: green; font-size: 19px; font-weight: 600; margin-left: 100px; padding: 20px 0;}
            table {font-family: sans-serif; color: #28282A; font-size: 15px; font-weight: 100; margin-left: 100px;}

        </style>
    </head>
    <body>
    <header>
        <h2>CODE HOMEWORK THREE / PREPARED BY B. FULLER / INFO 638 WEB DEVELOPMENT </h2>
        <br>
        </header>

        <!--  Challenge one -->

        <h1>CHALLENGE ONE <br> MULTIDIMENSIONAL ARRAYS</h1>


    <?php

    // begin array with book data
    $bookdata = array (
        // multidimension array adding column headers then data
        array("Title", "Author", "Page Count", "Medium", "Price"),
        array("PHP and MySQL Web Development", "Luke Welling", "144", "Paperback",  31.63),
        array("Web Design with HTML, CSS, JavaScript and jQuery", "Jon Duckett", "135", "Paperback", 41.23),
        array("PHP Cookbook: Solutions & Examples for PHP Programmers", "David Sklar", "14", "Paperback", 40.88),
        array("JavaScript and JQuery: Interactive Front-End Web Development", "Jon Duckett", "251", "Paperback", 22.09),
        array("Modern PHP: New Features and Good Practices", "Josh Lockhart", "7", "Paperback", 28.49),
        array("Programming PHP", "Kevin Tatroe", "26", "Paperback", 28.96)
    );
    // declaring table in html
    echo "<table border =\"1\" style='border-collapse: collapse'>";
    // for loop to push row data incrementally
    for ($row = 0; $row < 7; $row++) {
        // html table row
    echo "<tr>";
    // for loop to pull table columns incrementally
    for ($col = 0; $col < 5; $col++) {
        // insert table data 
    echo "<td>".$bookdata[$row][$col]."</td>";
    }
    // close table rows
     echo "</tr>";
    }   // close table 
    echo "</table>";

    // create new array from book prices

    $newarray = array(
        $bookdata[1][4], 
        $bookdata[2][4], 
        $bookdata[3][4], 
        $bookdata[4][4], 
        $bookdata[5][4]);
        // add them together
   $sum = array_sum($newarray);
   echo '<div class="results">The total cost is: '  . $sum . '</div>';


 ?>
        <br>
        <br>

        <!-- Challenge two -->
        <h1>CHALLENGE TWO <br> COIN TOSS V2</h1>

<div class="results">
 <?php

   function cointoss($n) {
    $headCount = '';
    $flipCount = '';
    while ($headCount < $n) {
        $flip = rand(0,1);
        $flipCount ++;
        if ($flip){
            $headCount ++;
            echo "<img src='heads.png' style='width:50px;height:50px;'/>";
        }
        else {
            $headCount = 0;
            echo "<img src='tails.png' style='width:50px;height:50px;'/>";
        }
    }

    echo '<br>It took ' . $flipCount . ' tosses to get ' . $n . ' heads in a row!</br>';
}
echo cointoss(8);

    
    ?>
    </div>
    </body>
</html>