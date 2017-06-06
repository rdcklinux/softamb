<?php
namespace Model\Entity;

use Library\Repository;

class Persona extends Repository {
  protected $table ='persona';

  public function getName(){
    return "Nombre de Usuario";
  }
}
