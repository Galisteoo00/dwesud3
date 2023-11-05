<?php
include 'verbos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuestasUsuario = $_POST['respuestas'];
    
    $puntaje = 0;
    $resultados = [];

    foreach ($respuestasUsuario as $clave => $respuestaUsuario) {
        // Infinitivo y tiempo verbal
        list($verbo, $indiceTiempo) = explode('_', $clave);
        
        $verboInfo = array_filter($verbosIrregulares, function ($info) use ($verbo) {
            return $info[0] === $verbo;
        });
        
        if (!empty($verboInfo)) {
            $verboInfo = reset($verboInfo);
            $tiempoVerbalCorrecto = $verboInfo[$indiceTiempo + 1]; // +1 para ajustar con el índice
            
            if ($respuestaUsuario === $tiempoVerbalCorrecto) {
                $puntaje++;
            }

            $resultados[] = [
                'verbo' => $verbo,
                'respuestaUsuario' => $respuestaUsuario,
                'tiempoVerbalCorrecto' => $tiempoVerbalCorrecto,
                'verboCorrecto' => $respuestaUsuario === $tiempoVerbalCorrecto
            ];
        }
    }

    echo '<h1>Tu puntaje es: ' . $puntaje . '/' . count($respuestasUsuario) . '</h1>';
    
    echo '<table>';
    foreach ($resultados as $resultado) {
        $estilo = $resultado['verboCorrecto'] ? 'color: green;' : 'color: red';
        
        echo '<tr>';
        echo '<td>' . $resultado['verbo'] . '</td>';
        echo '<td style="' . $estilo . '">' . $resultado['respuestaUsuario'] . '</td>';
        echo '<td style="' . $estilo . '">' . $resultado['tiempoVerbalCorrecto'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>