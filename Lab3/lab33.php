<html>
<head>
    <title>Laboratorio 3.3</title>
</head>
<body>
<?php
    if (array_key_exists('enviar', $_POST)){
        if ($_REQUEST['Apellido'] != "")
        {
            echo "El apellido Ingresado es : $_REQUEST[Apellido]";
        }
        else
        {
            echo "Favor coloque el apellido";
        }
        echo "<br>";
        if ($_REQUEST['Nombre'] != "")
        {
            echo "El nombre Ingresado es : $_REQUEST[Nombre]";
        }
        else
        {
            echo "Favor coloque el nombre";
        }
    }
    else{
        ?>
        <form action="lab33.php" method="post">
        Nombre: <input type="text" name="Nombre"><br>
        Apellido: <input type="text" name="Apellido"><br>
        <input type="submit" name="enviar" value="Enviar datos">
        </form>
        <?php
    }
    ?>    
</body>
</html>