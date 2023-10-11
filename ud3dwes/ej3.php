<?php
echo '<table border="1">';

echo '<tr>';
echo '<td></td>';
for ($i = 1; $i <= 10; $i++) {
    echo '<td>' . $i . '</td>';}
echo '</tr>';

$numero1 = 1;

while ($numero1 <= 10) {
    echo '<tr>';
 
    echo '<td>' . $numero1 . '</td>';
    $numero2 = 1;

    while ($numero2 <= 10) {
        $resultado = $numero1 * $numero2;
        echo '<td>' . $resultado . '</td>';
        $numero2++;
    }

    echo '</tr>';
    $numero1++;
}

echo '</table>';
?>