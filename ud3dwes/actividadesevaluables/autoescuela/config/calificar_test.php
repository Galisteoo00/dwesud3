<?php
include("tests_cnf.php");

$correctas1 = ["a", "b", "c", "c", "c", "a", "c", "a", "c", "a"];
$correctas2 = ["c", "c", "b", "b", "c", "c", "a", "b", "c", "c"];
$correctas3 = ["b", "b", "c", "a", "c", "a", "b", "b", "b", "b"];

$test_id = $_POST['test_id'];

// Verifico si el test seleccionado existe
if (isset($aTests[$test_id - 1])) {
    $test = $aTests[$test_id - 1];
    echo '<h1>' . $test['Permiso'] . ' - ' . $test['Categoria'] . '</h1>';
    echo '<form action="calificar_test.php" method="post">';
    echo '<input type="hidden" name="test_id" value="' . $test_id . '">';
    $respuestasUsuario = $_POST['respuestas'];
    $respuestasCorrectas = null;

    // Asigno las respuestas correctas con el test seleccionado
    if ($test_id == 1) {
        $respuestasCorrectas = $correctas1;
    } elseif ($test_id == 2) {
        $respuestasCorrectas = $correctas2;
    } elseif ($test_id == 3) {
        $respuestasCorrectas = $correctas3;
    }

    $respuestasCorrectasCount = 0;
    // Recorro preguntas y comparo con las correctas
    foreach ($test['Preguntas'] as $pregunta) {
        echo '<p><strong>' . $pregunta['Pregunta'] . '</strong></p>';
        echo '<ul>';
        $preguntaId = $pregunta['idPregunta'];
        $respuestaCorrecta = $respuestasCorrectas[$preguntaId - 1]; // Para que coja la última respuesta
        $respuestaUsuario = isset($respuestasUsuario[$preguntaId]) ? $respuestasUsuario[$preguntaId] : "";

        echo '<li>Respuesta del usuario: ' . $respuestaUsuario . '</li>';
        echo '<li>Respuesta Correcta: ' . $respuestaCorrecta . '</li>';

        if ($respuestaUsuario === $respuestaCorrecta) {
            $respuestasCorrectasCount++;
        }

        echo '</ul>';
    }

    echo '<p>Tu puntuación: ' . $respuestasCorrectasCount . ' respuestas correctas de ' . count($test['Preguntas']) . '</p>';

    // Mostrar emoticono de aprobado o suspenso
    if ($respuestasCorrectasCount > 7) {
        echo '<p>👍 Aprobado</p>';
    } else {
        echo '<p>👎 Suspenso</p>';
    }

    echo '</form>';
} else {
    echo '<p>El test seleccionado no existe. Por favor, selecciona un test válido.</p>';
}
?>
