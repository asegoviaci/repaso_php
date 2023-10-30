<!DOCTYPE html>
<html>
<head>
    <title>Formulario PHP</title>
</head>
<body>
    <h2>Formulario PHP</h2>
    <?php 
    if (isset($_POST['nombre'])) {
        $concatenado = $_POST["concadenado"] . " " . $_POST["nombre"]; // Corregido: cambiar $concadenado a $concatenado
    } else {
        $concatenado = " ";
    }
    echo $concatenado;
    ?>
    <form method="post" action="form.php">
        <label>Ingrese un nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <input type="hidden" name="nombres" value="<?php echo $concadenado; ?>"> <!-- Corregido: agregar "echo" para imprimir el valor -->
        <input type="submit" value="Añadir">
    </form>
</body>
</html>