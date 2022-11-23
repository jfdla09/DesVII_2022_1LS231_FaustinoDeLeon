<?php
    session_start();
?>
<html lang="es">
<head>
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo1.css">
</head>
<body>
    <?php
        if(isset($_SESSION["usuario_valido"])){
    ?>
            <h1>Consulta de noticias</h1>
        <?php
            require_once("class/usuarios.php");
            
            $obj_noticia= new usuarios();
            $noticias=$obj_noticia->consultar_noticias();
            
            $nfilas=count($noticias);
            
            if($nfilas > 0){
                print ("<table>\n");
                print ("<tr>\n");
                print ("<th>Titulo</th>\n");
                print ("<th>Texto</th>\n");
                print ("<th>Categoria</th>\n");
                print ("<th>Fecha</th>\n");
                print ("<th>Imagen</th>\n");
                print ("</tr>\n");
            
            foreach ($noticias as $resultado){
                print ("<tr>\n");
                print ("<td>" . $resultado['titulo'] . "</td>\n");
                print ("<td>" . $resultado['texto'] . "</td>\n");
                print ("<td>" . $resultado['categoria'] . "</td>\n");
                print ("<td>" . date("j/n/Y",strtotime($resultado['fecha'])) . "</td>\n");
            
                if ($resultado['imagen'] != ""){
                    print ("<td><a target='_blank' href='img/" . $resultado['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>\n");
                }
                else{
                    print ("<td>&nbsp;</td>\n");
                }
                print ("</tr>\n");
            }
            print("</table>\n");
            }
            else{
                print ("No hay noticias disponibles");
            }
        ?>
            <p>[ <a href='login.php'>Menu principal</a> ]</p>
        <?php
        } 
        else{
            print("<br><br>\n");
            print("<p align='center'>Acceso no autorizado</p>\n");
            print("<p align='center'>[ <a href='login.php' target='_top'>Conectar</a> ]</p>\n");
        }
        ?>    
</body>
</html>