<?php
require('Pelicula.php');

session_start();

$usuario = "";
$peliculas = new peliculas();

if (isset($_SESSION['peliculas'])) {
    $peliculas->setArray($_SESSION['peliculas']);
}

if (isset($_POST['nombre']) && isset($_POST['ISAN']) && isset($_POST['año']) && isset($_POST['puntuacion'])) {
    $peli = new Pelicula(strip_tags($_POST['ISAN']), strip_tags($_POST['nombre']), strip_tags($_POST['puntuacion']), strip_tags($_POST['año']));
    $peliculas->anadirPelicula($peli);
    $_SESSION['peliculas'] = $peliculas->getArray_text();
}

if (isset($_POST['usuario'])) {
    $usuario = $_POST["usuario"];
    $_SESSION['usuario'] = $usuario;
}

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
?>

<!DOCTYPE html>
<html lang="eus">
<head>
    <title>main</title>
</head>
<body>
    <h1>Top Peliculas de <?php echo $usuario; ?></h1>
    <form action="main.php" method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre" id="nombre"><br>
        <label>ISAN: </label>
        <input type="text" name="ISAN" id="ISAN"><br>
        <label>Año: </label>
        <input type="text" name="año" id="año"><br>
        <label>Puntuación:</label>
        <select name="puntuacion">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><button type="submit">Enviar</button><br>
        <?php
        echo $peliculas->mostrar_tabla();
        ?>
    </form>
</body>
</html>
