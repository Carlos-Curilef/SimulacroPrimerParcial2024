<?php

 include_once "Cliente.php";
 include_once "Moto.php";
 include_once "Venta.php";
 include_once "Empresa.php";


 $cliente1 = new Cliente("Ramiro", "Gonzales", true, "DNI", "45.783.823");
 $cliente2 = new Cliente("José", "Paz", true, "DNI", "42.359.104");

 $moto1 = new Moto ("11", 2230000, "2022", "Benelli Imperiale 400", 85, true);
 $moto2 = new Moto ("12", 584000, "2021", "Zanella Zr 150 Ohc", 70, true);
 $moto3 = new Moto ("13", 999900, "2023", "Zanella Patagonian Eagle 250", 55, false);

 $arryClientes = [$cliente1, $cliente2];
 $arrayMotos = [$moto1, $moto2, $moto3];
 $arrayVentasRealizas = [];

 $empresa = new Empresa("Alta Gama", "Av Argenetina 123", $arryClientes, $arrayMotos, $arrayVentasRealizas);
 
 $empresa->registrarVenta([11,12,13], $cliente2);

 $empresa->registrarVenta([0], $cliente2);

 $empresa->registrarVenta([2], $cliente2);

 $empresa->retornarVentasXCliente("DNI", "45.783.823");
 $empresa->retornarVentasXCliente("DNI", "42.359.104");

 echo $empresa;
 

