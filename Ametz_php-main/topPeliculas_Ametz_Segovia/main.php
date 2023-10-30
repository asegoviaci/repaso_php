<!DOCTYPE html>
<html lang="en">
<head>
    <title>main</title> 
</head>
<body>
    <h1>Top Peliculas de <?php {echo $_POST["usuario"];}?></h1>
    <form action="main.php" method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];}else{echo "";} ?>"id="nombre"><br>
        <label>ISAN: </label>
        <input type="text" name="ISAN" value="<?php if(isset($_POST['ISAN'])){echo $_POST['ISAN'];}else{echo "";} ?>"id="ISAN"><br>
        <label>Año: </label>
        <input type="text" name="año" value="<?php if(isset($_POST['año'])){echo $_POST['año'];}else{echo "";} ?>" id="año"><br>
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
            require('Pelicula.php');
            $peliculas = new peliculas();
            $usuario;
            if (isset($_POST['peliculas'])) {
                $peliculas->setArray($_POST['peliculas']."&".$_POST['ISAN'].",".$_POST['nombre'].",".$_POST['puntuacion'].",".$_POST['año']."&");
            }
            if(isset($_POST['ISAN']) && isset($_POST['nombre']) && isset($_POST['año']) && isset($_POST['puntuacion'])){
            $peli=new Pelicula(strip_tags($_POST['ISAN']),strip_tags($_POST['nombre']),strip_tags($_POST['puntuacion']),strip_tags($_POST['año']));
            $peliculas->anadirPelicula($peli);
            
            }
            echo $peliculas->mostrar_tabla();
            echo "<input type='hidden' name='peliculas' value='".$peliculas->getArray_text()."' >";
            echo "<input type='hidden' name='usuario' value='".$_POST["usuario"]."' >";
        ?>
    </form>
</body>
</html>