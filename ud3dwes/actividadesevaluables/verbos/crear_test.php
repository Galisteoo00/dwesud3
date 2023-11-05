<?php
include 'verbos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad = (int)$_POST['cantidad'];
    $nivel = (int)$_POST['nivel'];

    // Verbos aleatorios
    shuffle($verbosIrregulares);
    $verbosAleatorios = array_slice($verbosIrregulares, 0, $cantidad);

    // Inicia formulario 
    echo '<form action="calificacion.php" method="post"><table>';
    
    foreach ($verbosAleatorios as $verboInfo) {
        $infinitivo = $verboInfo[0];
    
        echo '<tr>';
        echo '<td>' . $infinitivo . '</td>';
    
        // Genera campos según nivel
        for ($i = 0; $i < $nivel; $i++) {
            if(isset($verboInfo[$i])){
                echo '<td><input type="text" name="respuestas[' . $infinitivo . '_' . $i . ']" required></td>';
            }
        }
    
        echo '</tr>';
    }

    echo '</table><input type="submit" value="Corregir Test"></form>';
}
?>
