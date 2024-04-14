<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    // MÉTODO CONSTRUCTOR
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    // MÉTODOS GETTERS

    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }

    // MÉTODOS SETTERS

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    // MÉTODOS DE LA CLASE

public function porcentajeEnDecimal() {
    return $this->getPorcentajeIncrementoAnual()/100;
}

public function darPrecioVenta(){
    $anios = 2024 - $this->getAnioFabricacion();
    if ($this->getActiva()){
        $venta = $this->getCosto() + $this->getCosto()*($anios*$this->porcentajeEnDecimal()); 
    }else{
        $venta = -1;
    }
    return $venta;
}

    // MÉTODO toString
    public function __toString(){
        $cartel = "Código: " . $this->getCodigo() . "\n";
        $cartel .= "Costo: ". $this->getCosto() . "\n";
        $cartel .= "Año de fabricación: ". $this->getAnioFabricacion() . "\n";
        $cartel .= "Descripción: ". $this->getDescripcion() . "\n";
        $cartel .= "Porcentaje de incremento anual: ". $this->getPorcentajeIncrementoAnual() . "\n";
        $cartel .= "Activa: ". $this->getActiva() . "\n";
        return $cartel;
    }
}
