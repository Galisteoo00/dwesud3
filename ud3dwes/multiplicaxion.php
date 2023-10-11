<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla multiplicación</title>
    <style>
        table {
            border-color: chartreuse;
        }

        table td {
            background-color: skyblue;
        }
    </style>
</head>
<body>
<?php
// Número aleatorio entre 1 y 10
function generarNumeroAleatorio()
{
    return rand(1, 10);
}

$aciertos = 0;
$errores = 0;

echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo '<table border="1">';

echo "<tr>";
echo "<th></th>";
for ($columna = 1; $columna <= 10; $columna++) {
    echo "<th>$columna</th>"; // Multiplicadores en la primera fila
}
echo "</tr>";

for ($fila = 1; $fila <= 10; $fila++) {
    echo "<tr>";
    echo "<th>$fila</th>"; // Multiplicado en la primera columna
    for ($columna = 1; $columna <= 10; $columna++) {
        // input o valor
        $nombreCampo = "respuestas[$fila][$columna]";
        $valor = generarNumeroAleatorio(); // Genera un número aleatorio para el campo
        $respuestaUsuario = isset($_POST['respuestas'][$fila][$columna]) ? $_POST['respuestas'][$fila][$columna] : null;
        $respuestaCorrecta = $fila * $columna;

        if (generarNumeroAleatorio() <= 1) {
            // Si el número aleatorio es menor o igual a 1 (10% de probabilidad), crea un input visible
            echo '<td><input type="number" name="' . $nombreCampo . '" value="' . $valor . '"></td>';
        } else {
            // Si no, crea un campo oculto con la respuesta correcta
            echo '<td><input type="hidden" name="' . $nombreCampo . '" value="' . ($fila * $columna) . '">';
            if ($respuestaUsuario === null) {
                // Si el usuario no ingresó ningún valor, muestra un espacio en blanco.
                echo ' ';
            } elseif ($respuestaUsuario == $respuestaCorrecta) {
                // La respuesta del usuario es correcta, muestra una cara feliz.
                echo '<img src="feliz.png" alt="Cara feliz">';
                $aciertos++;
            } else {
                // La respuesta del usuario es incorrecta, muestra una cara triste.
                echo '<img src="triste.png" alt="Cara triste">';
                $errores++;
            }
            echo '</td>';
        }
    }
    echo "</tr>";
}

echo "</table>";
echo '<input type="submit" name="comprobar" value="Comprobar">';
echo '</form>';

echo '<div style="text-align: center;">';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Aciertos: $aciertos<br>";
    echo "Errores: $errores<br>";
}
echo '</div>';
?>


</body>
</html>
