<!DOCTYPE html>
<html>
<head>
    <title>Calendario de Días Festivos</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Calendario de Días Festivos</h1>

    <?php
    // array de festivos
    $festivos = array(
        array(01, 01, "Año Nuevo"),
        array(12, 10, "Día de ESPAÑA"),
        array(12, 25, "Navidad")
        // Festivos
    );

    $añoActual = date("Y");


    echo "<table>";
    echo "<tr><th>Mes</th><th>Día</th><th>Fiesta</th></tr>";

    foreach ($festivos as $festivo) {
        $month = $festivo[0];
        $day = $festivo[1];
        $nombreFestivo = $festivo[2];

        echo "<tr><td>" . sprintf("%02d", $month) . "</td><td>" . sprintf("%02d", $day) . "</td><td>$nombreFestivo</td></tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
