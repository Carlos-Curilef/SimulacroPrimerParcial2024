<?php
class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, Cliente $cliente, array $arrayMotos, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $cliente;
        $this->arrayMotos = $arrayMotos;
        $this->precioFinal = $precioFinal;
    }

    // MÉTODOS GETTERS
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getCliente(){
        return $this->objCliente;
    }
    public function getArrayMotos(){
        return $this->arrayMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    // MÉTODOS SETTERS
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setCliente($cliente){
        $this->objCliente = $cliente;
    }
    public function setArrayMotos($arrayMotos){
        $this->arrayMotos = $arrayMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    // MÉTODO DE LA CLASE

    // Método que convierte una colección de objetos en un string
    public function arrayToString($coleccion){
       $stringObjetos = "";
       foreach($coleccion as $elementos){
           $stringObjetos .= $elementos . "\n";
       }
       return $stringObjetos;  
   } 


    // Método que incorpora un nuevo objeto moto a una colección de motos, luego actualiza su precio final
    public function incorporarMoto(Moto $objMoto){
        if ($this->getCliente()->getBaja()){ // Verificamos si el cliente está dado de baja 
            if ($objMoto->getActiva()){ // Verificamos si la moto está activa
                $arrayMotos = $this->getArrayMotos(); // Tomamos el array y lo guardamos en una variable
                array_push($arrayMotos, $objMoto); // Pusheamos el array
                $this->setPrecioFinal($this->getPrecioFinal() + $objMoto->darPrecioVenta()); // Actualizamos el precio final
                $this->setArrayMotos($arrayMotos);
            }
        }
      
    }

    public function __toString(){
        $cartel = "Número de venta: " . $this->getNumero() . "\n";
        $cartel .= "Fecha: " . $this->getFecha() . "\n";
        $cartel .= "Cliente: " . $this->arrayToString($this->getCliente()) . "\n";
        $cartel .= "Colección de motos: " . $this->arrayToString($this->getArrayMotos()) . "\n";
        $cartel .= "Precio final: " . $this->getPrecioFinal() . "\n"; 

        return $cartel;
    }


}
