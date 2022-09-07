<html>
<head>
<title>Laboratorio 4.4</title>
</head>
<body>
    <?PHP
        $arr = array();
        if(array_key_exists('cargar', $_POST)){
            $dato = $_REQUEST['num'];
            $arr = unserialize($_POST["arr"]);
            if($dato%2 == 0)
            {
                array_push($arr, $dato);
            } else {
                print "Debe introducir numeros pares<br>\n";
            }
            foreach ($arr as $indice => $dato)
                print "Pos[$indice]: $dato<br>\n";
        }
    ?>
    <FORM action="lab44.php" method = "post">
        Introduzca el valor: <input type = "text" name="num"><br>
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type = "submit" name="cargar" value= "Cargar valor">
    </FORM>
</body>
</html>