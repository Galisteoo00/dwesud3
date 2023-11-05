<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Verbos Irregulares</title>
</head>
<body>
    <h1>Formulario de Verbos Irregulares</h1>
    <form action="crear_test.php" method="post">
        <label for="cantidad">Cantidad de verbos a responder:</label>
        <input type="number" name="cantidad" id="cantidad" required>
        
        <label for="nivel">Nivel (1-3):</label>
        <input type="number" name="nivel" id="nivel" min="1" max="3" required>
        
        <input type="submit" value="Crear Test">
    </form>
</body>
</html>
