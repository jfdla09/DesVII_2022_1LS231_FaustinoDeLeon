<?php
    session_start();
?>
<html lang="es">
<head>
    <title>Laboratorio 11.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo1.css">
</head>
<body>
<?php
    if(isset($_SESSION["usuario_valido"])){
        require_once("class/usuarios.php");
        $obj_not = new usuarios();
        $not = $obj_not->consultar_noticias();
        $inicio = 1;
        $final = 5;
        $total = count($not);

        $obj_noticia = new usuarios();
        $noticias = $obj_noticia->consultar_noticias_pag(5,$inicio-1);

        if(array_key_exists('Anterior', $_POST)){
            $obj_valor_ini = new usuarios();
            $pag_ini = $obj_valor_ini->consultar_valor();
            foreach ($pag_ini as $pag_x){
                $inicio = $pag_x['valor'];
            }
            if ($inicio > 1){
                $obj_dec = new usuarios();
                $decrementar = $obj_dec->decrementar();
            }
            $obj_valor = new usuarios();
            $paginas = $obj_valor->consultar_valor();
            foreach ($paginas as $pagina){
                if($pagina['valor']==1){
                    $inicio = $pagina['valor'];
                }else{
                    $inicio = (($pagina['valor'] - 1) * 5) + 1;
                }
            }
            $final = $inicio + 4;
            $obj_noticia = new usuarios();
            $noticias = $obj_noticia->consultar_noticias_pag(5,$inicio-1);
        }

        if(array_key_exists('Siguiente', $_POST)){
            $obj_valor_ini = new usuarios();
            $pag_ini = $obj_valor_ini->consultar_valor();
            foreach ($pag_ini as $pag_x){
                $inicio = $pag_x['valor'];
            }
            if ($inicio <= ($total/5)){
                $obj_inc = new usuarios();
                $incrementar = $obj_inc->incrementar();
            }
            $obj_valor = new usuarios();
            $paginas = $obj_valor->consultar_valor();
            foreach ($paginas as $pagina){
                if($pagina['valor']==1){
                    $inicio = $pagina['valor'];
                }else{
                    $inicio = (($pagina['valor'] - 1) * 5) + 1;
                } 
            }
            $val = $inicio + 4;
            if ($total > $val){
                $final = $val;
            }else{
                $final = $total;
            }
            $obj_noticia = new usuarios();
            $noticias = $obj_noticia->consultar_noticias_pag(5,$inicio-1);
        }
?>
        <H1>Consulta de noticias</H1>
        <FORM NAME="FormPaginacion" METHOD="post" ACTION="lab143.php">
            <?php 
            print "Mostrando Noticias $inicio a $final de un total de ". $total;
            ?>
            [ <INPUT NAME="Anterior" VALUE="Anterior" TYPE="submit"/> | <INPUT NAME="Siguiente" VALUE="Siguiente" TYPE="submit"/> ]
        </FORM>
    <?php
        $nfilas=count($noticias);
        if ($nfilas > 0){
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Titulo</TH>\n");
            print ("<TH>Texto</TH>\n");
            print ("<TH>Categoria</TH>\n");
            print ("<TH>Fecha</TH>\n");
            print ("<TH>Imagen</TH>\n");
            print ("</TR>\n");
        foreach ($noticias as $resultado){
            print ("<TR>\n");
            print ("<TD>".$resultado['titulo']."</TD>\n");
            print ("<TD>".$resultado['texto']."</TD>\n");
            print ("<TD>".$resultado['categoria']."</TD>\n");
            print ("<TD>".date("j/n/Y",strtotime($resultado['fecha']))."</TD>\n");
        if($resultado['imagen'] != ""){
            print ("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen']."'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
        }
        else{
            print ("<TD>&nbsp;</TD>\n");
        }
        print ("</TR>\n");
        }   
        print ("</TABLE>\n");
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