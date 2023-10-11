<?php
$i = 0;
$contador = 0;
$suma = 0;

while ($contador < 3) {
    if ($i > 0 && $i % 2 == 0) {
        $suma = $suma + $i;
        $i++;
        $contador++;
    } else {
        $i++;
    }
}

echo "La suma es ".$suma;
?>