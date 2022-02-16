<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Week 4 Notes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $fullname = "Benjamin Michael Fuller";
            echo substr($fullname, 0, 8) . "<br>";
            echo substr($fullname, 8, 8) . "<br>";
            echo substr($fullname, -6) . "<br>";
            echo strtoupper(substr($fullname, 8, 8)) . "<br>";
            echo str_shuffle($fullname) . "<br>";


            function calculate_tip($mealprice, $tippercentage) {
                $tip = $mealprice * ($tippercentage / 100);
                return "$".round($tip, 2);
            }

            echo calculate_tip(43.22, 20);

            echo "<br>";

            function change_calc($change) {
                $changedue = $change * 100;
                $dollar = floor($changedue / 100);
                $coins = $changedue - ($dollar * 100);
                $quarter = floor($coins / 25);
                $dime = floor(($coins - ($quarter * 25)) / 10);
                $nickel = floor(($coins - ($quarter * 25) - ($dime * 10)) / 5);
                $penny = floor(($coins % 5) / 1);

                if ($dollar > 1) {
                    echo "You are due back " . $dollar . " dollars, ";
            } elseif ($dollar = 1) {
                echo "You are due back " . $dollar . " dollar, " ;
            } else {
                echo "You are due back "; }

            if ($quarter > 1) {
                echo $quarter . " quarters, ";
                    } elseif ($quarter = 1) {
                    echo $quarter . " quarter, ";
                     } else {
                echo "";
                }
             if ($dime > 1) {
                    echo $dime . " dimes, ";
                        } elseif ($dime = 1) {
                        echo $dime . " dime, ";
                         } else {
                    echo "";
                    }
            if ($nickel > 1) {
                        echo $nickel . " nickels, ";
                            } elseif ($nickel = 1) {
                            echo $nickel . " nickel, ";
                             } else {
                        echo "";
                        }

            if ($penny > 1) {
                            echo " and " . $penny . " pennies. ";
                                } elseif ($penny = 1) {
                                echo " and " . $penny . " penny, ";
                                 } else {
                            echo ".";
                            }

            }

            echo change_calc(4.97)



        ?>
        
    </body>
</html>