<?php
class Competicion {
    private $corredores = [];

    public function __construct() {
        $this->corredores = [];
    }
    public function anadirCorredor($corredor) {
        $codigo = $corredor->getCodigo();
        $this->corredores[$codigo] = $corredor;
    }
    public function getCorredor($codigo) {
        if (isset($this->corredores[$codigo])) {
            return $this->corredores[$codigo];
        } else {
            return null;
        }
    }
    public function anadirCarreraACorredor($codigo, $tiempo) {
        if (isset($this->corredores[$codigo])) {
           $this->corredores[$codigo]->anadirCarrera($tiempo);
        } else {
            throw new Exception("El corredor con el código $codigo no existe.");
        }
    }
    public function tiempoPromedioPrimeraCarreraTodos() {
        $total = 0;
        $contador = 0;
        foreach ($this->corredores as $corredor) {
            $total += $corredor->tiempoPromedioPrimeraCarrera();
            $contador++;
        }
        return round($contador > 0 ? $total / $contador : 0 , 2);
    }
    public function corredorMasRapido() {
        $corredorMasRapido = "No hay carreras";
        $tiempoMasRapido = PHP_INT_MAX;
        foreach ($this->corredores as $corredor) {
            $carreras = $corredor->getCarreras();
            foreach ($carreras as $tiempo) {
                if ($tiempo < $tiempoMasRapido) {
                    $tiempoMasRapido = $tiempo;
                    $corredorMasRapido = $corredor->getNombre();
                }
                elseif ($tiempo == $tiempoMasRapido) {
                    $tiempoMasRapido = $tiempo;
                    $corredorMasRapido = $corredorMasRapido . ", " . $corredor->getNombre();
                }
            }
        }
        return $tiempoMasRapido . "s " . $corredorMasRapido;//El tiempo mas corto + el corredor
    }
    public function MasDe15Segundos() {
        $resultado = [];
        foreach ($this->corredores as $corredor) {
            $carreras = $corredor->getCarreras();
            $contador = 0;
            foreach ($carreras as $tiempo) {
                if ($tiempo > 15) {//considerando que tiene que ser mas de 15
                    $contador++;
                }
            }
            if ($contador > 2) {//considerando que tiene que ser mas de 2
                $resultado[] = $corredor->getNombre();
            }
        }
        return $resultado;
    }
    public function NombreTerminadoEn($letra) {
        $resultado = [];
        foreach ($this->corredores as $corredor) {
            $nombre = $corredor->getNombre();
            if (substr($nombre, -1) === $letra) {
                $resultado[] = $nombre;
            }
        }
        return $resultado;
    }
}