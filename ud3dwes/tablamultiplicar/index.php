<?php 
include('config.php');
include('functions.php');

$valoresActuales = array();
$numerosAleatorios = array();

$procesaFormulario = false;
$numAciertos = 0;
$iconoRespuesta = "";
$claseRespuesta = "";

if (isset($_POST['send'])) {
    $procesaFormulario = true;
    foreach ($_POST['num'] as $f => $v1) {
        foreach ($v1 as $c => $v2) {
            $numerosAleatorios[] = array('f' => $f, 'c' => $c);
            $valoresActuales[$f][$c] = $v2;
            if ($valoresActuales[$f][$c] == $f * $c) {
                $numAciertos++;
            }
        }
    }
} else {
    for ($i = 0; $i < NUMINPUTS; $i++) { 
        do {
            $f = mt_rand(1, NUMTABLAS);
            $c = mt_rand(1, NUMTABLAS);
        } while (existeCoordenada($f, $c, $numerosAleatorios));
        $numerosAleatorios[] = array('f'  => $f, 'c' => $c);
        $valoresActuales[$f][$c] = '';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>

</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td class="cabecera">></td>
                <?php 
                for ($i=1; $i <= NUMTABLAS ; $i++) {
                    echo "<td class=\"cabecera\"> $i</td>";
                }
                echo "</tr>";
                

for ($f=1; $f <= NUMTABLAS ; $f++) { 
    echo "<tr>";
    echo "<td class=\"cabecera\"> $f</td>";
    for ($c=1; $c <= NUMTABLAS ; $c++) { 
        if (existeCoordenada($f, $c, $numerosAleatorios)) {
            if ($procesaFormulario) {
                $iconoRespuesta = $valoresActuales[$f][$c] == $f * $c ? '&#128512' : '&#128534';
                $claseRespuesta = $valoresActuales[$f][$c] == $f * $c ? 'acierto' : 'fallo';
            }
            echo "<td><input class=\"".$claseRespuesta."\" title=\"".$f."x".$c."\" type=\"text\" name=\"num[".$f."][".$c."]\" value=\"".$valoresActuales[$f][$c]."\">".$iconoRespuesta."</td>";
        } else {
            echo '<td>' . ($f * $c) . '</td>';
        }
    }
    echo '</tr>';
} 

?>

                ?>
        </table>
        <br/>
            <input type="submit" name="send" value="Enviar"/>
        </form>
        <br/>
        <?php echo "Total de aciertos: $numAciertos"; ?>
    </body>
</html>