<?php
$aPaises = array (
    array('id' => 'es', 'pais' => 'España', 'capital' => 'Madrid'),
    array('id' => 'it', 'pais' => 'Italia', 'capital' => 'Roma'),
    array('id' => 'fr', 'pais' => 'Francia', 'capital' => 'París'),
);

echo "Opcion 1 <br/>";
$nombrepaises = array();
 foreach ($aPaises as $pais) {
    $nombrepaises[] = $pais['pais'];
 }
print_r($nombrepaises);
echo "<br>";

echo "Opcion 2 <br/>";
$nombrepaises = array_map(function($pais){
    return $pais['pais'];
}, $aPaises);
print_r($nombrepaises);
?>