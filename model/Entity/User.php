<?php
namespace Model\Entity;

use Library\Repository;

class User extends Repository {
  protected $table ='user';

  public function getName(){
    return "Nombre de Usuario";
  }

  public function authenticate(){

  }
}
