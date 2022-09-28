<html>
<head>
<title>Laboratorio 8.3</title>
</head>
<body>
    <?PHP
        $arr = array();
        if(array_key_exists('cargar', $_POST)){
            include('class_lib.php');
            $dato = $_REQUEST['num'];
            $arr = unserialize($_POST["arr"]);
            $p_i = new Arreglo($dato);
            $num = $p_i->obtener_par_impar();
            if($num == 1){
                echo "Debe introducir numeros pares<br>\n"; 
            } else {
                array_push($arr, $dato);
            }
            foreach ($arr as $indice => $num)
                print "Pos[$indice]: $num<br>\n";
        }
    ?>
    <FORM action="lab83.php" method = "post">
        Introduzca el valor: <input type = "text" name="num"><br>
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type = "submit" name="cargar" value= "Cargar valor">
    </FORM>
</body>
</html>