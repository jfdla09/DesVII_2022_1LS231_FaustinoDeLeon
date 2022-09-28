<?php
    if(array_key_exists('enviar', $_POST)){
        include('class_lib.php');
        $opc = $_POST['desem'];
        $desem = new Producto($opc);
        $img = $desem->obtener_imagen();
        if ($opc >= 80){
            echo "El desempeño de las ventas supera el 80% <br><br>";
            echo "<img src=".$img.">";   
        } 
        else if($opc >= 50 & $opc <= 79){
            echo "El desempeño de las ventas esta entre un 50% y 79% <br><br>";
            echo "<img src=".$img.">";
        }
        else{
            echo "El desempeño de las ventas esta por debajo del 50% <br><br>";
            echo "<img src=".$img.">";
        }
    } else {
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 8.1</title>
</head>
<body>
    <form name="formularioDesempeño" method="post" action="lab81.php">
    <p> APLICACION WEB CON IMAGEN DINAMICA </p>
        <br/>
        Introduzca el valor del desempeño de las ventas: <input type="text" name="desem" value="">
        <br/><br/>
        <input name="enviar" value="enviar" type="submit">
    </form>
    
</body>
</html>
<?php
    }
?>