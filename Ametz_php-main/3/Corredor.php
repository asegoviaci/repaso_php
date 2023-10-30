<?php
class Corredor {
    private $nombre;
    private $codigo;
    private $carreras = [];

    public function __construct($nombre, $codigo , $carreras = []) {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->carreras = $carreras;
        }
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function getCarreras() {
        return $this->carreras;
    }
    public function setCarreras($carreras) {
        $this->carreras = $carreras;
    }
    public function anadirCarrera($tiempo) {
        if (count($this->carreras) >= 5) {
            throw new Exception("El corredor ya tiene 5 carreras.");
        }
        if ($tiempo < 5) {
            throw new Exception("Una carrera no puede durar menos de 5 segundos.");
        }
        $this->carreras[] = $tiempo;
    }
    public function tiempoPromedioPrimeraCarrera() {
        if (count($this->carreras) > 0) {
            return $this->carreras[0];
        } else {
            return 0;
        }
    }
}
?>