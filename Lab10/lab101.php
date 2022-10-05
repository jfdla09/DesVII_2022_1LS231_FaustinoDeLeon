<html lang="es">
<head>
    <title>Laboratorio 10.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php
        require_once("class/votos.php");

        if(array_key_exists('enviar', $_POST)){
            print ("<h1>Encuesta. Voto registrado</h1>\n");

            $obj_votos = new votos();
            $result_votos = $obj_votos->listar_votos();

            foreach ($result_votos as $result_voto){
                $votos1=$result_voto['votos1'];
                $votos2=$result_voto['votos2'];
            }
            $voto = $_REQUEST['voto'];
            if ($voto == "si")
            $votos1 = $votos1 + 1;
            else if ($voto == "no")
            $votos2 = $votos2 + 1;
        
            $obj_votos = new votos();
            $result = $obj_votos->actualizar_votos($votos1, $votos2);

            if($result){
                print ("<p>Su voto ha sido registrado. Gracias por participar</p>\n");
                print ("<a href='lab102.php'>Ver resultados</a>\n");
            }
            else{
                print ("<a href='lab101.php'>Error al actualizar su voto</a>\n");
            }
        }
        else{
    ?>
        <h1>Encuesta</h1>

        <p>¿Cree ud. que el porcentaje de la vivienda seguira subiendo al ritmo actual?</p>

        <form action="lab101.php" method="POST">
            <input type="RADIO" name="voto" value="si" Checked>Si<br>
            <input type="RADIO" name="voto" value="no">No<br><br>
            <input type="SUBMIT" name="enviar" value="votar">
        </form>

        <a href="lab102.php">Ver resultados</a>

        <?php
            }
        ?>
</body>
</html>