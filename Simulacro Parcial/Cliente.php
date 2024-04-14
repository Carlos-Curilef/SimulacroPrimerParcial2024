<?php
/**
 * 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
 *documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
 *1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
 *2. Los métodos de acceso de cada uno de los atributos de la clase.
 *3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */
class Cliente {
    private $nombre;
    private $apellido;
    private $baja; // No está dado de bajo cuento toma el valor "true", caso contrario es toma el valor de "false"
    private $tipoDocumento;
    private $numeroDocumento;

// MÉTODO CONSTRUCTOR
public function __construct($nombre, $apellido, $estado, $tipoDocumento, $numeroDocumento){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->baja = $estado;
    $this->tipoDocumento = $tipoDocumento;
    $this->numeroDocumento = $numeroDocumento;
}

// MÉTODOS GETTERS
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getBaja(){
    return $this->baja;
}
public function getTipoDocumento(){
    return $this->tipoDocumento;
}
public function getDocumento(){
    return $this->numeroDocumento;
}

// MÉTODOS SETTERS
public function setNombre($nombre){
    $this->nombre = $nombre;
}
public function setApellido($apellido){
    $this->apellido = $apellido;
}
public function setBaja($estado){
    $this->baja = $estado;
}
public function setTipoDocumento($tipoDocumento){
    $this->tipoDocumento = $tipoDocumento;
}
public function setDocumento($numeroDocumento){
    $this->numeroDocumento = $numeroDocumento;
}

// MÉTODO toString
public function __toString(){
    $cartel = "DATOS DEL CLIENTE \n";
    $cartel .= "El nombre es: " . $this->getNombre() . "\n";
    $cartel .= "El apellido es: " . $this->getApellido() . "\n";
    $cartel .= "Su estado es: " . $this->getBaja() . "\n";
    $cartel .= "Su tipo de documento es: " . $this->getTipoDocumento() . "\n";
    $cartel .= "Su documento es : " . $this->getDocumento() . "\n";

    return $cartel;
}
}
