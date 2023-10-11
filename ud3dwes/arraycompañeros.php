<?php
$companeros = array(
    "Juan",
    "Ana",
    "Carlos",
    "Laura",
    "Pedro",
    "María"
);

if (isset($_POST['cambiarCompanero'])) {
    $companeroAleatorio = $companeros[array_rand($companeros)];
} else {
    $companeroAleatorio = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Compañero</title>
</head>
<body>
    <form method="post">
        <p>Compañero Aleatorio: <?php echo $companeroAleatorio; ?></p>
        <input type="submit" name="cambiarCompanero" value="Cambiar Compañero">
    </form>
</body>
</html>
