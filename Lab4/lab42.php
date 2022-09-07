<html>
<head>
<title>Laboratorio 4.2</title>
</head>
<body>
<?php
    if(isset($_POST["fact"])){
        $num = $_POST["fact"];

        function calculo_factorial($num){
            $factorial = 1;
            for($i = 1; $i <= $num; $i++){
                $factorial = $factorial * $i;
            }
            return $factorial;
        }
        $res = calculo_factorial($num);
        echo " El factorial del numero $num es: $res";
    }
?>    
</body>
</html>