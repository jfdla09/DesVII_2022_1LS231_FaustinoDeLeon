<html>
<head>
    <title>Laboratorio 4.1</title>
</head>
<body>
<?php
$img1 = "caritafeliz.jpg";
$img2 = "caritaseria.jpg";
$img3 = "caritatriste.jpg";
$valor = $_POST['desem'];
        if ($valor >= 80)
        {
            echo "El desempeño de las ventas supera el 80% <br><br>";
            echo "<img src=".$img1.">"; 
        }
        else if ($valor >= 50 & $valor <= 79)
        {
            echo "El desempeño de las ventas esta entre un 50% y 79% <br><br>";
            echo "<img src=".$img2.">"; 
        }
        else 
        {
            echo "El desempeño de las ventas esta por debajo del 50% <br><br>";
            echo "\n<img src=".$img3.">"; 
        }
    ?>    
</body>
</html>