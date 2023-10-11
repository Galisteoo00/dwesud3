<?php
$numeros = array (1,2,3,4);
print_r($numeros);

echo "<br>Cuadrado de numeros <br>";

$cuadrados = array_map(function($numero) {
    return $numero * $numero;
}, $numeros);
print_r($cuadrados)
?>