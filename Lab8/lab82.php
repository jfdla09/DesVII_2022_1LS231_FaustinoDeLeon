<?php
    if(isset($_POST["fact"])){
        include('class_lib.php');
        $num = $_POST["fact"];
        $fact = new Factorial($num);
        $res = $fact->obtener_fact();
        echo " El factorial del numero $num es: $res";
    } else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 8.2</title>
</head>
<body>
    <form name="formularioDatos" method="post" action="lab82.php">
        <p> CALCULO DEL FACTORIAL DE UN NUMERO INTRODUZIDO</p>
        <br/>
        Introduzca el numero a calcular: <input type="text" name="fact">
        <br/><br/>
        <input name="Calcular" value="Calcular" type="submit">
    </form>
    
</body>
</html>
<?php
    }
?>