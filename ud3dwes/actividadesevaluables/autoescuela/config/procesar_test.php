<?php
include("tests_cnf.php");

$test_id = $_POST['test_id'];  // Coge el ID del test

if (isset($aTests[$test_id - 1])) {
    $test = $aTests[$test_id - 1];

    $imagenesDirectorio = '../dir_img_test' . $test_id . '/';  // Directorio de imagenes con id del test

    $imagenes = array();  // Array con ruta de img

    for ($i = 1; $i <= 10; $i++) {
        $imagenes['Pregunta ' . $i] = $imagenesDirectorio . 'img' . $i . '.jpg';  // IMG por cada pregunta
    }

    echo '<h1>' . $test['Permiso'] . ' - ' . $test['Categoria'] . '</h1>';

    echo '<form action="calificar_test.php" method="post">';
    echo '<input type="hidden" name="test_id" value="' . $test_id . '">';  // Agrego el ID del test al formulario para lgo corregir

    foreach ($test['Preguntas'] as $key => $pregunta) {
        $preguntaTexto = 'Pregunta ' . ($key + 1);
        $preguntaKey = 'test' . $test_id . '_pregunta' . ($key + 1);

        echo '<p><strong>' . $pregunta['Pregunta'] . '</strong></p>';

        // Añado imagen
        if (isset($imagenes[$preguntaTexto])) {
            $imagen = $imagenes[$preguntaTexto];
            echo '<img src="' . $imagen . '" alt="' . $preguntaTexto . '"><br>';  // Muestra img
        }

        echo '<ul>';
        $respuestas = $pregunta['respuestas'];

        echo '<li>';
        echo '<input type="radio" name="respuestas[' . ($key + 1) . ']" value="a"> a) ' . $respuestas[0] . '<br>';
        echo '<input type="radio" name="respuestas[' . ($key + 1) . ']" value="b"> b) ' . $respuestas[1] . '<br>';
        echo '<input type="radio" name "respuestas[' . ($key + 1) . ']" value="c"> c) ' . $respuestas[2] . '<br>';
        echo '</li>';

        echo '</ul>';
    }

    echo '<input type="submit" value="Enviar respuestas">'; 
    echo '</form>';
} else {
    echo '<p>El test seleccionado no existe. Por favor, selecciona un test válido.</p>';
}
?>
