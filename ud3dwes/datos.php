<?php
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";
$aGenero = array("Hombre", "Mujer", "Otro");
$aVehiculos = array("Bike", "Car", "Patinete");
$aOpciones = array(
    array("valor" => 1, "literal" => "Opción 1"),
    array("valor" => 2, "literal" => "Opción 2"),
    array("valor" => 3, "literal" => "Opción 3"),
    array("valor" => 4, "literal" => "Opción 4"),
);
$opcionSeleccionada = 1;
$cars = array("Renault", "Mercedes", "BMW", "Volvo");
$carsSeleccionados = array(); 
$aVehiculosSeleccionados = [];
$lprocesaFormulario = FALSE;
$lerror = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = TRUE;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $lerror = TRUE;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $lerror = TRUE;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $lerror = TRUE;
        }
    }

    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $lerror = true;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (isset($_POST["vehicle"])) {
        $aVehiculosSeleccionados = $_POST["vehicle"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Ejemplo</title>
</head>
<body>

<h2>Formulario de Ejemplo</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nombre: <input type="text" name="name">
    <span class="error"><?php echo $nameErr; ?></span>
    <br><br>

    Email: <input type="text" name="email">
    <span class="error"><?php echo $emailErr; ?></span>
    <br><br>

    Sitio web: <input type="text" name="website">
    <br><br>

    Comentario: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>

    Género:
    <?php
    foreach ($aGenero as $valor) {
        $checked = ($valor == $gender) ? "checked" : "";
        echo "<input type='radio' name='gender' value='$valor' $checked>$valor";
    }
    ?>
    <span class="error"><?php echo $genderErr; ?></span>
    <br><br>

    Vehiculos:
    <?php
    foreach ($aVehiculos as $vehiculo) {
        $checked = in_array($vehiculo, $aVehiculosSeleccionados) ? "checked" : "";
        echo "<input type='checkbox' name='vehicle[]' value='$vehiculo' $checked>$vehiculo";
    }
    ?>
    <br><br>

    Opciones:
    <select name="opcion">
        <?php
        foreach ($aOpciones as $opcion) {
            $valor = $opcion["valor"];
            $literal = $opcion["literal"];
            echo "<option value='$valor' " . ($opcionSeleccionada == $valor ? "selected" : "") . ">$literal</option>";
        }
        ?>
    </select>
    <br><br>

    Coches:
    <select multiple name='cars[]' >
        <?php
        foreach ($cars as $car) {
            $selected = in_array($car, $carsSeleccionados) ? "selected" : "";
            echo "<option value='$car' $selected>$car</option>";
        }
        ?>
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>