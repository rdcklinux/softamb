<?php
namespace Model\Entity;

use Library\Repository;

class Product extends Repository {
  protected $table ='persona';

  public function getName(){
    return "Nombre de Usuario";
  }
}
