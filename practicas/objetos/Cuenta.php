<?php
include('Cliente.php');

class Cuenta{
  public function __construct(Cliente $cliente, Dinero $dinero){

  }
  public function consultarSaldo(){
    return "$200";
  }
}

?>
