<?php
require('Pelicula.php');
$usuario = "";
$peliculas = new peliculas();
if (isset($_COOKIE['peliculas'])) {
    $datos2 = $_COOKIE['peliculas'];
    $peliculas->setArray($datos2);
}
if (isset($_POST['nombre']) && isset($_POST['ISAN']) && isset($_POST['año']) && isset($_POST['puntuacion'])) {
    $peli = new Pelicula(strip_tags($_POST['ISAN']), strip_tags($_POST['nombre']), strip_tags($_POST['puntuacion']), strip_tags($_POST['año']));
    $peliculas->anadirPelicula($peli);
    $datos = $peliculas->getArray_text();
    setcookie('peliculas',  $datos, time() + 3600, '/');
}
if (isset($_POST['usuario'])) {
    $usuario = $_POST["usuario"];
    setcookie('usuario', $usuario, time() + 3600, '/');
}
if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    setcookie('usuario_cookie', $usuario, time() + 3600 * 24 * 7);
} elseif (isset($_COOKIE['usuario_cookie'])) {
    $usuario = $_COOKIE['usuario_cookie'];
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
        <label>Puntuacion:</label>
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




