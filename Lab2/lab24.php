<html>
<head>
    <title>laboratorio 2.4</title>
</head>
<body>
    <?php
    //Creacion del arreglo array("clave" => "valor")
    $personas = array ("juan" => "Panama",
    "jhon" => "USA",
    "eica" => "finlandia",
    "kusanagi" => "japon");

    //recorrer todo el arreglo
    foreach($personas as $persona => $pais){
        print "$persona es de $pais<br>";
    }

    //impresion especifica
    echo "<br>".$personas["juan"];
    echo "<br>".$personas["eica"];
    ?>
</body>
</html>