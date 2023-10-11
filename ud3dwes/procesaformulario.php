<?php
$datosFormulario = array(
    'nombre' => 'Juan',
    'apellidos' => 'Pérez',
    'email' => 'juan@gmail.com',
    'telefono' => '123-456-789'
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Cargado desde Array</title>
</head>
<body>
    <h1>Formulario Cargado desde Array</h1>
    <form action="procesaformulario.php" method="post">
        <?php foreach ($datosFormulario as $campo => $valor) { ?>
            <label for="<?php echo $campo; ?>"><?php echo($campo); ?>:</label>
            <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="<?php echo $valor; ?>" required><br>
        <?php } ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
