<?php
class Empresa {
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentasRealizadas;

    public function __construct($denominacion, $direccion, array $arrayClientes, array $arrayMotos, array $arrayVentasRealizadas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->arrayClientes = $arrayClientes;
        $this->arrayMotos = $arrayMotos;
        $this->arrayVentasRealizadas = $arrayVentasRealizadas;
    }

    /*******************MÉTODOS GETTERS******************************/

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getArrayClientes(){
        return $this->arrayClientes;
    }
    public function getArrayMotos(){
        return $this->arrayMotos;
    }
    public function getArrayVentasRealizadas(){
        return $this->arrayVentasRealizadas;
    }

    /*******************MÉTODOS SETTERS******************************/

    public function setDenominacion($otraDenominacion){
        $this->denominacion = $otraDenominacion;
    }
    public function setDireccion($otraDireccion){
        $this->direccion = $otraDireccion;
    }
    public function setArrayClientes($otroArrayClientes){
        $this->arrayClientes = $otroArrayClientes;
    }
    public function setArrayMotos($otroArrayMotos){
        $this->arrayMotos = $otroArrayMotos;
    }
    public function setArrayVentasRealizadas($otroArrayVentasRealizadas){
        $this->arrayVentasRealizadas = $otroArrayVentasRealizadas;
    }

    /*******************MÉTODOS DE LA CLASE******************************/
    
    /**
     * Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
     * retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
     */
    public function retonarMoto($codigoMoto){
        $refereciaEncontrada = false;
        $indice = 0;
        $coleccionDeMotos = $this->getArrayMotos(); // Obtenemos la colección de motos
        $totalDeMotos = count($coleccionDeMotos);
        $referenciaDelObjeto = null; // Lo iniciamos en nulo por si no llega a encontrar un objeto que coincida con el código de la moto ingresada por parámetro

        while (($indice < $totalDeMotos) && !($refereciaEncontrada)){
            if ($coleccionDeMotos[$indice]->getCodigo() == $codigoMoto) {
                $referenciaDelObjeto = $coleccionDeMotos[$indice];
                $refereciaEncontrada = true;
            } else {
                $indice++;
            }
        }

        return $referenciaDelObjeto;
    }

    /**
     * Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
     * parámetro una colección de códigos de motos, la cual es recorrida (2. se utiliza una estructura repetitiva exaustiva), y por cada elemento de la colección
     * se busca el objeto moto correspondiente al código (3. dentro de la repetitiva utilizar un if para comparar el código de la moto que estoy leyendo con el código recibido) y se incorpora a la colección de motos de la instancia
     * Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles ()
     * para registrar una venta en un momento determinado.
     * El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
     * venta.
     */

     // 1. Primero verifico que el cliente este de alta porque sino no tiene sentido hacer el resto de las cosas
    public function registrarVenta(array $colCodigosMoto, Cliente $objCliente){
        $precioFinal = 0;
        if ($objCliente->getBaja()) {
             $objVentas = new Venta(count($this->getArrayVentasRealizadas()), date("d/m/Y"), $objCliente, [], 0);
            foreach ($colCodigosMoto as $codigo) {
                $objMoto = $this->retonarMoto($codigo);
                if ($objMoto != null) {
                    $objVentas->incorporarMoto($objMoto);
                }
            }
            $precioFinal = $objVentas->getPrecioFinal();
       }
       $arrayVentas = $this->getArrayVentasRealizadas();
       array_push($arrayVentas, $objVentas);
       $this->setArrayVentasRealizadas($arrayVentas);
       return $precioFinal;
    }

    /**
     * Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
     * número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
     */
    public function retornarVentasXCliente($tipo, $numDoc) {
        $coleccionVentas = $this->getArrayVentasRealizadas();
        $coleccionVentasRealizadasXcliente = [];

        foreach ($coleccionVentas as $objVentas){
            $cliente = $objVentas->getCliente();
            if ($cliente->getTipoDocumento() == $tipo && $cliente->getDocumento() == $numDoc) {
                    array_push($coleccionVentasRealizadasXcliente, $objVentas);
            }
        }

        return $coleccionVentasRealizadasXcliente;
    }
   


    
    /*******************MÉTODO toStirng******************************/

    public function arrayToString($coleccion){
        $stringObjetos = "";
        foreach($coleccion as $elementos){
            $stringObjetos .= $elementos . "\n";
        }
        return $stringObjetos;  
    } 

    public function __toString() {
        $cartel = "Denominación: " . $this->getDenominacion() ."\n";
        $cartel .= "Dirección: " . $this->getDireccion() . "\n";
        $cartel .= "Colección de clientes: " . $this->arrayToString($this->getArrayClientes()) . "\n";
        $cartel .= "Colección de motos: " . $this->arrayToString($this->getArrayMotos()) . "\n";
        $cartel .= "Colección de ventas realizadas: " . $this->arrayToString($this->getArrayVentasRealizadas()) . "\n";
        return $cartel;
    }

}
