<?php

class CompraAsInsumoModel{
private $Id_Compra;
private $Codigo_Insumo;
private $Cantidad;
private $SubTotal;
private $Nombre_Insumo;

public function __GET($atributo){

    return $this->$atributo;
}

public function __SET($atributo, $valor)
{
   $this->$atributo=$valor;
}

}