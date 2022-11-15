<?php
    if(isset($_COOKIE['contador'])){
        setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 *60 *60);
        $mensaje = 'Gracias por visitarnos. Numero de visitas: ' . $_COOKIE['contador'];
    }
    else{
        //Caduca en un año
        setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
        $mensaje = 'Bienvenido a nuestro sitio web';
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title>Laboratorio 13</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Contador de visitas de Cookies</h1><p>
    <h3><?php echo $mensaje; ?></h3>
</p>
</body>
</html>