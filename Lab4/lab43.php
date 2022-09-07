<?php
    $arr = [];
    $mayor = 0;
    $posm = 0;
    for($i=0; $i<20; $i++){
        $nr = rand(1,100);
        $arr[$i] = $nr;
        if ($arr[$i] > $mayor){
            $mayor = $arr[$i];
            $posm = $i;}
    }
    print_r($arr);
    echo "<br><br> El mayor elemento del arreglo es: $mayor y esta en la posición: $posm";
?>