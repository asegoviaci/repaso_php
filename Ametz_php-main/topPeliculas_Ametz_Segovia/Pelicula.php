<?php
class pelicula {

    private $nombre;
    private $isan;
    private $año;
    private $puntuacion;

    public function __construct($isan,$nombre,$puntuacion,$año){
        $this->nombre=$nombre;
        $this->isan=$isan;
        $this->año=$año;
        $this->puntuacion=$puntuacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getIsan(){
        return $this->isan;
    }
    public function setIsan($isan){
        $this->isan=$isan;
    }
    public function getAño(){
        return $this->año;
    }
    public function setAño($año){
        $this->año=$año;
    }
    public function getPuntuacion(){
        return $this->puntuacion;
    }
    public function setPuntuacion($puntuacion){
        $this->puntuacion=$puntuacion;
    }
}
class peliculas{

    private $array=[];

    public function __construct(){}

    public function anadirPelicula($pelicula){
        if (($pelicula->getNombre() == "") && ($pelicula->getIsan() == "")) {
            echo '<script>alert("Nombre y ISAN vacios");</script>';
            unset($this->array[null]);
        }elseif(($pelicula->getIsan() !== "") && ( strlen($pelicula->getIsan()) != 8)){
            echo '<script>alert("El ISAN tiene que tener 8 digitos");</script>';
            unset($this->array[null]);
        }
        else{
            foreach ($this->array as $ISAN => $peli){
                if($ISAN==$pelicula->getIsan()){
                    if($pelicula->getNombre() == ""){
                        unset($this->array[$pelicula->getIsan()]);
                    }
                }else{
                    if(($pelicula->getNombre() != "") && ($pelicula->getIsan() == "")){
                        if(str_contains($peli->getNombre(),$pelicula->getNombre())){
                            echo "<p>".$peli->getNombre()." from ".$peli->getAño()."</p>";
                            unset($this->array[null]);
                        }
                    }else{
                        $this->array[$pelicula->getIsan()]=$pelicula;
                    }
                }
            } 
        }
    }
    public function getArray_text(){
        $string="";
        foreach ($this->array as $ISAN => $peli){
            if($peli->getIsan()!=" " && $peli->getNombre()!=" " && $peli->getPuntuacion()!=" " && $peli->getAño()!=1){
                $string.=$peli->getIsan().",".$peli->getNombre().",".$peli->getPuntuacion().",".$peli->getAño()."&";
            }
        }
        return $string;
    }
    public function setArray($texto){
        $array=explode("&",$texto);
        for ($i=0; $i < count($array); $i++) { 
            $array_separado=explode(",",$array[$i]);
            if($array[$i]!="" || $texto=""){
                $peli=new Pelicula($array_separado[0],$array_separado[1],$array_separado[2],$array_separado[3]);
                $this->array[$array_separado[0]]=$peli;
            }
        }
    }
    public function mostrar_tabla(){
        $tabla="<table border='1' cellspacing='0'>";
        $tabla.="<tr><td>Nombre</td><td>ISAN</td><td>Año</td><td>Puntuacion</td>";
        foreach($this->array as $ISAN=>$peli){
            $tabla.="<tr><td>".$peli->getNombre()."</td><td>".$peli->getIsan()."</td><td>".$peli->getAño()."</td><td>".$peli->getPuntuacion()."</td></tr>" ;
        }
        $tabla.="</table>";
        return $tabla;
    }
}
?>