<?php
// la clase show implementa los programas de radio
class show{
private $nombre;
private $descripcion;
private $imagen;
private $desc_ultimo;
private $file_ultimo;
private $sonido;
public function  __construct($array){
    $this->nombre=$array['nombre'];
    $this->descripcion=$array['descripcion'];
    $this->imagen=$array['imagen'];
    $this->desc_ultimo=$array['nombre'];
    $this->file_ultimo=$array['file_ultimo'];

}

    
}