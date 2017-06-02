<?php
namespace Model\Entity;

use Library\Repository;

class User extends Repository {
  protected $table ='persona';

  public function getName(){
    return "Nombre de Usuario";
  }

  public function authenticate(){

  }
}
