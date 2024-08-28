<?php

class Coche {
  private $marca;
  private $modelo;
  private $año;

  
  public function __construct($marca, $modelo, $año) {
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->año = $año;
  }

  // Métodos
  public function getMarca() {
    return $this->marca;
  }

  public function setMarca($marca) {
    $this->marca = $marca;
  }

  public function getModelo() {
    return $this->modelo;
  }

  public function setAño($año) {
    $this->año = $año;
  }

  public function getAño() {
    return $this->año;
  }

  public function mostrarInfo() {
      return  "Marca: " . $this->marca . ", Modelo: " . $this->modelo . ", Año: " . $this->año ;
  }
}
