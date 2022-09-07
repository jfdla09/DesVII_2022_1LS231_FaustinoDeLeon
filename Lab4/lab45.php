<?php 
$opc = $_REQUEST['Enviar'];
$valoring = $_REQUEST['num'];
if (isset($opc)) {
    if ($valoring % 2 == 0) {
        $number = [];
        for ($i = 0; $i < $valoring; $i++) {
            $number2 = [];
            for ($e = 0; $e < $valoring; $e++) {
                if ($e == $i) {
                    array_push($number2, '1');
                } else{
                    array_push($number2, '0');
                }    
                }
            array_push($number, $number2);
        }
        echo '<table border>';
        foreach ($number as $f) {
            echo '<tr>';
            foreach ($f as $y) {
                echo '<td>' . $y . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "El Numero ingresado debe ser par";
    }
}
?>