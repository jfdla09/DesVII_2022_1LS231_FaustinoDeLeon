<html>
<head>
    <title>Laboratorio 20</title>
</head>
<body>
    <form action="lab201.php" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Email: <input type="email" name="email"><br>
        Edad: <input type="numbre" name="edad" min="0" max="120"><br>
        <input type="submit" name="guardar" value="Guardar Datos">
    </form>
    <?php
        include("UsuariosMDB.php");
        $usrs=new UsuariosMDB();

        if(array_key_exists('guardar', $_POST)){
            $usrs->insertarRegistro($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['email'], $_REQUEST['edad']);
            echo "Registro insertado exitosamente <br><br>";
        }
        echo "Registro en la coleccion usuarios: <br>";
        $usrs->obtenerRegistros();
    ?>
</body>
</html>