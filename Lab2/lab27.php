<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>laboratorio 2.7</title>
</head>
<body>
    <?php
        $posicion = "arriba";

        switch($posicion){
            case "arriba": //Bloque 1
                echo "la variable contine";
                echo "\n el valor de arriba";
                break;
            case "abajo": //Bloque 2
                echo "la variable contine";
                echo "\n el valor de abajo";
                break;
            default: //Bloque 3
                echo "la variable contine otro valor";
                echo "\n distinto de arriba y abajo";
                break;
        }
    ?>
</body>
</html>