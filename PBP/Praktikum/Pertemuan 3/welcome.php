<!doctype html>
<html>
    <head>
    
    </head>
    <body>
        <?php
            echo "<h2>lorem ipsum</h2>";
            $a = 15;
            echo "variable a = " . $a . "<br \>";
            $a = "test";
            echo "variable a = " . $a . "<br \>";
            function diskon(){
                $harga = 1000;
                $harga = 0.2 * $harga;
                echo "harga = " . $harga . "<br \>";    
            }
            $harga = 30000;
            diskon();
            echo "harga = " . $harga . "<br \>";
        ?>
    </body>
</html>