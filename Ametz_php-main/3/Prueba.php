<!DOCTYPE html>
<html>
<head>
<title>Prueba de PHP</title>
</head>
<body>
<pre>
<?php
require_once('Corredor.php');
require_once('Competicion.php');

$corredor1 = new Corredor("Juan", "C1", );
$carreras1 = [13, 14, 15 ,16];
$corredor1->setCarreras($carreras1);
$corredor3 = new Corredor("Felipe", "C3", );
$carreras3 = [14, 16, 17 ,18];
$corredor3->setCarreras($carreras3);
$corredor4 = new Corredor("Sandra", "C4", );
$carreras4 = [12, 15, 15 ,17];
$corredor4->setCarreras($carreras4);
$carreras2 = [13, 16, 17, 22];
$corredor2 = new Corredor("Ana", "C2", $carreras2);
$carreras5 = [11, 16, 16, 21];
$corredor5 = new Corredor("Jaime", "C5", $carreras5);
$carreras6 = [11, 12, 17, 19];
$corredor6 = new Corredor("Carlos", "C6", $carreras6);


$competicion = new Competicion();

$competicion->anadirCorredor($corredor1);
$competicion->anadirCorredor($corredor2);
$competicion->anadirCorredor($corredor3);
$competicion->anadirCorredor($corredor4);
$competicion->anadirCorredor($corredor5);
$competicion->anadirCorredor($corredor6);

echo "Nombre del corredor con codigo C1: ";
echo $competicion->getCorredor("C1")->getNombre();
echo "</br>";
echo "Tiempo medio de primera carrera de todos: ";
echo $competicion->tiempoPromedioPrimeraCarreraTodos();
echo "</br>";
echo "Mas rapido:" . $competicion->corredorMasRapido();
echo "</br>";
$competicion->anadirCarreraACorredor("C1", 10);
$competicion->anadirCarreraACorredor("C2", 8);
echo "Mas rapido con carreras extra:" . $competicion->corredorMasRapido();
echo "</br>";
echo "corredor o corredores más rápidos: ";
$masrapido = $competicion->MasDe15Segundos();
for ($i = 0; $i < count($masrapido); $i++) {
    echo $masrapido[$i];
    if ($i < count($masrapido) - 1) {
        echo ", ";
    }
}
echo "</br>";
echo "Nombres terminados por e: ";
$nombres = $competicion->NombreTerminadoEn("e");
for ($i = 0; $i < count($nombres); $i++) {
    echo $nombres[$i];
    if ($i < count($nombres) - 1) {
        echo ", ";
    }
}
?>
</pre>
</body>
</html>